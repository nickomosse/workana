<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Http\Requests\StoreUpdateServiceType;

class ServiceTypeController extends Controller
{
    private $repository;

    public function __construct(ServiceType $serviceType) {
        $this->repository = $serviceType;
    }

    public function index() {
        $serviceTypes = $this->repository->all();

        return view('pages.servicetypes.index', [
            'serviceTypes' => $serviceTypes,
        ]);
    }

    public function create() {
        return view('pages.servicetypes.create');
    }

    public function store(StoreUpdateServiceType $request) {
        $serviceType = new ServiceType;

        $serviceType->name = $request->name;
        $serviceType->save();

        return redirect()->route('servicetypes.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $serviceType = $this->repository->find($id);

        return view('pages.ServiceTypes.show', [
            'serviceType' => $serviceType,
        ]);
    }

    public function edit($id){
        $serviceType = ServiceType::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.ServiceTypes.edit', [
            'serviceType' => $serviceType,
        ]);
    }

    public function update(StoreUpdateServiceType $request, $id){
        $serviceType = ServiceType::find($id);

        if (!$id) {
            return back();
        }

        $serviceType->name = $request->name;
        $serviceType->save();

        return redirect()->route('servicetypes.index');
    }

    public function destroy($id){
        $serviceType = $this->repository->find($id);

        $serviceType->delete();

        return redirect()->route('servicetypes.index');
    }
}
