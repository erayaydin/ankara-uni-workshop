<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideCreateRequest;
use App\Http\Requests\SlideEditRequest;
use App\Models\Slide;
use Illuminate\Http\Request;

class MySlideController extends Controller
{
    public function index() {
        $slides = auth()->user()->slides()->latest()->paginate(5);

        return view('my-slide.index', [
            'slides' => $slides
        ]);
    }

    public function create() {
        return view('my-slide.create');
    }

    public function store(SlideCreateRequest $request) {
        $slide = new Slide();
        $slide->name = $request->get('name');
        $slide->description = $request->get('description');
        $slide->slug = $request->get('slug');
        $slide->user_id = auth()->user()->id;
        $slide->save();

        return redirect()->route('my-slide.index');
    }

    public function edit($slide) {
        return view('my-slide.edit', [
            'slide' => $slide,
        ]);
    }

    public function update(SlideEditRequest $request, Slide $slide) {

        $slide->name = $request->get('name');
        $slide->description = $request->get('description');
        $slide->slug = $request->get('slug');
        $slide->user_id = auth()->user()->id;
        $slide->save();

        return redirect()->route('my-slide.index');

    }

    public function destroy(Slide $slide) {
        $slide->delete();

        return redirect()->route('my-slide.index');
    }
}
