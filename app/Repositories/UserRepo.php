<?php

namespace app\Repositories;

use App\Contract\UserRepositoryInterface;


use App\Models\User;
// use App\Models\UserType;


class UserRepo implements UserRepositoryInterface
{

  public function getAllUsers()
  {
    return User::all();
  }

  // public function getUserById($id)
  // {
  //   return User::find($id);
  // }

  public function getUserById(User $user)
  {
    return $user;
  }

  public function updateUser($id, $data)
  {
    return User::find($id)->update($data);
  }

  public function deleteUser(User $user)
  {
    $user->delete();
  }

  public function createUser(array $attributes)
  {
    return User::create($attributes);
  }


  public function getWhere($where,)
  {
    // $user = User::where('token', $token)->where('email', $email)->first();
  }
}
