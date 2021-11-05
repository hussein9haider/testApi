<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get all of the categories for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){

        return $this->hasMany(self::class, 'parent_id');
    }

    public function children(){
        return $this->categories()->select('id','name','parent_id')->with(['children' => function($q){return $q->select('id','name','parent_id');}]);
    }

    /**
     * Get the parent that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

     /**
     * Get the parent that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->category()->select('id','name','parent_id')->with(['parent' => function($q){return $q->select('id','name','parent_id');}]);
    }

    

    
}
