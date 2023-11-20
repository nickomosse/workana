<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeType;
use App\Http\Requests\StoreUpdateEmployeeType;


class EmployeeTypeController extends Controller
{
    private $repository;

    public function __construct(EmployeeType $employeeType) {
        $this->repository = $employeeType;
    }

    public function index() {
        $employeeTypes = $this->repository->all();

        return view('pages.employeetypes.index', [
            'employeeTypes' => $employeeTypes,
        ]);
    }

    public function create() {
        return view('pages.employeetypes.create');
    }

    public function store(StoreUpdateEmployeeType $request) {
        $employeeType = new EmployeeType;

        $employeeType->name = $request->name;
        $employeeType->save();

        return redirect()->route('employeetypes.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $employeeType = $this->repository->find($id);

        return view('pages.EmployeeTypes.show', [
            'employeeType' => $employeeType,
        ]);
    }

    public function edit($id){
       $employeeType = EmployeeType::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.EmployeeTypes.edit', [
            'employeeType' =>$employeeType,
        ]);
    }

    public function update(StoreUpdateEmployeeType $request, $id){
       $employeeType = EmployeeType::find($id);

        if (!$id) {
            return back();
        }

       $employeeType->name = $request->name;
       $employeeType->save();

        return redirect()->route('employeetypes.index');
    }

    public function destroy($id){
       $employeeType = $this->repository->find($id);

       $employeeType->delete();

        return redirect()->route('employeetypes.index');
    }
}
