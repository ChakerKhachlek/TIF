<?php

namespace App\Models;


use App\Models\Tif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'category_img_link',
        'display_order'
    ];

    public function tifs(): HasMany
    {
        return $this->hasMany(Tif::class,'category_id','id');
    }

}
