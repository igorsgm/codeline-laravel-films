<?php

namespace App\Services;

use App\Criteria\LimitOffsetCriteria;
use App\Http\Requests\FilmRequest;
use App\Repositories\CountryRepository;
use App\Repositories\FilmRepository;
use App\Repositories\GenreRepository;
use Exception;
use Flash;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Prettus\Repository\Criteria\RequestCriteria;

//use App\Models\Film;

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
     * @var GenreRepository
     */
    public $genreRepository;

    /**
     * FilmService constructor.
     *
     * @param CountryRepository $countryRepository
     * @param FilmRepository    $filmRepository
     * @param ImageService      $imageService
     * @param GenreRepository   $genreRepository
     */
    public function __construct(
        CountryRepository $countryRepository,
        FilmRepository $filmRepository,
        ImageService $imageService,
        GenreRepository $genreRepository
    ) {
        $this->filmRepository    = $filmRepository;
        $this->imageService      = $imageService;
        $this->countryRepository = $countryRepository;
        $this->genreRepository   = $genreRepository;
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
        $this->filmRepository->pushCriteria(new LimitOffsetCriteria($request));

        return $this->filmRepository->orderBy('created_at', 'desc')->paginate(1);
    }

    /**
     * Data of a Film by primary key
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
     * Data of a Film by slug
     *
     * @param string $slug
     *
     * @return mixed
     * @throws \Exception
     */
    public function findBySlug($slug)
    {
        try {
            return $this->filmRepository->findByField(['slug' => $slug])->first();
        } catch (Exception $e) {
            return $e;
        }
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

        $film = $this->filmRepository->create($data);
        $film->genres()->sync($data['genres']);

        return $film;
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

        if (empty($data['image_path'])) {
            unset($data['image_path']);
        }

        /** @var /Models/Film $film */
        $film = $this->filmRepository->update($data, $id);

        $film->genres()->sync($data['genres']);

        return $film;
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

        if (!empty($data['genres']) && is_string($data['genres'])) {
            $data['genres'] = explode(',', $data['genres']);
        }

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

    /**
     * Retrieves necessaries select datas to populate in view
     * @return array
     */
    public function getViewSelectsData()
    {
        $countries = $this->countryRepository->pluck('name', 'id');
        $genres    = $this->genreRepository->pluck('name', 'id');

        return compact('countries', 'genres');
    }
}