<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //指定表面
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
