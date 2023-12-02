<?php

namespace Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;

class Brand extends Model
{
    use Translatable, HasFactory;
    // HasFactory;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];


    protected $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'is_active'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    // protected $hidden = ['translations'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function children()
    {
        return $this->hasMany(Brand::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Brand::class, 'parent_id');
    }
    public function scopeParent($query){
        return $query -> whereNull('parent_id');
    }
    public function scopeChild($query){
        return $query -> whereNotNull('parent_id');
    }

    public function getActive(){
       return  $this -> is_active  == 0 ?  'Non Active'   : 'Active' ;
    }

    public function _parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }
}