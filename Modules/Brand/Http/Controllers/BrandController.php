<?php

namespace Modules\Brand\Http\Controllers;

use App\Helpers\helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Entities\Category;
use Modules\Brand\Action\BrandAction;
use Modules\Brand\Helpers\UploaderHelper;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Action\BrandCategoryAction;
// use Modules\Product\Http\Requests\CreateBrandRequest;
use Modules\Brand\Http\Requests\CreateBrandRequest;

class BrandController extends Controller
{
    // use UploaderHelper;
    public function __construct(protected BrandAction $brandAction)
    {
    }

    // use UploaderHelper;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $brand = $this->brandAction->getAll();
        // return $brand;
        return view('brand::brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('brand::brand.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateBrandRequest $request)
    {

        // $data = $request->validated();
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);
        $brand =  $this->brandAction->store($request->all());
        return redirect()->route('admin.brand.index')->with('success', 'product  Category has been added');
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
