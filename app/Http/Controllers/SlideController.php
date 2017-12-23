<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index() {
        $slides = Slide::latest()->paginate(5);

        return view('slide.index', [
            'slides' => $slides
        ]);
    }
}
