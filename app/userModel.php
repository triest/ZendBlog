<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 04.11.2017
 * Time: 15:07
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{

    public $timestamps = false;
    protected $fillable=['fam','im','ot','phone','log','pass','reg','token','date','position','id'];

}

