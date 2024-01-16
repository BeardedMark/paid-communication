<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    private $useDatabase = true; // Переключатель для использования базы данных или JSON файла
    private $filePath = 'content/messages.json';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->useDatabase) {
            $messages = Message::all();
        } else {
            $messages = $this->readMessages();
        }

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

        $messageData = [
            'user_id' => Auth::user()->id,
            'chat_id' => '1',
            'content' => $message . ' ' . $request->session()->getId(),
        ];
    
        if ($message !== null) {
            // dd(compact('message'));
            Message::create($messageData);
        }
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if ($this->useDatabase) {
            $message = Message::findOrFail($id);
        } else {
            $messages = $this->readMessages();
            $message = $messages[$id] ?? null;
        }

        return view('messages.show', compact('message', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if ($this->useDatabase) {
            $message = Message::findOrFail($id);
        } else {
            $messages = $this->readMessages();
            $message = $messages[$id] ?? null;
        }

        return view('messages.edit', compact('message', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($this->useDatabase) {
            $message = Message::findOrFail($id);
            $message->update($request->all());
        } else {
            $messages = $this->readMessages();
            $messages[$id] = $request->all();
            $this->writeMessages($messages);
        }

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($this->useDatabase) {
            $message = Message::findOrFail($id);
            $message->delete();
        } else {
            $messages = $this->readMessages();
            unset($messages[$id]);
            $this->writeMessages($messages);
        }

        return redirect()->route('messages.index');
    }

    private function readMessages()
    {
        $path = storage_path($this->filePath);

        if (File::exists($path)) {
            $contents = File::get($path);
            return json_decode($contents, true);
        }

        return [];
    }

    private function writeMessages($messages)
    {
        $path = storage_path($this->filePath);
        $contents = json_encode($messages, JSON_PRETTY_PRINT);
        File::put($path, $contents);
    }

    public function indexAjax()
    {
        if ($this->useDatabase) {
            $messages = Message::all();
        } else {
            $messages = $this->readMessages();
        }

        return view('messages.partial.index', compact('messages'));
    }
}
