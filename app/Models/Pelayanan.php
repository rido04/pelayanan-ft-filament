<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pelayanan extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_pelayanan', 'tanggal', 'jam', "created_by"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tanggal = Carbon::now()->format('Y-m-d');
            $model->jam = Carbon::now()->format('H:i:s');
        });
    }
}
