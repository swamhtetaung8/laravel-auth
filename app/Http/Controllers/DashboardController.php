<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        return view('dashboard.index',compact('user'));
    }
}
