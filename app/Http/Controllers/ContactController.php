<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function Contact()
    {
        $contacts = Contact::all();
        return view('layouts.pages.contact', compact('contacts'));
    }
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AddContact()
    {
        return view('admin.contact.create');
    }
    public function StoreContact(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully');
    }
    public function EditContact($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }
    public function UpdateContact(Request $request, $id)
    {
        $update = Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact Updated Successfully');
    }
    public function DeleteContact($id)
    {
        $delete = Contact::find($id)->delete();
        return Redirect()->route('admin.contact')->with('success', 'Contact Deleted Successfully');
    }
    public function Contacts()
    {
        $contacts = DB::table('contacts')->first();
        return view('admin.contact.index', compact('contacts'));
    }
    public function ContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return Redirect()->route('contact')->with('success', 'Your Message Sent Successfully');
    }
}
