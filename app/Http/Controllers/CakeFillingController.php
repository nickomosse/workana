<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CakeFilling;
use App\Http\Requests\StoreUpdateCakeFilling;

class CakeFillingController extends Controller
{
    private $repository;

    public function __construct(CakeFilling $cakeFilling) {
        $this->repository = $cakeFilling;
    }

    public function index() {
        $cakeFillings = $this->repository->all();

        return view('pages.CakeFillings.index', [
            'cakeFillings' => $cakeFillings,
        ]);
    }

    public function create() {
        return view('pages.CakeFillings.create');
    }

    public function store(StoreUpdateCakeFilling $request) {
        $cakeFilling = new CakeFilling;

        $cakeFilling->name = $request->name;
        $cakeFilling->save();

        return redirect()->route('cakefillings.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $cakeFilling = $this->repository->find($id);

        return view('pages.CakeFillings.show', [
            'cakeFilling' => $cakeFilling,
        ]);
    }

    public function edit($id){
        $cakeFilling = CakeFilling::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.CakeFillings.edit', [
            'cakeFilling' => $cakeFilling,
        ]);
    }

    public function update(StoreUpdateCakeFilling $request, $id){
        $cakeFilling = CakeFilling::find($id);

        if (!$id) {
            return back();
        }

        $cakeFilling->name = $request->name;
        $cakeFilling->save();

        return redirect()->route('cakefillings.index');
    }

    public function destroy($id){
        $cakeFilling = $this->repository->find($id);

        $cakeFilling->delete();

        return redirect()->route('cakefillings.index');
    }
}
