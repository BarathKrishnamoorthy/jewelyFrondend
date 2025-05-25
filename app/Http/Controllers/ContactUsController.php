<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    public function index()
    {
        $contactUs = ContactUs::all();
        $title = 'Contact Us';
        return view('admin.contact_us' , compact('contactUs', 'title'));
    }

   
    public function store(Request $request)
    {
       $details = new ContactUs();
       $details->name = $request->name;
         $details->email = $request->email;
         $details->phone = $request->phone;
            $details->message = $request->message;
         $details->save();
         return response()->json([
            'status' => 'success',
            'message' => 'Message sent successfully!'
        ]);
    }

    //delete
    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Message deleted successfully!');
    }


}
