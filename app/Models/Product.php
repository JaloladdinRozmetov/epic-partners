<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $table ="objects";

    protected $fillable = ['name'];


    /**
     * @return BelongsToMany
     */
    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class,'object_category','category_id','object_id');
    }
}
