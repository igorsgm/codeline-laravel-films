<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\BaseRepository;

/**
 * Class CommentRepository
 * @package App\Repositories
*/
class CommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'message',
        'user_id',
        'film_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comment::class;
    }
}
