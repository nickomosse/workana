<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function signalConfigsEdit(){
        $basecalc = (Cache::get('basecalc')) ?: 0;
        $signal = (Cache::get('signal')) ?: 25;

        $payments_types = config('payments.payments_types');
        // $signal_types = config('payments.signal_types');
        if(Cache::get('payments_types')) $payments_types = Cache::get('payments_types');
        // if(Cache::get('signal_types')) $signal_types = Cache::get('signal_types');

        return view('pages.Payments.editSignal', [
            'basecalc' => $basecalc,
            'signal' => $signal,
            'payments_types' => $payments_types
            // 'signal_types' => $signal_types

        ]);
    }

    public function signalConfigsUpdate(Request $request){
        Cache::forever('basecalc', $request['basecalc']);
        Cache::forever('signal', $request['signal']);

        return redirect()->back();
    }


    public function signalEnable($name){
        $signal_types = Cache::get('signal_types');
        if(!$signal_types) {
            $signal_types = config('payments.signal_types');
            Cache::forever('signal_types', $signal_types);
        }


        $signal_types[$name]['active'] = true;
        Cache::forever('signal_types', $signal_types);

        return redirect()->back();
    }

    public function signalDisable($name){
        $signal_types = Cache::get('signal_types');
        $signal_types[$name]['active'] = false;
        Cache::forever('signal_types', $signal_types);

        return redirect()->back();
    }

    public function signalAdd(Request $request) {
        $signal_types = Cache::get('signal_types');
        if(!$signal_types) {
            $signal_types = config('payments.signal_types');
            Cache::forever('signal_types', $signal_types);
        }

        $signal_types = ['name' => $request->name, 'active' => false, 'native' => false];
        $signal_types[$request->name] = $signal_types;
        Cache::forever('signal_types', $signal_types);

        return redirect()->back();

    }

    public function signalDel($name) {
        $signal_types = Cache::get('signal_types');

        if($signal_types[$name]['native']) return redirect()->back();

        unset($signal_types[$name]);

        Cache::forever('signal_types', $signal_types);

        return redirect()->back();

    }
    // ====================================================================

    public function paymentsConfigsEdit(){
        if(Cache::get('limit_days_before_event')) {
            $limit_days_before_event = Cache::get('limit_days_before_event');
        } else {
            $limit_days_before_event = config('payments.payments_config.limit_days_before_event');
        }

        $payments_types = config('payments.payments_types');
        if(Cache::get('payments_types')) $payments_types = Cache::get('payments_types');
        // Cache::forget('payments_types');
        // dd($payments_types);

        return view('pages.Payments.ConfigsEdit', [
            'limit_days_before_event' => $limit_days_before_event,
            'payments_types' => $payments_types
        ]);
    }

    public function paymentsConfigsUpdate(Request $request){
        $limit_days_before_event = $request['limit'];
        $payments_types = config('payments.payments_types');

        Cache::forever('limit_days_before_event', $limit_days_before_event);

        return redirect()->back();
    }

    public function paymentsEnable($name){
        $payments_types = Cache::get('payments_types');
        if(!$payments_types) {
            $payments_types = config('payments.payments_types');
            Cache::forever('payments_types', $payments_types);
        }


        $payments_types[$name]['active'] = true;
        Cache::forever('payments_types', $payments_types);

        return redirect()->back();
    }

    public function paymentsDisable($name){
        $payments_types = Cache::get('payments_types');
        $payments_types[$name]['active'] = false;
        Cache::forever('payments_types', $payments_types);

        return redirect()->back();
    }

    public function paymentsAdd(Request $request) {
        $payments_types = Cache::get('payments_types');
        if(!$payments_types) {
            $payments_types = config('payments.payments_types');
            Cache::forever('payments_types', $payments_types);
        }

        $payments_type = ['name' => $request->name, 'active' => false, 'native' => false];
        $payments_types[$request->name] = $payments_type;
        Cache::forever('payments_types', $payments_types);

        return redirect()->back();

    }

    public function paymentsDel($name) {
        $payments_types = Cache::get('payments_types');

        if($payments_types[$name]['native']) return redirect()->back();

        unset($payments_types[$name]);

        Cache::forever('payments_types', $payments_types);

        return redirect()->back();

    }
}
