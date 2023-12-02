<?php


namespace Modules\Tage\Action;

use Modules\Brand\Entities\Brand;
use Modules\ModuleAdmin\Helpers\UploaderHelper;

class TageAction
{
    use UploaderHelper;

    public function getAll()
    {
        return Brand::all();
    }
    public function allRelation()
    {
        return Brand::with('parent')->get();
    }

    public function parentCategories()
    {
        return Brand::whereNull('parent_id')->get();
    }

    public function childCategories()
    {
        return Brand::whereNotNull('parent_id')->get();
    }

    public function allWithRelation()
    {
        return Brand::whereNull('parent_id')
            ->with('children')
            ->get();
    }

    public function getRowById(int $id)
    {
        return Brand::findOrFail($id);
    }
    public function getBrandsRowById(int $id)
    {
        return Brand::findOrFail($id)->Brand;
    }

    public function store(array $data)
    {
        return Brand::create($data);
    }

    public function updateRow(array $data, $id)
    {
        $Brand = Brand::find($id);
       
        //   return  Brand::whereId($Brand)->update($data);
        if (isset($data['photo'])) {
            $imageName = $this->upload($data['photo'], 'Brand-Brand');
            $data['photo'] = $imageName;
        }

        return  $Brand->update($data);
        //   Brand::whereId($Brand)->

        return $Brand;
    }

    public function deleteRow(int $id)
    {
        return Brand::findOrFail($id)->delete();
    }
}