<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffCs extends Model
{
    protected $fillable = ['nama', 'email', 'password'];
    protected $guraded = [];

}
