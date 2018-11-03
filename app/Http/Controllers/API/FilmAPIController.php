<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmRequest;
use App\Models\Film;
use App\Services\FilmService;
use App\Traits\BaseResponseTrait;
use Illuminate\Http\Request;
use Response;

/**
 * Class FilmController
 * @package App\Http\Controllers\API
 */
class FilmAPIController extends Controller
{
    use BaseResponseTrait;

    /**
     * @var FilmService
     */
    private $filmService;

    /**
     * FilmAPIController constructor.
     *
     * @param FilmService $filmService
     */
    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    /**
     * Display a listing of the Film.
     * GET|HEAD /films
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $films = $this->filmService->all($request);

        return $this->sendResponse($films, __('responses.success.list'));
    }

    /**
     * Store a newly created Film in storage.
     * POST /films
     *
     * @param FilmRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(FilmRequest $request)
    {
        $film = $this->filmService->store($request);

        return $this->sendResponse($film, __('responses.success.create'));
    }

    /**
     * Display the specified Film.
     * GET|HEAD /films/{slug}
     *
     * @param  string $slug
     *
     * @return \Illuminate\Http\JsonResponse|Response
     * @throws \Exception
     */
    public function show($slug)
    {
        /** @var Film $film */
        $film = $this->filmService->findBySlug($slug);

        return $this->sendResponse($film, __('responses.success.item'));
    }

    /**
     * Update the specified Film in storage.
     * PUT/PATCH /films/{id}
     *
     * @param  int        $id
     * @param FilmRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, FilmRequest $request)
    {
        $film = $this->filmService->update($request, $id);

        return $this->sendResponse($film, __('responses.success.update'));
    }

    /**
     * Remove the specified Film from storage.
     * DELETE /films/{id}
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        $this->filmService->destroy($id);

        return $this->sendResponse($id, __('responses.success.destroy'));
    }
}
