<?php

namespace App\Repositories\Product;

interface ProductsRepositoryInterface
{
    public function get(); // all lists
    public function getById($id); // show
    public function store($data); // save
    public function update($data);  // update
    public function destroy($id);  //delete
}