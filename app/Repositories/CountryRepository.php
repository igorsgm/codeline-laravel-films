<?php

namespace App\Repositories;

use App\Models\Country;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CountryRepository
 * @package App\Repositories
 */
class CountryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Country::class;
    }
}
