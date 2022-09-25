<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Style extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'style_img_link',
        'display_order',
        'views'
    ];

    public function tifs(): HasMany
    {
        return $this->hasMany(Tif::class,'style_id','id');
    }
    public function incrementViewsCount() {
        $this->views++;
        return $this->save();
    }
}
