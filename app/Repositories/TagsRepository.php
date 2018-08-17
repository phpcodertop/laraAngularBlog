<?php
/**
 * Created by PhpStorm.
 * User: menna
 * Date: 17/08/2018
 * Time: 02:38:02 AM
 */

namespace App\Repositories;


use App\Models\Tag;

/**
 * Class TagsRepository
 * @package App\Repositories
 */
class TagsRepository
{
    /**
     * @var Tag
     */
    private $tag;

    /**
     * TagsRepository constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll(){
        return $this->tag->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id){
        return $this->tag->findOrFail($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->tag->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data){
        $tag = $this->getById($id);
        $tag->update($data);
        return $tag;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id){
        $tag = $this->getById($id)->delete();
        return true;
    }
}