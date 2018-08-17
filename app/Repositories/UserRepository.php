<?php
/**
 * Created by PhpStorm.
 * User: menna
 * Date: 17/08/2018
 * Time: 02:37:21 AM
 */

namespace App\Repositories;


use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll(){
        return $this->user->all();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data){
        return $this->user->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id){
        return $this->user->findOrFail($id);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data){
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id){
        $user = $this->getById($id)->delete();
        return true;
    }

}