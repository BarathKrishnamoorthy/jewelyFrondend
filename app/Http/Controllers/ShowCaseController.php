<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\ShowCase;
use Illuminate\Http\Request;

class ShowCaseController extends Controller
{

    public function list(){
        $details = ShowCase::all();
        return response($details);
    }
    
    public function index()
    {
        $showCase = ShowCase::all();
        $title = 'Show-Case';
        return view('admin.showCase', compact('showCase', 'title'));
    }

    public function create()
    {
        $title = 'Create ShowCase';
        return view('admin.showCase_create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        $showCase = new ShowCase();
        $showCase->title = $request->title;
        $showCase->subtitle = $request->subtitle;
        $showCase->rate = $request->rate;
        if ($request->hasFile('image')) {
            $imageName =  'jewely.'  . $request->image->extension();
            $request->image->move(public_path('images/showCase'), $imageName);
            $showCase->image = 'images/showCase/' . $imageName;
        }

        $showCase->save();

        return redirect()->route('admin.showCase')->with('success', 'Rate created successfully.');
    }

    public function edit(Request $request, $id )
    {
        $showCase = ShowCase::find($id);
        $title = 'Edit ShowCase';
        return view('admin.showCase_edit', compact('showCase','title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $showCase = ShowCase::findOrFail($id);
        $showCase->title = $request->title;
        $showCase->subtitle = $request->subtitle; 
        $showCase->rate = $request->rate;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($showCase->image && file_exists(public_path($showCase->image))) {
            unlink(public_path($showCase->image));
            }

            $imageName = 'jewely.' . $request->image->extension();
            $request->image->move(public_path('images/showCase'), $imageName);
            $showCase->image = 'images/showCase/' . $imageName;
        }

        $showCase->save();

        return redirect()->route('admin.showCase')->with('success', 'Rate updated successfully.');
    }

    public function destroy(Request $request , $id)

    {
     
        $showCase = ShowCase::findOrFail($id);

       
        $showCase->delete();

        return redirect()->route('admin.showCase')->with('success', 'Rate deleted successfully.');
    }
}
