<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BerandaController extends Controller
{
    public function index()
    {
        $title = 'Beranda';
        $subtitle = 'Home';
        $total_user = DB::table('users')->count();
        $total_cab = DB::table('cabang')->count();
        $total_adviser = DB::table('adviser')->count();
        return view('beranda', compact('title', 'subtitle'))
        ->with(['totaluser'=>$total_user])
        ->with(['totalcab'=>$total_cab])
        ->with(['totaladviser'=>$total_adviser])
        ;
    }
}
