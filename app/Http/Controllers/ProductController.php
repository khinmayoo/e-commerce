<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductsRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ProductController extends Controller
{
    private $productRepositoryInterface;
    private $categoryRepositoryInterface;

    /**
     * ProductController constructor.
     */
    public function __construct(ProductsRepositoryInterface $productRepositoryInterface, CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        //$this->middleware('auth')->except(['index', 'show']);
        $this->productRepositoryInterface = $productRepositoryInterface;
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepositoryInterface->getById($id);
        //return view('products.show', array('product' => $product));
        //return view('products.show', ['product' => $product]);
        return view('products.show')->with('product',$product);
        //return view('products.show', compact('product'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::query()->paginate(10);
        $products = $this->productRepositoryInterface->get();
        //return view('products.lists', array('products' => $products));
        return view('products.lists')->with('products', $products);
        //return view('products.lists', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepositoryInterface->get();
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'descriptions' => 'required',
            'name' => 'required',
            'price' => 'required',
            'produced_on' => 'required',
            'category_id' => 'required'
        ]);

        $this->productRepositoryInterface->store($data);
        return redirect('/products')->with('success', 'New support Product has been created! Wait sometime to get resolved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepositoryInterface->getById($id);
        $categories = $this->categoryRepositoryInterface->get();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'descriptions' => 'required',
            'name' => 'required',
            'price' => 'required',
            'produced_on' => 'required',
            'category_id' => 'required'
        ]);

        $data['id'] = $request->id;

        $this->productRepositoryInterface->update($data);
        return redirect('/products')->with('success', 'Support Product has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepositoryInterface->destroy($id);
        return redirect('/products')->with('success', 'Product has been deleted!!');
    }
}
