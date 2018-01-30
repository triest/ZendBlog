<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 06.11.2017
 * Time: 1:24
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    public $timestamps = false;
    protected $fillable=['id','position'];
}