<?php

namespace App\Services\Media;
use App\Contracts\Media;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageService implements Media
{
    protected $storage;
    /**
     * ImageService constructor.
     * @param $storage
     */
    public function __construct()
    {
        $this->storage = Storage::disk('image');
    }

    public function getWidth()
    {
        // TODO: Implement getWidth() method.
    }

    public function getHeight()
    {
        // TODO: Implement getHeight() method.
    }

    /**
     * @param object $img
     * @param string $folder
     * @param int $width
     * @param int $height
     * @param string|null $folderThumbnail
     * @param int|null $widthThumbnail
     * @param int|null $heightThumbnail
     * @return string
     */
    public function getUrl( object $img, string $folder,int  $width = null,int  $height = null, string $folderThumbnail = null, int  $widthThumbnail = null, int  $heightThumbnail = null):string
    {
        $path = '';
        if(count($this->storage->directories($folder)) == 0) Storage::disk('image')->makeDirectory($folder);

        if($img) {
            $path = $this->storage->putFileAs($folder, $img, rand(0,999).'-'.date('h-i-s-d-m-Y') . '.' . $img->getClientOriginalExtension());
            //Создаем миниатюру изображения и сохраняем ее
            if($width && $height){
                $thumbnail = Image::make(public_path().'/front/img/'. $path);
                $thumbnail->fit($width, $height);
                $thumbnail->save(public_path().'/front/img/'. $path);
            }
        }
        return $path;
    }

    public function getMediaObject()
    {
        // TODO: Implement getMediaObject() method.
    }

    /**
     * @param string $img
     */
    public function deleteMedia($img)
    {
        if($img) $this->storage->delete($img);
    }
}