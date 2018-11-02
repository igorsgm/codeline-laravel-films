<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Repositories\GenreRepository;
use App\Traits\BaseResponseTrait;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Thomisticus\Generator\Criteria\LimitOffsetCriteria;

/**
 * Class GenreController
 * @package App\Http\Controllers\API
 */
class GenreAPIController extends Controller
{
    use BaseResponseTrait;

    /** @var  GenreRepository */
    private $genreRepository;

    public function __construct(GenreRepository $genreRepo)
    {
        $this->genreRepository = $genreRepo;
    }

    /**
     * Display a listing of the Genre.
     * GET|HEAD /genres
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->genreRepository->pushCriteria(new RequestCriteria($request));
        $this->genreRepository->pushCriteria(new LimitOffsetCriteria($request));

        $genres = $this->genreRepository->all();

        return $this->sendResponse($genres, __('responses.success.list'));
    }

    /**
     * Display the specified Genre.
     * GET|HEAD /genres/{id}
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var Genre $genre */
        $genre = $this->genreRepository->find($id);

        return $this->sendResponse($genre, __('responses.success.item'));
    }
}
