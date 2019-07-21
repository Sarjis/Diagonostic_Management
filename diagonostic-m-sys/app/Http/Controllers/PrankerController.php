<?php

namespace App\Http\Controllers;

use App\Pranker;
use Illuminate\Http\Request;

class PrankerController extends Controller
{
    function index()
    {
        $users = Pranker::all();
        return view('welcome', ['users' => $users]);
        //return response()->json(['users' => $users], 200);
    }

}
