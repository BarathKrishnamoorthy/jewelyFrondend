<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{

     public function list(){
        $details = Rate::all();
        return response($details);
    }

    public function index()
    {
        $rate = Rate::all();
        $title = 'Rates';
        return view('admin.rate', compact('rate', 'title'));
    }

    public function create()
    {
        $title = 'Create Rate';
        return view('admin.rate_create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        $rate = new Rate();
        $rate->title = $request->title;
        $rate->subtitle = $request->subtitle;
        $rate->rate = $request->rate;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/rate'), $imageName);
            $rate->image = 'images/rate/' . $imageName;
        }

        $rate->save();

        return redirect()->route('admin.rate')->with('success', 'Rate created successfully.');
    }

    public function edit(Request $request, $id )
    {
        $rate = Rate::find($id);
        $title = 'Edit Rate';
        return view('admin.rate_edit', compact('rate','title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $rate = Rate::findOrFail($id);
        $rate->title = $request->title;
        $rate->subtitle = $request->subtitle; 
        $rate->rate = $request->rate;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($rate->image && file_exists(public_path($rate->image))) {
                unlink(public_path($rate->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/rate'), $imageName);
            $rate->image = 'images/rate/' . $imageName;
        }

        $rate->save();

        return redirect()->route('admin.rate')->with('success', 'Rate updated successfully.');
    }

    public function destroy(Request $request , $id)

    {
     
        $rate = Rate::findOrFail($id);

       
        $rate->delete();

        return redirect()->route('admin.rate')->with('success', 'Rate deleted successfully.');
    }
}
