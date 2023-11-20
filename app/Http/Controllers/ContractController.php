<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Contract;
use App\Models\Referral;
use App\Models\Package;
use App\Models\PartyTime;
use App\Models\Observation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ContractController extends Controller
{
    private $repository;

    public function __construct(Contract $contract) {
        $this->repository = $contract;
    }

    public function index() {
        $contracts = $this->repository->all();

        foreach ($contracts as $contract) {
            $contract->dayOfWeek = Carbon::parse($contract->date);
            $contract->dayOfWeek = $contract->dayOfWeek->translatedFormat('l');
        }

        return view('pages.Contracts.index', [
            'contracts' => $contracts,
        ]);
    }

    public function create() {
        $signalPercentage = Cache::get('signal');
        $referrals = Referral::all();
        $packages = Package::all();

        $partyTimes = PartyTime::all();
        $observations = Observation::all();

        return view('pages.Contracts.create', [
            'referrals' => $referrals,
            'packages' => $packages,
            'partyTimes' => $partyTimes,
            'observations' => $observations,
            'signalPercentage' => $signalPercentage,
        ]);
    }

    public function store(Request $request) {
        $contract = new Contract;

        $contract->name = $request->name;
        $contract->birthday = $request->birthday;
        $contract->gender = $request->gender;
        $contract->date = $request->date;
        $contract->age = date_create($request->birthday)->diff(date_create($request->date))->y;

        $contract->package_id = $request->package;
        $contract->referral_id = $request->referral;
        $contract->frespname = $request->frespname;
        $contract->frespcel = $request->frespcel;
        $contract->frespemail = $request->frespemail;
        $contract->srespname = $request->srespname;
        $contract->srespcel = $request->srespcel;

        $contract->total = $request->total;
        $contract->signal = $request->signal;
        $contract->division = $request->division;
        $contract->installments = $request->installments;


        $partyTime = PartyTime::find($request->partyTime_id);

        $contract->inittime = $partyTime->start;
        $contract->endtime = $partyTime->end;

        $contract->icomment = $request->icomment;
        $contract->ecomment = $request->ecomment;
        $contract->estimate_id = $request->estimate;



        $contract->save();
        $contract->cod = strval($contract->id + 1037);
        $contract->save();

        $contract->observations()->sync($request->observations);

        return redirect()->route('contracts.index');

    }

    public function edit($id) {
        $contract = $this->repository->find($id);
        if (!$contract) {
            return redirect()->route('contracts.index');
        }

        $signalPercentage = Cache::get('signal');
        $referrals = Referral::all();
        $packages = Package::all();

        $partyTimes = PartyTime::all();
        $observations = Observation::all();

        return view('pages.Contracts.edit', [
            'referrals' => $referrals,
            'packages' => $packages,
            'partyTimes' => $partyTimes,
            'observations' => $observations,
            'signalPercentage' => $signalPercentage,
            'contract' => $contract,
        ]);
    }

    public function update(Request $request, $id){
        $contract = Contract::find($id);

        $contract->name = $request->name;
        $contract->birthday = $request->birthday;
        $contract->gender = $request->gender;
        $contract->date = $request->date;
        $contract->age = date_create($request->birthday)->diff(date_create($request->date))->y;

        $contract->package_id = $request->package;
        $contract->referral_id = $request->referral;
        $contract->frespname = $request->frespname;
        $contract->frespcel = $request->frespcel;
        $contract->frespemail = $request->frespemail;
        $contract->srespname = $request->srespname;
        $contract->srespcel = $request->srespcel;

        $contract->total = $request->total;
        $contract->signal = $request->signal;
        $contract->division = $request->division;
        $contract->installments = $request->installments;


        $partyTime = PartyTime::find($request->partyTime_id);

        $contract->inittime = $partyTime->start;
        $contract->endtime = $partyTime->end;

        $contract->icomment = $request->icomment;
        $contract->ecomment = $request->ecomment;

        $contract->save();

        $contract->observations()->sync($request->observations);


        if (!$id) {
            return back();
        }



        // $employee->jobfunctions()->sync($request->jobfunctions);

        return redirect()->route('contracts.index');
    }

    public function show($id){
        $contract = $this->repository->find($id);

        if (!$contract) { return back(); }

        $contract->dayOfWeek = Carbon::parse($contract->date);
        $contract->dayOfWeek = $contract->dayOfWeek->translatedFormat('l');

        return view('pages.Contracts.show', [
            'contract' => $contract,
        ]);
    }

    public function search(){
        return view('pages.Contracts.search');
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



        $contracts = $this->repository->where('name', 'LIKE', "%$name%")
                                    ->orWhere('cod', $cod)
                                    ->orWhere('date', $date)
                                    ->orWhere('birthday', $birthday)
                                    ->get();


        foreach ($contracts as $contract) {
            $contract->dayOfWeek = Carbon::parse($contract->date);
            $contract->dayOfWeek = $contract->dayOfWeek->translatedFormat('l');
        }

        return view('pages.Contracts.index', [
            'contracts' => $contracts
        ]);
    }
}
