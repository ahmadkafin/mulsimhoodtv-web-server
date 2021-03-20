<?php
namespace App\Repositories;

use App\Models\GalleryM;

class GalleryRepo {
    /**
     * Get All gallery
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGallery() {
        return GalleryM::select(['id', 'hash_image', 'alt'])->get();
    }

    /**
     * search gallery
     * @param string $altImage
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchGallery(string $altImage) {
        return GalleryM::where('alt_image', 'like', "%".$altImage."%")
        ->simplePaginate(10);
    }

    /**
     * find Gallery
     * @param int $Id
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function findGallery(int $id){
        return GalleryM::where('id', $id)->firstOrFail();
    }

    /**
     * add or update gallery
     * @param int $id
     * @param array $data
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeGallery(int $id, array $data) {
        return GalleryM::updateOrCreate(['id' => $id],$data);
    }

    /**
     * delete Gallery
     * @param int $id
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteGallery(int $id) {
        return GalleryM::where('id', $id)->delete();
    }

    /**
     * Trash Can
     * @return \Illuminate\Http\JsonResponse
     */
    public function onlyTrashGallery()
    {
        return GalleryM::onlyTrashed()->simplePaginate(10);
    }

    /**
     * Restore images from trash can
     * @param string $className
     * @return \Illuminate\Http\JsonResponse 
     */
    public function restoreImages(string $className) {
        return $className::onlyTrashed()->restore();
    }

    /**
     * Restore Image from trash can
     * @param 
     */
}