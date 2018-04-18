<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Post;
use App\User;


class MaxPosts implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $postsCount = POST::where('user_id', '=', $value)->get()->count();
         return $postsCount <= 3;

       
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "This User can't create more than three posts .";
    }
}
