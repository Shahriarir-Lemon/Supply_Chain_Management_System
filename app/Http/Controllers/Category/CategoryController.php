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
  public function category_list()
  {
    $categories = Category::paginate(4);
    return view('Backend.Category.category_list', compact('categories'));
  }

  public function add_category()
  {
    return view('Backend.Category.category_form');
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

      return redirect()->route('category_list')->with('success', 'Category Added Successfully');
    } catch (\Exception $e) {

      session()->flash('message', $e->getMessage());
      session()->flash('type', 'danger');

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
                return redirect()->back()->withErrors($validate)->withInput();
              }

          $category = Category::find($id);

            $category->update([
              'Category_Name' => $request->category_name,
              ]);

          return redirect()->route('category_list');
        }

  public function delete_category($id)
  {
      $category = Category::find($id);
      $category->delete();

      return redirect()->route('category_list');
  }
}
