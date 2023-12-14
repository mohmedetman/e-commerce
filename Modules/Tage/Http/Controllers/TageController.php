<?php

namespace Modules\Tage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tage\Action\TageAction;
use Illuminate\Contracts\Support\Renderable;

class TageController extends Controller
{
    // use UploaderHelper;
    public function __construct(protected TageAction $tageAction)
    {
    }

    // use UploaderHelper;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tage = $this->tageAction->getAll();
        // return $tage;
        return view('tage::tage.index', compact('tage'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tage::tage.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateTageRequest $request)
    {

       
        $tage =  $this->tageAction->store($request->all());
        return redirect()->route('admin.tage.index')->with('success', 'product  Category has been added');
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