<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piece;
use App\Http\Requests\StoreUpdatePiece;

class PieceController extends Controller
{
    private $repository;

    public function __construct(Piece $piece) {
        $this->repository = $piece;
    }

    public function index()
    {
        $pieces = Piece::all();

        foreach($pieces as $piece) {
            for ($i = 1; $i <= $piece->level(); $i++) {
                echo "\t - "; echo "\t - ";
            }
            echo $piece->name.'<br>';
        }

    }



    // public function create() {
    //     return view('pages.CakeBatters.create');
    // }

    // public function store(StoreUpdateCakeBatter $request) {
    //     $cakeBatter = new CakeBatter;

    //     $cakeBatter->name = $request->name;
    //     $cakeBatter->save();

    //     return redirect()->route('cakebatters.index');
    // }

    // public function show($id){
    //     if (!$id) { return back(); }

    //     $cakeBatter = $this->repository->find($id);

    //     return view('pages.CakeBatters.show', [
    //         'cakeBatter' => $cakeBatter,
    //     ]);
    // }

    // public function edit($id){
    //     $cakeBatter = CakeBatter::find($id);

    //     if (!$id) {
    //         return back();
    //     }

    //     return view('pages.CakeBatters.edit', [
    //         'cakeBatter' => $cakeBatter,
    //     ]);
    // }

    // public function update(StoreUpdateCakeBatter $request, $id){
    //     $cakeBatter = CakeBatter::find($id);

    //     if (!$id) {
    //         return back();
    //     }

    //     $cakeBatter->name = $request->name;
    //     $cakeBatter->save();

    //     return redirect()->route('cakebatters.index');
    // }

    // public function destroy($id){
    //     $cakeBatter = $this->repository->find($id);

    //     $cakeBatter->delete();

    //     return redirect()->route('cakebatters.index');
    // }
}
