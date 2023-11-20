<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\User;

class ServiceController extends Controller
{

    public function index(){
        $services = Service::all();



        return view('pages.Services.index', [
            'services' => $services,
        ]);
    }

    public function create(){
        $serviceTypes = ServiceType::all();
        $users = User::all();

        return view('pages.Services.create', [
            'serviceTypes' => $serviceTypes,
            'users' => $users,
        ]);
    }

    public function store(Request $request){
        $service = new Service;

        $service->name = $request->name;
        $service->service_type_id = $request->service_type_id;
        $service->price = $request->price;
        $service->save();

        return redirect()->route('services.index');
    }

    public function edit($id){
        $service = Service::find($id);
        $serviceTypes = ServiceType::all();

        if (!$id) { return back(); }

        return view('pages.Services.edit', [
            'service' => $service,
            'serviceTypes' => $serviceTypes,
        ]);
    }

    public function update(Request $request, $id){
        $service = Service::find($id);

        $service->name = $request->name;
        $service->service_type_id = $request->service_type_id;
        $service->save();

        return redirect()->route('services.index');
    }

    public function show($id){
        $service = Service::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.Services.show', [
            'service' => $service,
        ]);
    }

    public function destroy($id){
        $service = Service::find($id);

        $service->delete();

        return redirect()->route('services.index');
    }
}
