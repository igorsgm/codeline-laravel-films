<?php

namespace App\Http\Controllers;

use App\Repositories\FilmRepository;
use Illuminate\Http\Request;
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
     */
    public function index(Request $request)
    {
        return view('films.index');
    }
}
