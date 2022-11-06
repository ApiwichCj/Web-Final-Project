<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\BookstoreBranch;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    //Create Index
    public function index() {
        $data['employees'] = Employee::orderBy('id')->paginate(5);
        return view('employees.index', $data);
    }

    //Get data from Employee;id
    //Return View and show data
    public function show($id){
        $employee = Employee::find($id);
        return view('employees.show',['employee' => $employee->toarray()]);
    }

    // Create Resource
    public function create(){
        //Get branch
        $bsbranchs = BookstoreBranch::get();
        return view('employees.create',['bsbranchs' => $bsbranchs->toarray()]);

    }

    // Store Resource
    public function store(Request $request) {
        $request->validate([
            'eid' => 'required',
            'fullname' => 'required',
            'bsbranch' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $employee = new Employee;
        $employee->eid = $request->eid;
        $employee->fullname = $request->fullname;
        $employee->bsbranch = $request->bsbranch;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        if($request->hasfile('picture')){
            $file = $request->file('picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/employees/',$filename);
            $employee->picture = $filename;
        }
        $employee->save();
        return redirect()->route('employees.index')->with('success','Employee has been created success');
    }

    // Edit Employee Data
    public function edit(Employee $employee){
        //Get branch
        $bsbranchs = BookstoreBranch::get();
        return view('employees.edit',compact('employee'),['bsbranchs' => $bsbranchs->toarray()]);
    }

    // Update Data from Edit
    public function update(Request $request, $id){
        $request->validate([
            'eid' => 'required',
            'fullname' => 'required',
            'bsbranch' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $employee = Employee::find($id);
        $employee->eid = $request->eid;
        $employee->fullname = $request->fullname;
        $employee->bsbranch = $request->bsbranch;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        if($request->hasfile('picture')){
            $file = $request->file('picture');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/employees/',$filename);
            $employee->picture = $filename;
        }
        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Employee has been updated');
    }

    // Delete or Destroy Employee
    public function destroy(Employee $employee) {
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee has been deleted');

    }
}
