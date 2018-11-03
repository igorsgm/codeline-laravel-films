<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use App\Traits\BaseResponseTrait;
use Flash;

/**
 * Class CommentController.
 *
 * @package namespace App\Http\Controllers;
 */
class CommentController extends Controller
{
    use BaseResponseTrait;

    /**
     * @var CommentService $commentService
     */
    protected $commentService;

    /**
     * CommentController constructor.
     *
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Store a newly created Comment in storage.
     *
     * @param CommentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CommentRequest $request)
    {
        $this->commentService->create($request);

        Flash::success('Comment added successfully.');

        return redirect()->back();
    }

}
