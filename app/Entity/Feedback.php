<?php
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;


class Feedback extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feedback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','email','telephone','feedback_nature','details'];

   
}
