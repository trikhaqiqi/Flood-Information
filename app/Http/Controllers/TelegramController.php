<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function index()
    {
        return view('forum.telegram');
    }
}
