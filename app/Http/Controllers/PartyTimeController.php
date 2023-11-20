<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\PartyTime;

class PartyTimeController extends Controller
{
    private $repository;

    public function __construct(PartyTime $partyTime) {
        $this->repository = $partyTime;
    }

    public function index() {
        $partyTimes = $this->repository->all();

        return view('pages.PartyTimes.index', [
            'partyTimes' => $partyTimes,
        ]);
    }

    public function create() {
        return view('pages.PartyTimes.create');
    }

    public function store(Request $request) {
        $partyTime = new PartyTime;
        // $start = strtotime($request->start);
        // $end = strtotime($request->end);

        // $nMinutos = ($end - $start)/60;

        $partyTime->start = $request->start;
        $partyTime->end = $request->end;
        $partyTime->save();

        return redirect()->route('partytimes.index');
    }

    public function show($id){
        if (!$id) { return back(); }

        $partyTime = $this->repository->find($id);

        return view('pages.PartyTimes.show', [
            'partyTime' => $partyTime,
        ]);
    }

    public function edit($id){
        $partyTime = PartyTime::find($id);

        if (!$id) {
            return back();
        }

        return view('pages.PartyTimes.edit', [
            'partyTime' => $partyTime,
        ]);
    }

    public function update(Request $request, $id){
        $partyTime = PartyTime::find($id);

        if (!$id) {
            return back();
        }

        $partyTime->start = $request->start;
        $partyTime->end = $request->end;
        $partyTime->save();

        return redirect()->route('partytimes.index');
    }

    public function destroy($id){
        $partyTime = $this->repository->find($id);

        $partyTime->delete();

        return redirect()->route('partytimes.index');
    }


    public function partyTimeConfigsEdit(){
        if(Cache::get('party_time_min_interval')) {
            $partyTimeMinInterval = Cache::get('party_time_min_interval');
        } else {
            $partyTimeMinInterval = config('parties.party_time_min_interval');
        }

        return view('pages.PartyTimes.editInterval', [
            'partyTimeMinInterval' => $partyTimeMinInterval
        ]);
    }

    public function partyTimeConfigsUpdate(Request $request){
        $partyTimeMinInterval = $request['party_time_min_interval'];

        Cache::forever('party_time_min_interval', $partyTimeMinInterval);

        return view('pages.PartyTimes.editInterval', [
            'partyTimeMinInterval' => Cache::get('party_time_min_interval')
        ]);
    }
}
