<?php

namespace Frontend\Models;

use Phalcon\Mvc\Model;

class User extends Model
{
    public $id;
    public $login;
    public $name;
    public $password;
    public $date_create;


} 