<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App\Models
 *
 * @property \Illuminate\Database\Eloquent\Collection films
 * @property string                                   code
 * @property string                                   name
 */
class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'countries';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function films()
    {
        return $this->hasMany(Film::class, 'country_id', 'id');
    }
}
