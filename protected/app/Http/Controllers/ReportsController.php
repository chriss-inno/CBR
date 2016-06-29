<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getSrReports()
    {
        return view('reports.sr');
    }
    public function getMrReports()
    {
        return view('reports.mr');
    }
    public function generalReports()
    {
       return view('reports.general');
    }

}
