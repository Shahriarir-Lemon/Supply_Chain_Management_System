<?php

namespace App\Http\Controllers\Unit;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{

      public $user;

      public function __construct()
      {
          $this->middleware(function($request, $next){
            
              $this->user = Auth()->user();
              return $next($request);

          });
      }


    public function unit_list()
      {
        
        if (is_null($this-> user) || !$this->user->can('supplier.view'))
        {
            abort(403, 'Unauthrorized Access');
        }

        if (is_null($this-> user) || !$this->user->can('manufacturer.view'))
                {
                        abort(403, 'Unauthrorized Access');
    
                }
        if (is_null($this-> user) || !$this->user->can('distributor.view'))
                {
                        abort(403, 'Unauthrorized Access');
        
                }

        $units = Unit::paginate(4);
        return view('Backend.Unit.table', compact('units'));
      }
  public function add_unit()
      {
        if (is_null($this-> user) || !$this->user->can('distributor.view'))
        {
                abort(403, 'Unauthrorized Access');

        }

         

        return view('Backend.Unit.form');
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

      return redirect()->route('unit_list')->with('success1', 'Unit Added Successfully');
    } catch (\Exception $e) {

      include('SweetAlert.flash');

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
        if ($validate->fails())
         {
          include('SweetAlert.flash');
          return redirect()->back()->withErrors($validate)->withInput();
        }

        $unit = Unit::find($id);

        $unit->update([
          'Unit_Name' => $request->unit_name,
        ]);

        return redirect()->route('unit_list')->with("success1","Unit Name Updated Successfully");;
      }

public function delete_unit($id)
      {
          $unit = Unit::find($id);
          $unit->delete(); 

          return redirect()->route('unit_list')->with("success1","Unit Deleted Successfully");;
      }

}
