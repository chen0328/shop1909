<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivController extends Controller
{
    public function add(Request $request)
    {
       return view('admin.priv.add');
    }
}
