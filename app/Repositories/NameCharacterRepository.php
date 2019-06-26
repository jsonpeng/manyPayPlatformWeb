<?php

namespace App\Repositories;

use App\Models\NameCharacter;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NameCharacterRepository
 * @package App\Repositories
 * @version July 19, 2018, 9:57 am CST
 *
 * @method NameCharacter findWithoutFail($id, $columns = ['*'])
 * @method NameCharacter find($id, $columns = ['*'])
 * @method NameCharacter first($columns = ['*'])
*/
class NameCharacterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_id',
        'character'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NameCharacter::class;
    }
}
