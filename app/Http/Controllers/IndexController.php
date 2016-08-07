<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends Controller
{
   	/**
    * Show page content
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('pages.index');
    }
}
