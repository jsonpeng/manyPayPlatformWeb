<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubmitLog
 * @package App\Models
 * @version July 19, 2018, 4:43 pm CST
 *
 * @property string name
 * @property string email
 * @property string submit_sex
 * @property string submit_data
 * @property string pay_status
 * @property float price
 * @property string rec_name
 */
class SubmitLog extends Model
{
    use SoftDeletes;

    public $table = 'submit_logs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'submit_sex',
        'submit_data',
        'pay_status',
        'price',
        'rec_name',
        'pay_platform'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'submit_sex' => 'string',
        'submit_data' => 'string',
        'pay_status' => 'string',
        'price' => 'float',
        'rec_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
