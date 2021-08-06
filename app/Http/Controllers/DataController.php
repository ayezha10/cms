<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        $title = 'List Data Diri';
        $data = DB::table('datadiri')->get();

        return view('datadiri', compact('title', 'data'));
    }
}
