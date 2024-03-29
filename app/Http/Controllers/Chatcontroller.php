<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Vite;
use Illuminate\Http\Request;
use App\Events\Chatevent;
class Chatcontroller extends Controller
{
    function chatView(Request $request){
        return view('chat');
    }
    function testingEvents(Request $request)
    {
     event(new Chatevent($request->name, $request->messages));
    }
}
