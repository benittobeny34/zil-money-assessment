<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            return view('employee.index', [
                'employees' => Employee::with('languages')->get()
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('employee.create');
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        DB::beginTransaction();
        try {
            $employee = Employee::create([
                'first_name' => $request->validated('first_name'),
                'last_name' => $request->validated('last_name'),
                'willing_to_work' => $request->validated('willing_to_work') ? 1 : 0
            ]);
            $languages = [];

            foreach ($request->languagesKnown() as $language) {
                $languages['language'] = $language;
                $languages['employee_id'] = $employee->id;
            }

            $employee->languages()->createMany([$languages]);

            DB::commit();

            return view('employee.index', [
                'employees' => Employee::with('languages')->get()
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            return view('employee.show', [
                'employee' => $employee
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            return view('employee.edit', [
                'employee' => $employee,
                'languageList' => $employee->languages()->pluck('language')->toArray()
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(EmployeeRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $employee = Employee::findOrFail($id);
            $employee->update([
                'first_name' => $request->validated('first_name'),
                'last_name' => $request->validated('last_name'),
                'willing_to_work' => $request->validated('willing_to_work') ? 1 : 0
            ]);
            $languages = [];

            foreach ($request->languagesKnown() as $language) {
                $languages['language'] = $language;
                $languages['employee_id'] = $employee->id;
            }

            $employee->languages()->delete();

            $employee->languages()->createMany([$languages]);

            DB::commit();

            return view('employee.show', [
                'employee' => $employee
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            $employee->languages()->delete();

            DB::commit();

            return view('employee.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
