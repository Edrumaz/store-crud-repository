<?php

namespace App\Http\Repositories;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Http\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
   protected $model;

   public function __construct(User $user)
   {
      $this->model = $user;
   }

   public function index()
   {
      return $this->model->all();
   }

   public function store(array $data)
   {
      try {
         return $this->model->create($data);
      }
      catch (Exception $e) {
         throw new Exception($e);         
      }
   }

   public function update(array $data) : bool
   {
      try {
         return $this->model->update($data);
      }
      catch (Exception $e) {
         throw new Exception($e);
      }
   }

   public function find($id) : User
   {
      try {
         return $this->model->findOrFail($id);
      }
      catch (Exception $e){
         throw new Exception($e);
      }
   }

   public function delete(): ? bool
   {
      return $this->model->delete();
   }
 }