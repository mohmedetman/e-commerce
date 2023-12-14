<?php

namespace Modules\Product\Http\Controllers;

use App\Helpers\helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Category;
use Modules\Product\Helpers\UploaderHelper;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Action\ProductCategoryAction;
use Modules\Product\Http\Requests\CreateProductCategoryRequest;

class CategoryController extends Controller
{
    // use UploaderHelper;
    public function __construct(protected ProductCategoryAction $productCategoryAction)
    {
    }

    // use UploaderHelper;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $product_category = $this->productCategoryAction->getAll();
        // return $product_category;
        return view('product::MainCategory.index', compact('product_category'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $parentCategories = $this->productCategoryAction->getAll();
        return view('product::MainCategory.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateProductCategoryRequest $request)
    {
        // return $request ;

        // $data = $request->validated();
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
        $request->request->add(['is_active' => 1]);
        $product_category =  $this->productCategoryAction->store($request->all());
        return redirect()->route('admin.product_category.index')->with('success', 'product  Category has been added');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}