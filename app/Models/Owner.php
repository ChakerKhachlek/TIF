<?php

namespace App\Models;

use App\Models\Tif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'owner_img_link',
        'phone'
    ];

    public function tifs(): HasMany
    {
        return $this->hasMany(Tif::class,'owner_id','id');
    }
}
