<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function contact()
    {
        $contacts = Contact::all();
        return view('layouts.pages.contact', compact('contacts'));
    }
    public function adminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function addContact()
    {
        return view('admin.contact.create');
    }
    public function storeContact(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $notification = array(
            'message' => 'Contact Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.contact')->with($notification);
    }
    public function editContact($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }
    public function updateContact(Request $request, $id)
    {
        $update = Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        $notification = array(
            'message' => 'Contact Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.contact')->with($notification);
    }
    public function deleteContact($id)
    {
        $delete = Contact::find($id)->delete();
        $notification = array(
            'message' => 'Contact Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.contact')->with($notification);
    }
    public function contacts()
    {
        $contacts = DB::table('contacts')->first();
        return view('admin.contact.index', compact('contacts'));
    }
    public function contactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        $notification = array(
            'message' => 'Your Message Sent Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('contact')->with($notification);
    }
}
