<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $messages = Message::all();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = $request->input('message');
        $chat_id = $request->input('chat_id');

        $messageData = [
            'user_id' => Auth::user()->id,
            'chat_id' => $chat_id,
            'content' => $message,
        ];

        Message::create($messageData);

        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->all());

        return redirect()->route('chats.show', $message->chat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index');
    }

    public function indexAjax(Request $request)
    {
        // $messages = Message::all();
        $chat = Chat::find($request->input('chat'));
        $messages = $chat->messages;

        return view('messages.partial.index', compact('messages'));
    }
}
