<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title', 'body', 
    ];

   /** 
     * 
     ** The RelationShip between Post And User ==>  Many To One==>
     * 
     */  
     public function user(){
        return $this->belongsTo('App\User');
    }  

    public function comments(){
        return $this->hasMany('App\Comment');
    }  

}
