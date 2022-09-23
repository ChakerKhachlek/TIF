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
        return $this->belongsToMany(Category::class,'category_tif');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class,'owner_id','id');
    }

      // this is a recommended way to declare event handlers
      public static function boot() {
        parent::boot();

        static::deleting(function($tif) { // before delete() method call this
             $tif->categories()->detach();
             // do the rest of the cleanup...
        });
    }
}
