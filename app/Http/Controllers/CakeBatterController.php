<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CakeBatter;
use App\Http\Requests\StoreUpdateCakeBatter;

class CakeBatterController extends Controller
{
    private $repository;

    public function __construct(CakeBatter $cakeBatter) {
        $this->repository = $cakeBatter;
    }

    public function index() {
        $cakeBatters = $this->repository->all();

        return view('pages.CakeBatters.index', [
            'cakeBatters' => $cakeBatters,
        ]);
    }

    public function create() {
        return view('pages.CakeBatters.create');
    }

    public function store(StoreUpdateCakeBatter $request) {
        $cakeBatter = new CakeBatter;

        $cakeBatter->name = $request->name;
        $cakeBatter->save();

        return redirect()->route('cakebatters.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $cakeBatter = $this->repository->find($id);

        return view('pages.CakeBatters.show', [
            'cakeBatter' => $cakeBatter,
        ]);
    }

    public function edit($id){
        $cakeBatter = CakeBatter::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.CakeBatters.edit', [
            'cakeBatter' => $cakeBatter,
        ]);
    }

    public function update(StoreUpdateCakeBatter $request, $id){
        $cakeBatter = CakeBatter::find($id);

        if (!$id) {
            return back();
        }

        $cakeBatter->name = $request->name;
        $cakeBatter->save();

        return redirect()->route('cakebatters.index');
    }

    public function destroy($id){
        $cakeBatter = $this->repository->find($id);

        $cakeBatter->delete();

        return redirect()->route('cakebatters.index');
    }
}
