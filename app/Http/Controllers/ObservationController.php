<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observation;


class ObservationController extends Controller
{
    private $repository;

    public function __construct(Observation $observation) {
        $this->repository = $observation;
    }

    public function index() {
        $observations = $this->repository->all();

        return view('pages.Observations.index', [
            'observations' => $observations,
        ]);
    }

    public function create() {
        return view('pages.Observations.create');
    }

    public function store(Request $request) {
        $observation = new Observation;

        $observation->name = $request->name;

        $observation->save();

        return redirect()->route('observations.index');
    }

    public function show($id){
        $observation = $this->repository->find($id);

        if (!$observation) { return back(); }

        return view('pages.Observations.show', [
            'observation' => $observation,
        ]);
    }

    public function edit($id){
        $observation = Observation::find($id);

        if (!$observation) {
            return back();
        }

        return view('pages.Observations.edit', [
            'observation' => $observation,

        ]);
    }

    public function update(Request $request, $id){
        $observation = Observation::find($id);

        if (!$observation) {
            return back();
        }

        $observation->name = $request->name;

        $observation->save();

        return redirect()->route('observations.index');
    }

    public function destroy($id){
        $observation = $this->repository->find($id);

        $observation->delete();

        return redirect()->route('observations.index');
    }
}
