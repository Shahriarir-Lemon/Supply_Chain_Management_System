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

        
        $formData = new Chat(); 
        $formData->sms = $request->input('sms');
        $formData->user_id = auth()->user()->id;
        $formData->role = auth()->user()->Role;

        $formData->save();

        $messages = Chat::all();
        return view('chat.chat', compact('messages'));

    }

    
    public function getChat()
    {
        $messages = Chat::all();
        return view('partials.messages', compact('messages'));
    }

    public function deleteMessage($id)
    {
        $message = Chat::find($id);

        if (!$message) {
            return response()->json(['success' => false, 'message' => 'Message not found'], 404);
        }

        $message->delete();

        return response()->json(['success' => true]);
    }
}