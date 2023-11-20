<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('Pages.Reports.index');
    }


    public function clientssearch(){
        return view('Pages.Reports.Clients.search');

    }
}
