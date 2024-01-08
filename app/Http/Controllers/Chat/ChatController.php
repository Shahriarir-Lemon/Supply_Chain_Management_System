<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;

use App\Models\Chat;
use App\Models\Customer as ModelsCustomer;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Manual;
use Darryldecode\Cart\Validators\Validator;

class ChatController extends Controller
{
    public function submit_chat(Request $request)
    {
       
      // dd($request);
        $request->validate([
            'sms' => 'required',
            
        ]);

        
        $data = new Chat(); 
        $data->sms = $request->input('sms');
        $data->user_id = auth()->user()->id;
        $data->role = auth()->user()->Role;

        $data->save();

        $messages = Chat::all();
        return view('chat.chat', compact('messages'));

    }

    
    public function getChat()
    {


        $messages = Chat::all();
        return view('partials.messages', compact('messages'));
    }




  public function delete_sms($id)
    {
      $sms = Chat::find($id);

      $sms->delete();

      return response()->json(['success'=>true, 'tr'=>'tr_'.$id]);

        
    }

    public function customer_list()
    {
      

      $customers = Customer::all();

      return view('User_List.customer_list',compact('customers'));

        
    }

    public function customer_delete($id)
    {
      $sms = Customer::find($id);

      $sms->delete();

      return redirect()->back()->with('success1', 'Deleted Successfully.');

        
    }

    public function manual_request(Request $request)
    {
      
      $validate = Validator::Make($request->all(),[

        
      ]);

      $manual = new Manual();
      $manual->name = auth()->user()->user_name;
      $manual->products1 = $request->product1;
      $manual->quantity1 = $request->quantity1;
      $manual->products2 = $request->product2;
      $manual->quantity2 = $request->quantity2;
      $manual->product3 = $request->product3;
      $manual->quantity3 = $request->quantity3;
      $manual->save();


      return redirect()->back()->with('success1', 'Request Sent Successfully.');

        
    }

    public function manual_request1()
    {
      

      $customers = Manual::all();

      return view('User_List.manual_request',compact('customers'));

        
    }


}