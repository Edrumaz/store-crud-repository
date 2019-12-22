<?php

namespace App\Http\Interfaces;

interface IRepository
{
   public function index();
   public function store(array $data);
   public function find($id);
   public function update(array $data);
   public function delete();
}