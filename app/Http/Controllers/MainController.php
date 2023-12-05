<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //index controller
    public function index(){
        return view('others/index');
        // $name = "Nankya Phiona";
        // $sex = 'Female';
        // $colors = [
        //     "Blue",
        //     "Green",
        //     "Black",
        //     "Orange",
        //     "Violet",
        //     "Red"
        // ];
        // return view('home', ['name'=>$name, 'sex'=>$sex, 'colors'=>$colors]);
    }

    //about_us controller
    public function about_us(){
        return view('others/about_us');
    }

    //contact_us controller
    public function contact_us(){
        return view('others/contact_us');
    }

    //news room
    public function news_room(){
        return ("This is news room from the main controller");
    }

}
