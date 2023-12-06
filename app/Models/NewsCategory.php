<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    //protected $table = news_categories;
    public function posts(){
        return $this->hasmany(NewsPost::class, 'news_category_id');
    }

    public static function boot(){
        parent::boot();
        self::creating(function ($model){
            $old = NewsCategory::where('name', $model->name)->first();
            if($old != null){
                return false;
                throw new Exception("News category with $model->name already exists");   
            }
            return $model;
        });

        self::updating(function ($model){
            $old = NewsCategory::where('name', $model->name)->first();
            if($old != null){
                return false;
                throw new Exception("News category with $model->name already exists");   
            }
            return $model;
        });
    }

    //Converting name attribute to uppcase
    //Mutators
    public function getNameAttribute($name){
        return $name;
    //     return strtoupper($name) . ".";
     }


    public function getShortNameAttribute(){
        //Short Name 
        return substr($this->name, 0, 3);
    }

    protected $appends = ['short_name'];

    use HasFactory;
}
