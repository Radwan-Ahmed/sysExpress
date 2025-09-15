<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Mail\ContactMail;
use App\Mail\ContactReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function showForm()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Contact::create($details);

        // Send email to admin
        Mail::to('radwanahmed1999@gmail.com')->send(new ContactMail($details));

        // Send confirmation email to user
        Mail::to($request->email)->send(new ContactReplyMail($details));

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function list()
{
    $messages = Contact::latest()->paginate(10);
    return view('admin.contacts.index', compact('messages'));
}



}
