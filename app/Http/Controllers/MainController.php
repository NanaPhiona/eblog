<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NewsPost;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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

        //Appends
        $cats = NewsCategory::where([])
            ->get();
        echo "<h2>Append</h2>";
        foreach ($cats as $key => $cat){
            echo "{$cat->id}. {$cat->short_name}<br>";
        }

        //Like
        $cats = NewsCategory::where('name', 'like', 'Ente%')
            ->get();
        echo "<h2>LIKE</h2>";
        foreach($cats as $key => $cat){
            echo "{$cat->id}. {$cat->name}. {$cat->details}<br>";
        }


        //Find
        $cat = NewsCategory::find(1);
        echo '<h2>Find</h2>';
        if ($cat != null){
            echo "{$cat->id}. {$cat->name}";
        }

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

    public function model_relationship(){
        $cats = NewsCategory::all();
        $posts = NewsCategory::all();

        foreach($cats as $key => $c){
            echo "{$c->id}. {$c->name} - (<b>". $c->posts->count(). "</b>)<br>";
        }

        echo '<hr>';

        $p = new NewsPost();
        $p->title = "
        Among orders probe into shs 9 billion spent to teach Ugandans how to drink coffee";
        $p->body = "The Speaker of Parliament, Anita Among has ordered for an independent probe into Shs9.6 billion spent by the Office of the Prime Minister (OPM) to teach Ugandans ‘how to drink coffee’.
        Worth noting is that the OPM awarded the Shs9.6Bn contract to Inspire Africa (U) Ltd to carry out four activities to promote and encourage consumption of coffee countrywide.
        Accordingly, of the Shs9.6bn, Shs3.8bn was spent on training youths in coffee production, Shs1.9bn on consumption of coffee and putting up coffee shops, Shs2.6bn on capacity building while Shs1.2 on administration.";
        $p->photo = 'no_image.jpeg';
        $p->views = 0;
        $p->user_id = 1;
        $p->news_category_id = rand(1, 5);
        //$p->save();

        foreach($posts as $key => $p){
            echo "{$p->id}. <b>{$p->name}</b>: {$p->title}<br>";
        }

        dd(count($posts));

        die("Relationship");
    }

    public function register(Request $r){
        if($r->password != $r->comfirm_password){
            return Redirect::back()
            ->withErrors(['password' => ['Passwords did not match']])
            ->withInput();
        }
        $u = User::where('email', $r->email)->first();

        if($u != null){
            return Redirect::back()
            ->withErrors(['email'=>['User with same email address already exists on your database']])
            ->withInput();
        }

        $u = new User();
        $u->name = $r->name;
        $u->email = $r->email;
        $u->password = password_hash($r->password, PASSWORD_DEFAULT);
        $u->user_type = 'default';

        try{
            $u->save();

            $credentilas = [
                'email' => $u->email,
                'password' => $r->password,
            ];

            if(Auth::attempt($credentilas)){
                return redirect()->intended('dashboard');
            }else{
                return Redirect::back()
                ->withErrors(['email' => ['Failed to log in.']])
                ->withInput();

            }

        }catch(\Throwable $th){
            return Redirect::back()
            ->withErrors(['email' => ['Failed to create account because '. $th]])
            ->withInput();
        }

    }

    
    public function login(Request $r){
        if($r->login_email == null){
            return Redirect::back()
            ->withErrors(['login_email' => ['An Email is needed.']])
            ->withInput();
        }
        if($r->login_password == null){
            return Redirect::back()
            ->withErrors(['login_password' => ['Password is needed.']])
            ->withInput();
        }
        $u = User::where('email', $r->login_email)->first();

        if($u == null){
            return Redirect::back()
            ->withErrors(['login_email'=>['User with provided email does not exist on our database']])
            ->withInput();
        }


        $credentials = [
            'email' => $r->login_name,
            'password' => $r->login_password,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }else{
            return Redirect::back()
            ->withErrors(['login_password' => ['Wrong password.'], 'login_email'=> ['Email and password do not match']])
            ->withInput();

        }

    }

}
