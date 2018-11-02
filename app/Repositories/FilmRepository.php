<?php

namespace App\Repositories;

use App\Models\Film;

/**
 * Class FilmRepository
 * @package App\Repositories
*/
class FilmRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'description',
        'release_date',
        'rating',
        'ticket_price',
        'country_id',
        'image_path'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Film::class;
    }
}
