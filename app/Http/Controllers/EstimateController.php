<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Referral;
use App\Models\Package;
use App\Models\PartyTime;
use App\Models\Observation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class EstimateController extends Controller
{
    private $repository;

    public function __construct(Estimate $estimate) {
        $this->repository = $estimate;
    }

    public function index() {
        $estimates = $this->repository->all();

        foreach ($estimates as $estimate) {
            $estimate->dayOfWeek = Carbon::parse($estimate->date);
            $estimate->dayOfWeek = $estimate->dayOfWeek->translatedFormat('l');
        }

        return view('pages.Estimates.index', [
            'estimates' => $estimates,
        ]);
    }

    public function create() {
        $signalPercentage = Cache::get('signal');
        $referrals = Referral::all();
        $packages = Package::all();

        $partyTimes = PartyTime::all();
        $observations = Observation::all();

        return view('pages.Estimates.create', [
            'referrals' => $referrals,
            'packages' => $packages,
            'partyTimes' => $partyTimes,
            'observations' => $observations,
            'signalPercentage' => $signalPercentage,
        ]);
    }

    public function store(Request $request) {
        $estimate = new Estimate;

        $estimate->name = $request->name;
        $estimate->birthday = $request->birthday;
        $estimate->gender = $request->gender;
        $estimate->date = $request->date;
        $estimate->age = date_create($request->birthday)->diff(date_create($request->date))->y;

        $estimate->package_id = $request->package;
        $estimate->referral_id = $request->referral;
        $estimate->frespname = $request->frespname;
        $estimate->frespcel = $request->frespcel;
        $estimate->frespemail = $request->frespemail;
        $estimate->srespname = $request->srespname;
        $estimate->srespcel = $request->srespcel;

        $estimate->total = $request->total;
        $estimate->signal = $request->signal;
        $estimate->division = $request->division;
        $estimate->installments = $request->installments;


        $partyTime = PartyTime::find($request->partyTime_id);

        $estimate->inittime = $partyTime->start;
        $estimate->endtime = $partyTime->end;

        $estimate->comment = $request->comment;


        $estimate->save();
        $estimate->cod = strval($estimate->id + 1037);
        $estimate->save();

        $estimate->observations()->sync($request->observations);

        return redirect()->route('estimates.index');

    }

    public function edit($id) {
        $estimate = $this->repository->find($id);
        if (!$estimate) {
            return redirect()->route('estimates.index');
        }

        $signalPercentage = Cache::get('signal');
        $referrals = Referral::all();
        $packages = Package::all();

        $partyTimes = PartyTime::all();
        $observations = Observation::all();

        return view('pages.Estimates.edit', [
            'referrals' => $referrals,
            'packages' => $packages,
            'partyTimes' => $partyTimes,
            'observations' => $observations,
            'signalPercentage' => $signalPercentage,
            'estimate' => $estimate,
        ]);
    }

    public function update(Request $request, $id){
        $estimate = Estimate::find($id);

        $estimate->name = $request->name;
        $estimate->birthday = $request->birthday;
        $estimate->gender = $request->gender;
        $estimate->date = $request->date;
        $estimate->age = date_create($request->birthday)->diff(date_create($request->date))->y;

        $estimate->package_id = $request->package;
        $estimate->referral_id = $request->referral;
        $estimate->frespname = $request->frespname;
        $estimate->frespcel = $request->frespcel;
        $estimate->frespemail = $request->frespemail;
        $estimate->srespname = $request->srespname;
        $estimate->srespcel = $request->srespcel;

        $estimate->total = $request->total;
        $estimate->signal = $request->signal;
        $estimate->division = $request->division;
        $estimate->installments = $request->installments;


        $partyTime = PartyTime::find($request->partyTime_id);

        $estimate->inittime = $partyTime->start;
        $estimate->endtime = $partyTime->end;

        $estimate->comment = $request->comment;

        $estimate->save();

        $estimate->observations()->sync($request->observations);


        if (!$id) {
            return back();
        }



        // $employee->jobfunctions()->sync($request->jobfunctions);

        return redirect()->route('estimates.index');
    }

    public function show($id){
        $estimate = $this->repository->find($id);

        if (!$estimate) { return back(); }

        $estimate->dayOfWeek = Carbon::parse($estimate->date);
        $estimate->dayOfWeek = $estimate->dayOfWeek->translatedFormat('l');

        return view('pages.Estimates.show', [
            'estimate' => $estimate,
        ]);
    }

    public function search(){
        return view('pages.Estimates.search');
    }

    public function results(Request $request){

        $name = $request->name;
        $date = $request->date;
        $birthday = $request->birthday;
        $cod = $request->cod;

        // Invalida pesquisa nula. Precisa refatorar
        if($request->name === null) $name = "dshushdk";
        if($request->cod === null) $cod = "dshushdk";
        if($request->date === null) $date = "dshushdk";
        if($request->birthday === null) $birthday = "dshushdk";



        $estimates = $this->repository->where('name', 'LIKE', "%$name%")
                                    ->orWhere('cod', $cod)
                                    ->orWhere('date', $date)
                                    ->orWhere('birthday', $birthday)
                                    ->get();


        foreach ($estimates as $estimate) {
            $estimate->dayOfWeek = Carbon::parse($estimate->date);
            $estimate->dayOfWeek = $estimate->dayOfWeek->translatedFormat('l');
        }

        return view('pages.Estimates.index', [
            'estimates' => $estimates
        ]);
    }

    public function contract($id){
        $estimate = $this->repository->find($id);
        if (!$estimate) {
            return redirect()->route('estimates.index');
        }

        $signalPercentage = Cache::get('signal');
        $referrals = Referral::all();
        $packages = Package::all();

        $partyTimes = PartyTime::all();
        $observations = Observation::all();

        return view('pages.Contracts.generate', [
            'referrals' => $referrals,
            'packages' => $packages,
            'partyTimes' => $partyTimes,
            'observations' => $observations,
            'signalPercentage' => $signalPercentage,
            'estimate' => $estimate,
        ]);

    }
}
