<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    private $jsonPath = 'content/pages.json';

    public function welcome()
    {
        $content = $this->readJsonContent('welcome');

        $title = $content['title'];
        $description = $content['description'];
        
        return view('pages.welcome', compact('title', 'description'));
    }
    
    public function about()
    {
        $content = $this->readJsonContent('about');

        $title = $content['title'];
        $description = $content['description'];
        
        return view('pages.about', compact('title', 'description'));
    }

    
    public function messanger()
    {        
        return view('pages.messanger');
    }

    private function readJsonContent($page)
    {
        $jsonData = json_decode(file_get_contents(storage_path($this->jsonPath)), true);
        return $jsonData[$page];
    }
}
