<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NameSet
 * @package App\Models
 * @version July 19, 2018, 9:27 am CST
 *
 * @property string name
 * @property integer use_time
 * @property string type
 */
class NameSet extends Model
{
    use SoftDeletes;

    public $table = 'name_sets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'use_time',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'use_time' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    //姓氏/名字对应的 性格
    public function characters(){
        return $this->hasMany('App\Models\NameCharacter','name_id','id');
    }

    
}
