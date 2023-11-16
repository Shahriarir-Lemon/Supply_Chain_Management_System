<?php

namespace App\Http\Controllers\Unit;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function unit_list()
  {
    $units = Unit::paginate(4);
    return view('Backend.Unit.unit_list', compact('units'));
  }
  public function add_unit()
  {
    return view('Backend.Unit.unit_form');
  }

  public function store_unit(Request $request)

  {
    // dd($request->all());

    $validate = Validator::make($request->all(), [

      'unit_name' => 'required|string',
    ]);

    try {

      Unit::create([
        'Unit_Name' => $request->unit_name,

      ]);

      return redirect()->route('unit_list')->with('success', 'Unit Added Successfully');
    } catch (GlobalException $e) {

      session()->flash('message', $e->getMessage());
      session()->flash('type', 'danger');

      return redirect()->back()->withInput();
    }
  }



  public function edit_unit($id, Request $request)
      {
        //dd($request->all());



        $validate = Validator::make($request->all(), [

          'unit_name' => 'required|string|unique:units,Unit_Name,' . $id,
        ]);

        // $validator = Validator::make($request->all(),$validate);
        if ($validate->fails()) {
          return redirect()->back()->withErrors($validate)->withInput();
        }

        $unit = Unit::find($id);

        $unit->update([
          'Unit_Name' => $request->unit_name,
        ]);

        return redirect()->route('unit_list');
      }

public function delete_unit($id)
      {
          $unit = Unit::find($id);
          $unit->delete(); 

          return redirect()->route('unit_list');
      }

}
