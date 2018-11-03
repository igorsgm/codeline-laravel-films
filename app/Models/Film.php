<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Film
 * @package App\Models
 *
 * @property Country                                  country
 * @property \Illuminate\Database\Eloquent\Collection genres
 * @property string                                   name
 * @property string                                   slug
 * @property string                                   description
 * @property string|\Carbon\Carbon                    release_date
 * @property float                                    rating
 * @property float                                    ticket_price
 * @property integer                                  country_id
 * @property string                                   image_path
 */
class Film extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'films';

    /**
     * @var array
     */
    public $fillable = [
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
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'country',
        'genres'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'films_genres', 'film_id', 'genre_id')->withTimestamps();
    }
}
