<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\Member;
use App\Models\Service;
use App\Models\Resource;
use App\Models\TaxCenter;
use App\Models\Testimonial;

class DashboardController extends Controller
{

    public function index()
    {

        $articles     = Article::where('type','blog')->count();
        $services     = Article::where('type','service')->count();
        $tax_centers  = Article::where('type','tax_center')->count();
        $members      = Member::count();
        $resources    = Resource::count();
        $testimonials = Testimonial::count();

        return view('admin.dashboard',
            compact('articles', 'members', 'services',
            'resources', 'tax_centers', 'testimonials'));

    }

}
