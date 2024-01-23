<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Chat $chat)
    {
        $messages = Message::where('chat_id', $chat->id)->get();

        return view('messages.index', compact('messages', 'chat'));
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
    public function store(Chat $chat, Request $request)
    {
        $message = $request->input('message');
        // $chat_id = $request->input('chat_id');

        $messageData = [
            'user_id' => Auth::user()->id,
            'chat_id' => $chat->id,
            'content' => $message,
        ];

        Message::create($messageData);

        return redirect()->route('chats.messages.index', $chat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat, Message $message)
    {
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat, Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Chat $chat, Message $message, Request $request)
    {
        $message = Message::findOrFail($message);
        $message->update($request->all());

        return redirect()->route('chats.messages.index', $chat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message = Message::findOrFail($message);
        $message->delete();

        return redirect()
            ->route('messages.index');
    }

    public function getMessages(Chat $chat, Request $request)
    {
        // $messages = Message::where('chat_id', $chat->id)->get();
        $date = Message::where('chat_id', $chat->id)
            ->latest('created_at')
            ->value('created_at');

        $day = $date ? Carbon::parse($date)->toDateString() : "Нет сообщений";

        $messages = Message::where('chat_id', $chat->id)
            ->whereDate('created_at', $day)
            ->get();

        return response()->json([
            'messagesHtml' => view('messages.components.list', compact('messages', 'day'))->render(),
        ]);
    }
}
