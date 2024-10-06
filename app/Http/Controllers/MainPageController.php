<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Region;

class MainPageController extends Controller
{
    public function main(Request $request)
    {
        $res = Region::with('cities')->get()->toArray();
        return view('main', ['country'=>$res]);
    }

    public function select(Request $request)
    {
        $res = Region::with('cities')->get()->toArray();
        return view('main', ['selectFlag'=> 1, 'country'=>$res]);
    }
}
