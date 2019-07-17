<?php

namespace App\Repositories\Category;

use App\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    //get all category lists
    public function get()
    {
        $categories = Category::all();
        return $categories;
    }

    //get all category lists by Pages
    public function getByPages()
    {
        $categories = Category::query()->paginate(5);
        return $categories;
    }

    //get category by Id
    public function getById($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }


    //save the category
    public function store($data)
    {
        $Category = new Category();
        $Category->fill($data);
        $Category->save();
    }

    //update the category
    public function update($data)
    {
        $category = $this->getById($data['id']);
        $category->fill($data);
        $category->save($data);
    }

    //destroy the category
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}