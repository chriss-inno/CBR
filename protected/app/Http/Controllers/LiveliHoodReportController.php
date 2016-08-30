<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LiveliHoodReportController extends Controller
{
    //
    protected  $error_found;
    public function __construct()
    {
        $this->middleware('auth');
        $this->error_found="";
    }
    
    public function index()
    {
        return view('reports.livelihood.index');
    }
}
