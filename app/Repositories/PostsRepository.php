<?php
/**
 * Created by PhpStorm.
 * User: menna
 * Date: 17/08/2018
 * Time: 02:37:42 AM
 */

namespace App\Repositories;


use App\Models\Post;

/**
 * Class PostsRepository
 * @package App\Repositories
 */
class PostsRepository
{
    /**
     * @var Post
     */
    private $post;

    /**
     * PostsRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll(){
        return $this->post->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id){
        return $this->post->findOrFail($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->post->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data){
        $post = $this->getById($id);
        $post->update($data);
        return $post;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id){
        $post = $this->getById($id)->delete();
        return true;
    }
}