<?php

namespace Modules\ModuleAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
    use HasFactory;
    use Translatable;

    protected $guarded = [];
    protected $with = ['translations'];


    protected $translatedAttributes = ['value'];

    
    public static function setMany($settings)  {
        foreach ($settings as $key => $value) {
           self::set($key,$value);
        }
        
    }
  public static function set($key,$value){


    if ($key === 'translatable') {
        return static::setTranslatableSettings
        ($value);
    }


    if(is_array($value)){
        $value = json_encode($value);
    }
    static::updateOrCreate(['key' => $key], ['plain_value' => $value]);
    
  }
 

//   public static function setTranslatableSettings ($settings=[]){
//  foreach ($settings as $key => $value) {
//     static::updateOrCreate(['key'=>$key,
//     'is_translatable'=>'1',
//     'plain_value'=>$value,
    
//  ]);
//  }
    
//   }
public static function setTranslatableSettings($settings = [])
{
    foreach ($settings as $key => $value) {
        static::updateOrCreate(['key' => $key], [
            'is_translatable' => true,
            'value' => $value,
        ]);
    }
}
    
    // public $translatedAttributes = ['title', 'description'];
    // public static function setMany($settings=[]){
    //     foreach ($settings as $key => $value) {
    //         if (is_array($value)){
    //             $value = json_encode($value);
    //         }
    //         static::updateOrCreate(['key'=>$key,'plain_value'=>$value]);
    //     }
        
    // }
}