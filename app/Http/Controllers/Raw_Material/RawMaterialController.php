<?php

namespace App\Http\Controllers\Raw_Material;

use App\Models\Material;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception as GlobalException;
use Illuminate\Support\Facades\Validator;

class RawMaterialController extends Controller
{
    public function raw_material_list()
    {

        $materials = Material::paginate(3);
        return view('Backend.Raw_Materials.raw_materials_list', compact('materials'));
    }

    public function add_raw_material()
    {
        return view('Backend.Raw_Materials.raw_materials_form');
    }
    public function material_store(Request $request)

    {
      //  dd($request->all());


        $valid = Validator::make($request->all(), [
            'material_image' => 'required|image|max:100000',
            'material_name' => 'required',
            'material_price' => 'required',
            'material_unit' => 'required',
            'material_stock' => 'required',
        ]);

        $image = time() . $request->file('material_image')->getClientOriginalName();
        $path = $request->file('material_image')->storeAs('material_images', $image, 'public');


        $mat = [
            'Material_Image' => '/storage/' . $path,
            'Material_Name' => $request->input('material_name'),
            'Price' => $request->input('material_price'),
            'Unit_Type' => $request->input('material_unit'),
            'Stock' => $request->input('material_stock'),

        ];

        try
        {
            Material::create($mat);
            return redirect()->route('raw_material_list')->with('success', 'Account Created Successfully');
        } 
        catch (Exception $e) 
        {
            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back()->withInput();
        }
    }
}
