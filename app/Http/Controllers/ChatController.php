<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::all();

        $title = 'title';
        $description = 'description';

        return view('chats.index', compact('title', 'description', 'chats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('chats.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner_id = $request->input('owner_id');
        $initiator_id = $request->input('initiator_id');

        $chatData = [
            'owner_id' => $owner_id,
            'initiator_id' => $initiator_id,
        ];

        // Chat::create($chatData);

        $chat = Chat::firstOrCreate([
            'owner_id' => $owner_id,
            'initiator_id' => $initiator_id
        ]);

        return redirect()->route('chats.show', $chat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        $caht = Chat::find($chat);
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

    public function ajaxIndex()
    {
        // $chats = Chat::query()
        // ->where('user_id', Auth::user()->id);
        $outgoing = Auth::user()->outgoing;
        $incoming = Auth::user()->incoming;

        return view('chats.ajax.index', compact('outgoing', 'incoming'));
    }
}
