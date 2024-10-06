<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use Illuminate\Http\Request;

class AutoPageController extends Controller
{
    public function cityMainPage($city)
    {
        $cityname = City::where('slug', $city)->value('name');
        Session::put('maincity', $city);
        Session::put('maincityname', $cityname);

        $main= $cityname.' MAIN page. ';
        $main=$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main.$main;

        return view('autoPageView', compact('city', 'main', 'cityname'));
    }
    public function cityAboutPage($city)
    {
        $cityname = City::where('slug', $city)->value('name');
        $about= $cityname.' ABOUT content. ';
        $about=$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about.$about;

        return view('autoPageView', compact('city', 'about', 'cityname'));
    }
    public function cityNewsPage($city)
    {
        $cityname = City::where('slug', $city)->value('name');
        $news=$cityname.' NEWS content. ';
        $news=$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news.$news;
        return view('autoPageView', compact('city', 'news', 'cityname'));
    }
}
