<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unity;
// use App\Http\Requests\StoreUpdateServiceType;

class UnityController extends Controller
{
    private $repository;

    public function __construct(Unity $unity) {
        $this->repository = $unity;
    }

    public function index() {
        $unities = $this->repository->all();

        return view('pages.Unities.index', [
            'unities' => $unities,
        ]);
    }

    public function create() {
        return view('pages.Unities.create');
    }

    public function store(Request $request) {
        $unity = new Unity;

        $unity->fantasyName = $request->fantasy_name;
        $unity->cnpj = $request->cnpj;
        $unity->cnpjName = $request->cnpj_name;
        $unity->email = $request->email;
        $unity->tel = $request->tel;
        $unity->cel = $request->cel;
        $unity->address = $request->address;

        $unity->save();

        return redirect()->route('unities.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $unity = $this->repository->find($id);

        return view('pages.Unities.show', [
            'unity' => $unity,
        ]);
    }

    public function edit($id){
        $unity = Unity::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.Unities.edit', [
            'unity' => $unity,
        ]);
    }

    public function update(Request $request, $id){
        $unity = Unity::find($id);

        if (!$id) {
            return back();
        }

        $unity->fantasyName = $request->fantasy_name;
        $unity->cnpj = $request->cnpj;
        $unity->cnpjName = $request->cnpj_name;
        $unity->email = $request->email;
        $unity->tel = $request->tel;
        $unity->cel = $request->cel;
        $unity->address = $request->address;

        $unity->save();

        return redirect()->route('unities.index');
    }

    public function destroy($id){
        $unity = $this->repository->find($id);

        $unity->delete();

        return redirect()->route('unities.index');
    }
}
