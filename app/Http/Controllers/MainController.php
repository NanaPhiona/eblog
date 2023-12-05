<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

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

    public function model_saving(){
        $model = new NewsCategory();
        $model->name = 'Local ';
        $model->photo = 'no_image.jpeg';
        $model->details = 'Local News details ';
        //$model->save();
        die("Done Processing");
    }

    public function model_querying(){

        //limit
        $cats = NewsCategory::where([])
            ->limit(4)
            ->get();

        echo "<h2>LIMIT</h2>";
        foreach ($cats as $key => $cat){
            echo "{$cat->id}. {$cat->name}<br>";
        }


        //where
        $cats = NewsCategory::where([
            'name' => 'Politics'
        ])->get();

        echo "<h2>WHERE</h2>";
        foreach ($cats as $key => $cat){
            echo "{$cat->id}. {$cat->name}<br>";
        }

        //orWhere
        $cats = NewsCategory::where([
            'name' => 'Entertainment',
        ])
        ->orWhere([
            'id' => 1
        ])
        ->orWhere([
            'id' => 4
        ])
        ->get();

        echo "<h2>OR WHERE</h2>";
        foreach ($cats as $key => $cat){
            echo "{$cat->id}. {$cat->name}<br>";
        }

        //WhereIn
        $cats = NewsCategory::whereIn('id',[1,6,3])->get();

        echo "<h2>WHERE IN</h2>";
        foreach ($cats as $key => $cat){
            echo "{$cat->id}. {$cat->name}<br>";
        }



       // dd($cats);

            //All
        $categories = NewsCategory::all();
        echo "<h2>ALL</h2>";
        foreach ($categories as $key => $cat){
          echo "{$cat->id}. {$cat->name}<br>";
        }
        //dd($categories);
        //die('Done Querying');
    }

}
