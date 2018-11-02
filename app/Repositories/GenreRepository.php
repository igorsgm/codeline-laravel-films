<?php

namespace App\Repositories;

use App\Models\Genre;

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
