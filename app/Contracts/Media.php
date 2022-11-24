<?php

namespace App\Contracts;

interface Media
{
    public function getWidth();
    public function getHeight();
    public function getUrl( object $img, string $folder,int  $width,int  $height, string $folderThumbnail = null, int  $widthThumbnail = null, int  $heightThumbnail = null):string;
    public function getMediaObject();
    public function deleteMedia( string $img);
}