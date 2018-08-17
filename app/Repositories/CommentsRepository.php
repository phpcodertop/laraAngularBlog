<?php
/**
 * Created by PhpStorm.
 * User: menna
 * Date: 17/08/2018
 * Time: 02:38:15 AM
 */

namespace App\Repositories;


use App\Models\Comment;

/**
 * Class CommentsRepository
 * @package App\Repositories
 */
class CommentsRepository
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * CommentsRepository constructor.
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll(){
        return $this->comment->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id){
        return $this->comment->findOrFail($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->comment->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data){
        $comment = $this->getById($id);
        $comment->update($data);
        return $comment;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id){
        $comment = $this->getById($id)->delete();
        return true;
    }

}