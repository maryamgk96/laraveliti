<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body',  'user_id','slug',
    ];

    protected $dates = ['deleted_at'];

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
