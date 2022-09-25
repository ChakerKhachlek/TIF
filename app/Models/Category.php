<?php

namespace App\Models;


use App\Models\Tif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'category_img_link',
        'display_order',
        'views'

    ];

    public function tifs(): BelongsToMany
    {
        return $this->belongsToMany(Tif::class,'category_tif');
    }
    public function incrementViewsCount() {
        $this->views++;
        return $this->save();
    }

}
