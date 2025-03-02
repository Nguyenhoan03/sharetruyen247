<?php

namespace App\Http\Controllers;

use App\Models\Story;

class StoryController extends Controller
{
    public function show(Story $slug)
    {
        return view('story.show', compact('slug'));
    }
} 