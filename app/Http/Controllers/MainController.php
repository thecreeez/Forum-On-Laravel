<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $threads = Thread::get();

        return view('index', [
            'threads' => $threads
        ]);
    }

    public function thread($threadId) {
        //if (!isset($_ENV["AUTH_SERVICE_TOKEN"])) {
        //    dump('AUTH_SERVICE_TOKEN in .env isn\'t exist. AuthService ignored.');    
        //} else {
        //    dump('AUTH_SERVICE_TOKEN in .env exist');
        //}

        $thread = Thread::where('id', $threadId)->first();

        if (is_null($thread)) {
            return 'Error';
        }

        return view('thread', [
            'thread' => $thread
        ]);
    }
}
