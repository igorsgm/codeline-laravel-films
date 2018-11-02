<?php

namespace App\Services;

use App\Http\Requests\FilmRequest;
use App\Repositories\CountryRepository;
use App\Repositories\FilmRepository;
use Flash;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Prettus\Repository\Criteria\RequestCriteria;

class FilmService
{
    /**
     * @var ImageService
     */
    private $imageService;
    /**
     * @var FilmRepository
     */
    private $filmRepository;
    /**
     * @var CountryRepository
     */
    public $countryRepository;

    /**
     * FilmService constructor.
     *
     * @param CountryRepository $countryRepository
     * @param FilmRepository    $filmRepository
     * @param ImageService      $imageService
     */
    public function __construct(
        CountryRepository $countryRepository,
        FilmRepository $filmRepository,
        ImageService $imageService
    ) {
        $this->filmRepository    = $filmRepository;
        $this->imageService      = $imageService;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Retrieves a list of Films.
     *
     * @param Request $request
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function all(Request $request)
    {
        $this->filmRepository->pushCriteria(new RequestCriteria($request));

        return $this->filmRepository->all();
    }

    /**
     * Data of a Model by primary key
     *
     * @param int|string $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        return $this->filmRepository->findWithoutFail($id);
    }

    /**
     * Store a newly created Film in storage.
     *
     * @param Request $request
     *
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws FileNotFoundException
     */
    public function store(Request $request)
    {
        $data = $this->handleFilmData($request);

        return $this->filmRepository->create($data);
    }

    /**
     * Update the specified Film in storage.
     *
     * @param Request    $request
     * @param int|string $id
     *
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws FileNotFoundException
     */
    public function update(Request $request, $id)
    {
        $data = $this->handleFilmData($request);

        return $this->filmRepository->update($data, $id);
    }

    /**
     * Remove the specified Film from storage.
     *
     * @param int|string $id
     *
     * @return null
     * @throws \Exception
     */
    public function destroy($id)
    {
        return $this->filmRepository->delete($id);
    }

    /**
     * Handle Image path data and film's slug name bafore save
     *
     * @param FilmRequest|Request $request
     *
     * @return array
     * @throws FileNotFoundException
     */
    private function handleFilmData(FilmRequest $request)
    {
        $data               = $request->all();
        $data['image_path'] = $this->imageService->handleImage($request);
        $data['slug']       = str_slug($data['name'], '-');

        return $data;
    }

    /**
     * Redirect to films page if Film not found and flash an error message
     * @return RedirectResponse|Redirector
     */
    public function filmNotFound()
    {
        Flash::error(__('responses.error.item_not_found'));

        return redirect(route('films.index'));
    }
}