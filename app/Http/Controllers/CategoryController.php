<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductsRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories= Category::all();
        $categories= $this->categoryRepositoryInterface->getByPages();
        return view('categories.list')->with('categories',$categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$category = Category::find($id);
        $category = $this->categoryRepositoryInterface->getById($id);
        return view('categories.show')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepositoryInterface->get();
        return view('categories.create')->with('categories', $categories);
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
        ]);

        $this->categoryRepositoryInterface->store($data);
        return redirect('/categories')->with('success', 'New support Category has been created! Wait sometime to get resolved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepositoryInterface->getById($id);
        return view('categories.edit', compact('category'));
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
        ]);

        $data['id'] = $request->id;

        $this->categoryRepositoryInterface->update($data);
        return redirect('/categories')->with('success', 'Support Category has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepositoryInterface->destroy($id);
        return redirect('/categories')->with('success', 'Category has been deleted!!');
    }
}
