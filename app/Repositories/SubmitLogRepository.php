<?php

namespace App\Repositories;

use App\Models\SubmitLog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubmitLogRepository
 * @package App\Repositories
 * @version July 19, 2018, 4:43 pm CST
 *
 * @method SubmitLog findWithoutFail($id, $columns = ['*'])
 * @method SubmitLog find($id, $columns = ['*'])
 * @method SubmitLog first($columns = ['*'])
*/
class SubmitLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'submit_sex',
        'submit_data',
        'pay_status',
        'price',
        'rec_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubmitLog::class;
    }
}
