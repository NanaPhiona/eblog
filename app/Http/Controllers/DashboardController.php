<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\Utils;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('dashboard/index');
    }


    public function categories(){
        return view('dashboard/categories');
    }

    public function create_categories(){
        return view('dashboard/create_categories');
    }

    public function categories_store(Request $r){
        $images = Utils::file_uploader($_FILES);
        $thumb = "no_image.jpg";

        if(isset($images[0])){
            $thumb = $images[0];
        }

        $cat = new  NewsCategory();
        $cat->name = $_POST['name'];
        $cat->details = $_POST['details'];
        $cat->photo = $thumb;


        if($cat->save()){
            return redirect()->intended('categories');
        }else{
            return Redirect::back()
            ->withInput();
        }
    }



}
