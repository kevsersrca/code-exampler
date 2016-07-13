<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //başlık,açıklaması,kullanımı,örneği

    protected $fillable = [
        'title', 'explanation', 'usage','codeexample'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','post_id');
    }
}
