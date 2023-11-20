<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;


class ReferralController extends Controller
{
    private $repository;

    public function __construct(Referral $referral) {
        $this->repository = $referral;
    }

    public function index() {
        $referrals = $this->repository->all();

        return view('pages.Referrals.index', [
            'referrals' => $referrals,
        ]);
    }

    public function create() {
        return view('pages.Referrals.create');
    }

    public function store(Request $request) {
        $referral = new Referral;

        $referral->name = $request->name;

        $referral->save();

        return redirect()->route('referrals.index');
    }

    public function show($id){
        $referral = $this->repository->find($id);

        if (!$referral) { return back(); }

        return view('pages.Referrals.show', [
            'referral' => $referral,
        ]);
    }

    public function edit($id){
        $referral = Referral::find($id);

        if (!$referral) {
            return back();
        }

        return view('pages.Referrals.edit', [
            'referral' => $referral,

        ]);
    }

    public function update(Request $request, $id){
        $referral = Referral::find($id);

        if (!$referral) {
            return back();
        }

        $referral->name = $request->name;

        $referral->save();

        return redirect()->route('referrals.index');
    }

    public function destroy($id){
        $referral = $this->repository->find($id);

        $referral->delete();

        return redirect()->route('referrals.index');
    }
}
