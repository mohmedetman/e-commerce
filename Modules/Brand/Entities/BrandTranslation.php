<?php

namespace Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandTranslation extends Model
{
  
    protected $fillable = ['name'];
    public $timestamps = false;
}