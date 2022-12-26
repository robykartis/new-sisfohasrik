<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function php()
    {
        $route_php = route('php');
        $route = route('admin');
        $route = route('operator');
        $route = route('readonly');
        return view('laporan.laporan_php', [
            'route' => $route,
            'route_php' => $route_php
        ]);
    }
}
