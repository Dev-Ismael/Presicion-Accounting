<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $services = [
        //     [
        //         "id"     => 3,
        //         "title"  => "Individual Services",
        //     ],
        //     [
        //         "id"     => 4,
        //         "title"  => "Bookkeeping Services",
        //     ],
        //     [
        //         "id"     => 5,
        //         "title"  => "Payroll Services",
        //     ],
        // ];


        $sub_services = [
            [
                "id"     => 6,
                "title"  => "Tax Preparation Services",
            ],
            [
                "id"     => 7,
                "title"  => "Tax Debt, And Tax Issues",
            ],
        ];

        // $services     = Article::where([ ['type','service'],['parent_id', Null] ])->get();
        // $sub_services = Article::where([ ['type','service'],['parent_id', '!=', Null] ])->get();

        foreach($sub_services as $x => $x_value) {
            return "Key=" . $x . ", Value=" . $x_value;
        }

    }
}
