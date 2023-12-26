<?php

namespace App\Http\Controllers\Controller;

namespace App\Http\Controllers\Category;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\delete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Cpref;

class CategoryController extends Controller
{

        public $user;

        public function __construct()
        {
            $this->middleware(function($request, $next){
              
                $this->user = Auth()->user();
                return $next($request);

            });
        }




  public function category_list()
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

    $categories = Category::paginate(4);
    return view('Backend.Category.table', compact('categories'));
  }

  public function add_category()
  {
    if (is_null($this-> user) || !$this->user->can('distributor.view'))
    {
            abort(403, 'Unauthrorized Access');

    }

    return view('Backend.Category.form');
  }

  
  public function store_category(Request $request)

  {
    // dd($request->all());

    $validate = Validator::make($request->all(), [

      'category_name' => 'required|string',
    ]);

    try {

      Category::create([
        'Category_Name' => $request->category_name,

      ]);

      return redirect()->route('category_list')->with('success1', 'Category Added Successfully');
    } 
    catch (\Exception $e) 
    {

      include('SweetAlert.flash');

      return redirect()->back()->withInput();
    }
  }



  public function edit_category($id, Request $request)
  {
    //dd($request->all());
          $validate = Validator::make($request->all(), [

            'category_name' => 'required|string|unique:categories,Category_Name,' . $id,
          ]);

          // $validator = Validator::make($request->all(),$validate);
          if ($validate->fails())
              {
                include('SweetAlert.flash');
                return redirect()->back()->withInput();
              }

          $category = Category::find($id);

            $category->update([
              'Category_Name' => $request->category_name,
              ]);

          return redirect()->route('category_list')->with("success1", "Category Added Successfully");
        }

  public function delete_category($id)
  {
      $category = Category::find($id);
      $category->delete();

      return redirect()->route('category_list')->with("success1", "Category Added Successfully");
  }
}
