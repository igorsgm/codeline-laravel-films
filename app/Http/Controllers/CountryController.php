<?php

namespace App\Http\Controllers;

use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CountryController extends Controller
{
    /** @var  CountryRepository */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Country.
     *
     * @param Request $request
     *
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->countryRepository->pushCriteria(new RequestCriteria($request));
        $countries = $this->countryRepository->all();

        return view('countries.index', compact('countries'));
    }
}
