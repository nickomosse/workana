<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Room;

class PackageController extends Controller
{
    private $repository;

    public function __construct(Package $package) {
        $this->repository = $package;
    }

    public function index() {
        $packages = $this->repository->all();

        return view('pages.Packages.index', [
            'packages' => $packages,
        ]);
    }

    public function create() {
        $rooms = Room::all();

        return view('pages.Packages.create', [
            'rooms' => $rooms
        ]

    );
    }

    public function store(Request $request) {
        $package = new Package;

        $package->name = $request->name;
        $package->guests = $request->guests;
        $package->price = $request->price;
        $package->year = $request->year;
        $package->save();

        $package->rooms()->sync($request->rooms);


        return redirect()->route('packages.index');
    }

    public function show($id){
        $package = $this->repository->find($id);

        if (!$package) { return back(); }

        return view('pages.Packages.show', [
            'package' => $package,
        ]);
    }

    public function edit($id){
       $package = Package::find($id);

        if (!$package) { return back();}

        return view('pages.Packages.edit', [
            'package' =>$package,
        ]);
    }

    public function update(Request $request, $id){
       $package = Package::find($id);

        if (!$package) { return back();}

       $package->name = $request->name;
       $package->guests = $request->guests;
       $package->price = $request->price;
       $package->year = $request->year;
       $package->save();

        return redirect()->route('packages.index');
    }

    public function destroy($id){
       $package = $this->repository->find($id);

       $package->delete();

        return redirect()->route('packages.index');
    }
}
