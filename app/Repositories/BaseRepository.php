<?php

namespace App\Repositories;

use Exception;

abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository
{
    /**
     * Find data by id without fail
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function findWithoutFail($id, $columns = ['*'])
    {
        try {
            return $this->find($id, $columns);
        } catch (Exception $e) {
            return;
        }
    }
}
