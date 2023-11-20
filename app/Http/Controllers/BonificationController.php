<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonification;

class BonificationController extends Controller
{
    private $repository;

    public function __construct(Bonification $bonification) {
        $this->repository = $bonification;
    }

    public function index() {
        $bonifications = $this->repository->all();

        return view('pages.Bonifications.index', [
            'bonifications' => $bonifications,
        ]);
    }

    public function create() {
        return view('pages.Bonifications.create');
    }

    public function store(Request $request) {
        $bonification = new Bonification;

        $bonification->name = $request->name;

        $bonification->save();

        return redirect()->route('bonifications.index');
    }

    public function show($id){
        $bonification = $this->repository->find($id);

        if (!$bonification) { return back(); }

        return view('pages.Bonifications.show', [
            'bonification' => $bonification,
        ]);
    }

    public function edit($id){
        $bonification = Bonification::find($id);

        if (!$bonification) {
            return back();
        }

        return view('pages.Bonifications.edit', [
            'bonification' => $bonification,

        ]);
    }

    public function update(Request $request, $id){
        $bonification = Bonification::find($id);

        if (!$bonification) {
            return back();
        }

        $bonification->name = $request->name;

        $bonification->save();

        return redirect()->route('bonifications.index');
    }

    public function destroy($id){
        $bonification = $this->repository->find($id);

        $bonification->delete();

        return redirect()->route('bonifications.index');
    }
}
