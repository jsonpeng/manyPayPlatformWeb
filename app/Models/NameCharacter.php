<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NameCharacter
 * @package App\Models
 * @version July 19, 2018, 9:57 am CST
 *
 * @property integer name_id
 * @property string character
 */
class NameCharacter extends Model
{
    use SoftDeletes;

    public $table = 'name_characters';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name_id',
        'character'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_id' => 'integer',
        'character' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
