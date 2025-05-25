<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
     public function list(){
        $details = Slider::all();
        return response($details);
    }

    public function index()
    {
        $sliders = Slider::all();
        $title = 'Sliders';
        return view('admin.slider', compact('sliders', 'title'));
    }

    public function create()
    {
        $title = 'Create Slider';
        return view('admin.slider_create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/sliders'), $imageName);
            $slider->image = 'images/sliders/' . $imageName;
        }

        $slider->save();

        return redirect()->route('admin.slider')->with('success', 'Slider created successfully.');
    }

    public function edit(Request $request, $id )
    {
        $slider = Slider::find($id);
        $title = 'Edit Slider';
        return view('admin.slider_edit', compact('slider','title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/sliders'), $imageName);
            $slider->image = 'images/sliders/' . $imageName;
        }

        $slider->save();

        return redirect()->route('admin.slider')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Request $request , $id)

    {
     
        $slider = Slider::findOrFail($id);

       
        $slider->delete();

        return redirect()->route('admin.slider')->with('success', 'Slider deleted successfully.');
    }
}
