<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
        public function home()
    {
        return 'Home page';
    }

    public function about()
    {
        return 'About us';
    }

    public function contact()
    {
        return 'Contact us';
    }
}
