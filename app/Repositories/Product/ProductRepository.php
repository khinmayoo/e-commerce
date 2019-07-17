<?php

namespace App\Repositories\Product;

use App\Product;

class ProductRepository implements ProductsRepositoryInterface
{
    //get all products lists
    public function get()
    {
        $products = Product::query()->paginate(10);
        return $products;
    }

    //get product by Id
    public function getById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }


    //save the product
    public function store($data)
    {
        $Product = new Product;
        $Product->fill($data);
        $Product->save();
    }

    //update the product
    public function update($data)
    {
        $product = $this->getById($data['id']);
        $product->fill($data);
        $product->save($data);
    }

    //destroy the product
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}