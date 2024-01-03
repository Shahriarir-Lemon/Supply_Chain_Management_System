<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

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
}