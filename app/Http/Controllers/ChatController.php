<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outgoing = Auth::user()->outgoing;
        $incoming = Auth::user()->incoming;

        return view('chats.index', compact('outgoing', 'incoming'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner_id = $request->input('owner_id');
        $initiator_id = $request->input('initiator_id');

        $chat = Chat::firstOrCreate([
            'owner_id' => $owner_id,
            'initiator_id' => $initiator_id
        ]);

        return redirect()->route('chats.index', $chat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return view('chats.show', compact('chat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
    public function getChatsAjax()
    {
        $outgoing = Auth::user()->outgoing;
        $incoming = Auth::user()->incoming;
    
        return response()->json([
            'incomingChatsHtml' => view('chats.components.incoming', compact('incoming'))->render(),
            'outgoingChatsHtml' => view('chats.components.outgoing', compact('outgoing'))->render(),
        ]);
    }
}
