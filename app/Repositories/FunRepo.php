<?php
namespace App\Repositories;
class FunRepo {
    /**
     * Get All
     * @param string $className
     * @param array $selected
     * @param array $relation
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(string $className, array $selected, array $relation) {
        return $className::select($selected)->with($relation)->simplePaginate(10);
    }

    /**
     * search
     * @param string $search
     * @param string $param
     * @param string $className
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(string $className, string $search, string $param) {
        return $className::where($param, 'like', "%".$search."%")
        ->simplePaginate(10);
    }

    /**
     * find
     * @param int $Id
     * @param string $className
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function find(string $className, int $id){
        return $className::where('id', $id)->firstOrFail();
    }

    /**
     * add or update
     * @param string $className
     * @param int $id
     * @param array $data
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(string $className, int $id, array $data) {
        return $className::updateOrCreate(['id' => $id],$data);
    }

    /**
     * delete
     * @param string $className
     * @param int $id
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(string $className, int $id) {
        return $className::where('id', $id)->delete();
    }

    /**
     * Trash Can
     * @param string $className
     * @return \Illuminate\Http\JsonResponse
     */
    public function onlyTrash(string $className)
    {
        return $className::onlyTrashed()->simplePaginate(10);
    }

    /**
     * Restore datas from trash can
     * @param string $className
     * @return \Illuminate\Http\JsonResponse 
     */
    public function restores(string $className) {
        return $className::onlyTrashed()->restore();
    }

    /**
     * Restore data from trash can
     * @param string $className
     * @param int $id
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(string $className, int $id){
        return $className::onlyTrashed()->where('id', $id)->restore();
    }

    /**
     * Delete datas from trash can
     * @param string $className
     * @return \Illuminate\Http\JsonResponse 
     */
    public function deletesTrash(string $className) {
        return $className::onlyTrashed()->forceDelete();
    }

    /**
     * Delete data from trash can
     * @param string $className
     * @param int $id
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTrash(string $className, int $id){
        return $className::onlyTrashed()->where('id', $id)->forceDelete();
    }    
}