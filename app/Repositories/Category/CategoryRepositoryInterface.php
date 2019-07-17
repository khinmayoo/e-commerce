<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function get();
    public function getByPages();
    public function getById($id);
    public function store($data);
    public function update($data);
    public function destroy($id);
}