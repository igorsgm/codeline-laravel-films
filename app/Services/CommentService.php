<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

/**
 * Class CommentService.
 * Contains business logics of CommentController
 *
 * @package namespace App\Services;
 */
class CommentService
{
    /**
     * @var CommentRepository $commentRepository
     */
    private $commentRepository;

    /**
     * CommentService constructor
     * Dependencies injection
     *
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Store a newly created Comment in storage.
     *
     * @param Request $request
     *
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(Request $request)
    {
        return $this->commentRepository->create($request->all());
    }
}
