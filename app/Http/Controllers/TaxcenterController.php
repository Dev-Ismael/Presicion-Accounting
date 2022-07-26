<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxCenter;

class TaxcenterController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


    public function index($slug)
    {
        $tax_center = TaxCenter::where('slug',$slug)->first();
        // if product Not Found
        if( !$tax_center ){
            return redirect('/');
        }
        return view('tax_center',compact("product"));
    }


}
