<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSentEvent;
use Illuminate\Support\Facades\Broadcast;
class ChatsController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return view('chats');
    }

    public function fetchMessages(){
    	return Message::with('user')->get();
    }

    public function sendMessages(Request $request){
        $message = Auth::user()->messages()->create([
              'message'=>$request->message
         ]);
         broadcast(new MessageSentEvent($message->load('user')))->toOthers();
         return ['status'=>'success'];

    }
}
