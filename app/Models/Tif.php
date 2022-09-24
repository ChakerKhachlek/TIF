<?php

namespace App\Models;

use App\Models\Style;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tif extends Model
{
    use HasFactory;
    protected $dates = ['auction_end_date','realisation_date'];
    protected $fillable = [
        'title',
        'reference',
        'description',
        'price',
        'tif_img_url',
        'status',
        'realisation_date',
        'auction_end_date',
        'auction_end_date_time',
        'auction_top_biding_price',
        'views',
        'owner_id',
        'style_id'
    ];

    public function getSlugAttribute(): string
    {
        return Str::slug($this->reference.'-'.$this->title);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_tif');
    }



    public function incrementViewsCount() {
        $this->views++;
        return $this->save();
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class,'owner_id','id');
    }

    public function style()
    {
        return $this->belongsTo(Style::class,'style_id','id');
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
