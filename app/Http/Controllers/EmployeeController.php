<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validation = $this->validateEmployee($request);

        if ($validation['validation']) {
            Employee::create($request->all());
            $result = ['created' => true];
        } else {
            $result = [
                'created' => false,
                'error' => 'input invalid'
            ];
        }

        return $result;
    }

    /**
     * Store a newly created employee in storage.
     *
     * @return array return all employees.
     */
    public function store()
    {
        return Employee::all();
    }

    /**
     * Display the specified employee.
     *
     * @param  String  $id employee id.
     * @return App\Employee
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $id employee id.
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $validation = $this->validateEmployee($request);

        if ($validation['validation']) {
            $employee = Employee::find($id);
            $employee->update($request->all());
            $result = ['updated' => true];;
        } else {
            $result = [
                'created' => false,
                'error' => 'input invalid'
            ];
        }

        return $result;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $id employee id.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return ['destroyed' => true];
    }


    /**
     * Show the form for creating a new employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array validation request true/false
     */
    private function validateEmployee ($request) {
        $result = true;
        $validator = Validator::make($request->all(), array(
            'name' => 'required|string',
            'email' => 'required|email',
            'document' => 'required|integer',
            'photo' => 'mimes:jpeg,png'
        ));

        if ($validator->fails()) {
           $result = false;
        }

        return [ 'validation' => $result ];
    }
}
