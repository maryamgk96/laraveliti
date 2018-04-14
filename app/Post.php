<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\User;
use Carbon\Carbon;

class Post extends Model
{
    
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body',  'user_id','slug',
    ];

    public function user()
    {
        
        return $this->belongsTo(User::class);
    }


        public function getDateModAttribute()
    {
        return $this->created_at->format('l jS \\of F Y h:i:s A');  
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
