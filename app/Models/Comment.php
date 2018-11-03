<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 *
 * @property Film                                     film
 * @property User                                     user
 * @property \Illuminate\Database\Eloquent\Collection filmsGenr
 * @property string                                   message
 * @property integer                                  user_id
 * @property integer                                  film_id
 */
class Comment extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'comments';

    /**
     * @var array
     */
    public $fillable = [
        'message',
        'user_id',
        'film_id'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'user'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
