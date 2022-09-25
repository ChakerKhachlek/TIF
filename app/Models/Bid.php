<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'phone',
        'bid_price',
        'display'
    ];

    public function tif()
    {
        return $this->belongsTo(Tif::class,'tif_id','id');
    }
}
