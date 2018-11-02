<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 * @package App\Models
 *
 * @property string name
 * @property string slug
 */
class Genre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'genres';
}
