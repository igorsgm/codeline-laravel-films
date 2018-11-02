<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Repositories\CountryRepository;
use App\Traits\BaseResponseTrait;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Thomisticus\Generator\Criteria\LimitOffsetCriteria;

/**
 * Class CountryController
 * @package App\Http\Controllers\API
 */
class CountryAPIController extends Controller
{
    use BaseResponseTrait;

    /** @var  CountryRepository */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Country.
     * GET|HEAD /countries
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->countryRepository->pushCriteria(new RequestCriteria($request));
        $this->countryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $countries = $this->countryRepository->all();

        return $this->sendResponse($countries, __('responses.success.list'));
    }

    /**
     * Display the specified Country.
     * GET|HEAD /countries/{id}
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        /** @var Country $country */
        $country = $this->countryRepository->find($id);

        return $this->sendResponse($country, __('responses.success.item'));
    }
}
