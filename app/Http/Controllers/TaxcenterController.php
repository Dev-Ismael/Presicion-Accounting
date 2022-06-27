<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaxcenterController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


    public function index()
    {
        return view('tax_center');
    }


}
