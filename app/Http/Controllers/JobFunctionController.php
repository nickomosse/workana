<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobFunction;

class JobFunctionController extends Controller
{
    private $repository;

    public function __construct(JobFunction $jobfunction) {
        $this->repository = $jobfunction;
    }

    public function index() {
        $jobfunctions = $this->repository->all();

        return view('pages.jobfunctions.index', [
            'jobfunctions' => $jobfunctions,
        ]);
    }

    public function create() {
        return view('pages.jobfunctions.create');
    }

    public function store(Request $request) {
        $jobfunction = new JobFunction;

        $jobfunction->name = $request->name;
        $jobfunction->save();

        return redirect()->route('jobfunctions.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $jobfunction = $this->repository->find($id);

        return view('pages.jobfunctions.show', [
            'jobfunction' => $jobfunction,
        ]);
    }

    public function edit($id){
       $jobfunction = JobFunction::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.jobfunctions.edit', [
            'jobfunction' =>$jobfunction,
        ]);
    }

    public function update(Request $request, $id){
       $jobfunction = JobFunction::find($id);

        if (!$id) {
            return back();
        }

       $jobfunction->name = $request->name;
       $jobfunction->save();

        return redirect()->route('jobfunctions.index');
    }

    public function destroy($id){
       $jobfunction = $this->repository->find($id);

       $jobfunction->delete();

        return redirect()->route('jobfunctions.index');
    }
}
