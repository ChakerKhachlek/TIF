<?php

namespace App\Models;

use App\Models\Tif;
use Illuminate\Support\Str;
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
        'phone',
        'views'
    ];

    public function getSlugAttribute(): string
    {
        return Str::slug($this->name);
    }

    public function tifs(): HasMany
    {
        return $this->hasMany(Tif::class,'owner_id','id');
    }

    public function incrementViewsCount() {
        $this->views++;
        return $this->save();
    }
}
