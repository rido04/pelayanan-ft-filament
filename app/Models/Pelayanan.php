<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelayanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','jenis_pelayanan', 'tanggal', 'jam', "created_by"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tanggal = Carbon::now()->format('Y-m-d');
            $model->jam = Carbon::now()->format('H:i:s');
        });
    }

        public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
