<?php

namespace App\Http\Controllers;

use App\Repositories\GenreRepository;
use Illuminate\Http\Request;
use Response;

class GenreController extends Controller
{
    /** @var  GenreRepository */
    private $genreRepository;

    public function __construct(GenreRepository $genreRepo)
    {
        $this->genreRepository = $genreRepo;
    }

    /**
     * Display a listing of the Genre.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $genres = $this->genreRepository->all();

        return view('genres.index')->with('genres', $genres);
    }
}
