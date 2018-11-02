<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Country
 * @package App\Models
 *
 * @property string code
 * @property string name
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
     * @var array
     */
    public $fillable = [
        'code',
        'name'
    ];

}
