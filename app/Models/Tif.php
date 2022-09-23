<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tif extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'reference',
        'description',
        'price',
        'tif_img_url',
        'status',
        'realisation_date',
        'auction_start_date',
        'auction_duration',
        'auction_top_biding_price',
        'owner_id'
    ];

    public function getSlugAttribute(): string
    {
        return Str::slug($this->reference.'-'.$this->title);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class,'owner_id','id');
    }
}
