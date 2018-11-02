<?php

namespace App\Repositories;

use App\Models\Genre;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class GenreRepository
 * @package App\Repositories
*/
class GenreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Genre::class;
    }
}
