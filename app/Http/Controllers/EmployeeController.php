<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\JobFunction;
use App\Models\EmployeeType;
use App\Http\Requests\StoreUpdateEmployee;
use Illuminate\Support\Facades\Storage;


class EmployeeController extends Controller
{
    private $repository;

    public function __construct(Employee $employee) {
        $this->repository = $employee;
    }

    public function index() {
        $employees = $this->repository->all();

        return view('pages.Employees.index', [
            'employees' => $employees,
        ]);
    }

    public function create() {
        $jobfunctions = JobFunction::all();
        $employee_types = EmployeeType::all();

        return view('pages.Employees.create', [
            'jobfunctions' => $jobfunctions,
            'employee_types' => $employee_types,
        ]);
    }

    public function store(Request $request) {
        $employee = new Employee;


        $employee->name = $request->name;
        $employee->nick = $request->nick;
        $employee->gender = $request->gender;
        $employee->birth_date = $request->birth_date;
        $employee->cpf = $request->cpf;
        $employee->rg = $request->rg;
        $employee->type = $request->employee_type;
        $employee->email = $request->email;
        $employee->cell = $request->cell;
        $employee->emergency_contact_name = $request->emergency_contact_name;
        $employee->emergency_contact_cell = $request->emergency_contact_cell;
        $employee->address = $request->address;
        $employee->photo = "employees/no-image.png";

        $employee->save();

        $employee->jobfunctions()->sync($request->jobfunctions);


        return redirect()->route('employees.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $employee = $this->repository->find($id);

        return view('pages.Employees.show', [
            'employee' => $employee,
        ]);
    }

    public function edit($id){
        $employee = Employee::find($id);
        $jobfunctions = JobFunction::all();
        $employee_types = EmployeeType::all();

        if (!$id) {
            return back();
        }


        return view('pages.Employees.edit', [
            'employee' =>$employee,
            'jobfunctions' => $jobfunctions,
            'employee_types' => $employee_types,
        ]);
    }

    public function update(StoreUpdateEmployee $request, $id){
        $employee = Employee::find($id);

        if (!$id) {
            return back();
        }

        $employee->name = $request->name;
        $employee->nick = $request->nick;
        $employee->gender = $request->gender;
        $employee->birth_date = $request->birth_date;
        $employee->cpf = $request->cpf;
        $employee->rg = $request->rg;
        $employee->type = $request->employee_type;
        $employee->email = $request->email;
        $employee->cell = $request->cell;
        $employee->emergency_contact_name = $request->emergency_contact_name;
        $employee->emergency_contact_cell = $request->emergency_contact_cell;
        $employee->address = $request->address;

        if($request->hasFile('image') && $request->image->isValid()) {
            if (Storage::exists($employee->photo)) {
                Storage::delete($employee->photo);
            }

            $path = $request->image->store("employees");
            $employee->photo = $path;
        }

        $employee->save();

        $employee->jobfunctions()->sync($request->jobfunctions);

        return redirect()->route('employees.index');
    }

    public function destroy($id){
        $employee = $this->repository->find($id);

        if (Storage::exists($employee->photo)) {
            Storage::delete($employee->photo);
        }


        $employee->jobfunctions()->delete();
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
