<?php

namespace App\Http\Controllers\Raw_Material;

use App\Models\Material;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Unit;
use Illuminate\Http\Request;
use Exception as GlobalException;
use Illuminate\Support\Facades\Validator;

class RawMaterialController extends Controller
{

            public $user;

            public function __construct()
            {
                $this->middleware(function($request, $next){
                
                    $this->user = Auth()->user();
                    return $next($request);

                });
            }




    public function raw_material_list()
    {
        if (is_null($this-> user) || !$this->user->can('distributor.view'))
        {
          abort(403, 'Unauthrorized Access');
    
         }
         if (is_null($this-> user) || !$this->user->can('retailer.view'))
         {
                 abort(403, 'Unauthrorized Access');
 
         }


        $materials = Material::all();
        $units = Unit::get();
        return view('Backend.Raw_Materials.table', compact('materials','units'));
    }

    public function add_raw_material()
    {

        if (is_null($this-> user) || !$this->user->can('manufacturer.view'))
        {
                abort(403, 'Unauthrorized Access');

        }
        if (is_null($this-> user) || !$this->user->can('distributor.view'))
        {
                abort(403, 'Unauthrorized Access');

        }
        if (is_null($this-> user) || !$this->user->can('retailer.view'))
        {
                abort(403, 'Unauthrorized Access');

        }


        return view('Backend.Raw_Materials.form');
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
            'material_description'=>'nullable',
        ]);

        $image = time() . $request->file('material_image')->getClientOriginalName();
        $path = $request->file('material_image')->storeAs('material_images', $image, 'public');


        $mat = [
            'Material_Image' => '/storage/' . $path,
            'Material_Name' => $request->input('material_name'),
            'Price' => $request->input('material_price'),
            'Unit_Type' => $request->input('material_unit'),
            'Stock' => $request->input('material_stock'),
            'Description' => $request->input('material_description'),


        ];

        try
        {
            Material::create($mat);
            notify()->success('Laravel Notify is awesome!');
            return redirect()->route('raw_material_list')->with("success", "Material Added successfully");
        } 
        catch (\Exception $e) 
        {
            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->withErrors($mat)->withInput();
        }
    }

    public function edit_material($id, Request $request)  
            {
                $material = Material::find($id);

                $valid = Validator::make($request->all(), [
                    'material_image' => '|image|max:100000',
                    'material_name' => 'required|string|unique:materials,Material_Name,' . $id,
                    'material_price' => 'required',
                    'material_unit' => 'required',
                    'material_stock' => 'required',
                    'material_description' => 'nullable',
                ]);
                
                if ($valid->fails()) {
                    return redirect()->back()->withErrors($valid)->withInput();
                }
                
                

                $data = [];

                if($request->has('material_image'))
                {
                    $image = time() . $request->file('material_image')->getClientOriginalName();
                    $path = $request->file('material_image')->storeAs('material_images', $image, 'public');

                    $data['Material_Image'] = '/storage/' . $path;
                }




                $data['Material_Name'] = $request->input('material_name');
                $data['Price'] = $request->input('material_price');
                $data['Unit_Type'] = $request->input('material_unit');
                
                $data['Stock'] = $request->input('material_stock');
                $data['Description'] = $request->input('material_description');
        
                $material->update($data);
        
                return redirect()->back()->with('success', 'Material Updated successfully');

            }

            public function delete_material($id)
            {
                $material = Material::find($id);
                $material->delete();

                $cart = Cart::find($id);
                $cart->delete();

                return redirect()->back()->with('success', 'Material deleted successfully');

            }
}
