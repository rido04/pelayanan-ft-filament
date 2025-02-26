<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffCs extends Model
{
    protected $fillable = ['nama', 'email', 'password'];
    protected $guraded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
