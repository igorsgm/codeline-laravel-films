<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Services\FilmService;
use Flash;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;

/**
 * Class FilmController
 * @package App\Http\Controllers
 */
class FilmController extends Controller
{
    /**
     * @var FilmService
     */
    private $filmService;

    /**
     * FilmController constructor.
     *
     * @param FilmService $filmService
     */
    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    /**
     * Display a listing of the Film.
     *
     * @param Request $request
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $films = $this->filmService->all($request);

        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new Film.
     *
     * @return Response
     */
    public function create()
    {
        $countries = $this->filmService->countryRepository->pluck('name');

        return view('films.create', compact('countries'));
    }

    /**
     * Store a newly created Film in storage.
     *
     * @param FilmRequest $request
     *
     * @return RedirectResponse|Redirector|Response
     * @throws ValidatorException
     * @throws FileNotFoundException
     */
    public function store(FilmRequest $request)
    {
        if ($film = $this->filmService->store($request)) {
            Flash::success(__('responses.success.create'));

            return redirect(route('films.index'));
        }

        return $this->filmService->filmNotFound();
    }

    /**
     * Display the specified Film.
     *
     * @param  int $id
     *
     * @return RedirectResponse|Redirector|Response
     * @throws \Exception
     */
    public function show($id)
    {
        if ($film = $this->filmService->find($id)) {
            return view('films.show', compact('film'));
        }

        return $this->filmService->filmNotFound();
    }

    /**
     * Show the form for editing the specified Film.
     *
     * @param  int $id
     *
     * @return RedirectResponse|Redirector|Response
     * @throws \Exception
     */
    public function edit($id)
    {
        if ($film = $this->filmService->find($id)) {
            $countries = $this->filmService->countryRepository->pluck('name');

            return view('films.edit', compact('film', 'countries'));
        }

        return $this->filmService->filmNotFound();

    }

    /**
     * Update the specified Film in storage.
     *
     * @param  int        $id
     * @param FilmRequest $request
     *
     * @return RedirectResponse|Redirector|Response
     * @throws ValidatorException
     * @throws FileNotFoundException
     * @throws \Exception
     */
    public function update($id, FilmRequest $request)
    {
        if ($film = $this->filmService->update($request, $id)) {
            Flash::success(__('responses.success.update'));

            return redirect(route('films.index'));
        }

        return $this->filmService->filmNotFound();

    }

    /**
     * Remove the specified Film from storage.
     *
     * @param  int $id
     *
     * @return RedirectResponse|Redirector|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        if ($film = $this->filmService->destroy($id)) {
            Flash::success(__('responses.success.destroy'));

            return redirect(route('films.index'));
        }

        return $this->filmService->filmNotFound();
    }
}
