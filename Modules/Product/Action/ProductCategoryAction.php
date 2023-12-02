<?php


namespace Modules\Product\Action;

use Modules\Product\Entities\Category;
use Modules\ModuleAdmin\Helpers\UploaderHelper;

class ProductCategoryAction
{
    use UploaderHelper;

    public function getAll()
    {
        return Category::all();
    }
    public function allRelation()
    {
        return Category::with('parent')->get();
    }

    public function parentCategories()
    {
        return Category::whereNull('parent_id')->get();
    }

    public function childCategories()
    {
        return Category::whereNotNull('parent_id')->get();
    }

    public function allWithRelation()
    {
        return Category::whereNull('parent_id')
            ->with('children')
            ->get();
    }

    public function getRowById(int $id)
    {
        return Category::findOrFail($id);
    }
    public function getProductsRowById(int $id)
    {
        return Category::findOrFail($id)->product;
    }

    public function store(array $data)
    {
        // if (!$data['is_active'])
        //     $data['is_active'] = 0;
        // // $request->request->add(['is_active' => 0]);
        // else
        //     $data['is_active'] = 1;
        // // $request->request->add(['is_active' => 1]);
        if (isset($data['photo'])) {
            $data['photo'] = $this->upload($data['photo'], 'product-category');
        }


        return Category::create($data);
    }

    public function updateRow(array $data, $id)
    {
        $category = Category::find($id);
        if (isset($data['photo'])) {
            $imageName = $this->upload($data['photo'], 'product-category');
            $category->photo = $imageName;
            $category->save();
        }
        //   return  Category::whereId($category)->update($data);
        if (isset($data['photo'])) {
            $imageName = $this->upload($data['photo'], 'product-category');
            $data['photo'] = $imageName;
        }

        return  $category->update($data);
        //   Category::whereId($category)->

        return $category;
    }

    public function deleteRow(int $id)
    {
        return Category::findOrFail($id)->delete();
    }
}