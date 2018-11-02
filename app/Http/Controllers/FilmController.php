<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Repositories\FilmRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FilmController extends Controller
{
    /** @var  FilmRepository */
    private $filmRepository;

    public function __construct(FilmRepository $filmRepo)
    {
        $this->filmRepository = $filmRepo;
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
        $this->filmRepository->pushCriteria(new RequestCriteria($request));
        $films = $this->filmRepository->all();

        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new Film.
     *
     * @return Response
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created Film in storage.
     *
     * @param FilmRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(FilmRequest $request)
    {
        $input = $request->all();

        $film = $this->filmRepository->create($input);

        Flash::success('Film saved successfully.');

        return redirect(route('films.index'));
    }

    /**
     * Display the specified Film.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $film = $this->filmRepository->findWithoutFail($id);

        if (empty($film)) {
            Flash::error('Film not found');

            return redirect(route('films.index'));
        }

        return view('films.show')->with('film', $film);
    }

    /**
     * Show the form for editing the specified Film.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $film = $this->filmRepository->findWithoutFail($id);

        if (empty($film)) {
            Flash::error('Film not found');

            return redirect(route('films.index'));
        }

        return view('films.edit')->with('film', $film);
    }

    /**
     * Update the specified Film in storage.
     *
     * @param  int        $id
     * @param FilmRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, FilmRequest $request)
    {
        $film = $this->filmRepository->findWithoutFail($id);

        if (empty($film)) {
            Flash::error('Film not found');

            return redirect(route('films.index'));
        }

        $film = $this->filmRepository->update($request->all(), $id);

        Flash::success('Film updated successfully.');

        return redirect(route('films.index'));
    }

    /**
     * Remove the specified Film from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $film = $this->filmRepository->findWithoutFail($id);

        if (empty($film)) {
            Flash::error('Film not found');

            return redirect(route('films.index'));
        }

        $this->filmRepository->delete($id);

        Flash::success('Film deleted successfully.');

        return redirect(route('films.index'));
    }
}
