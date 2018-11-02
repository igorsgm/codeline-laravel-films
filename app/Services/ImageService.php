<?php

namespace App\Services;

use App\Http\Requests\FilmRequest;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\UploadedFile;
use Request;
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;

class ImageService
{
    /**
     * @param Request|FilmRequest $request
     *
     * @return string
     * @throws FileNotFoundException
     */
    public function handleImage($request)
    {
        if ($request->hasFile('image_file')) {
            return $this->saveImageFile($request->file('image_file'));
        }

        return $request->get('image_file');
    }

    /**
     * Save image file inside storage folder and retrieve it's information
     *
     * @param UploadedFile $file
     *
     * @return string
     * @throws CannotWriteFileException
     * @throws FileNotFoundException
     */
    public function saveImageFile($file)
    {
        try {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploadedimages/'), $fileName);
        } catch (\Exception $exception) {
            throw new CannotWriteFileException('Image could not be saved', 422);
        }

        return '/uploadedimages/' . $fileName;
    }
}