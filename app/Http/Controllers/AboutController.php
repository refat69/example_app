<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



class AboutController extends Controller
{
    public function HomeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.about.index', compact('homeabout'));
    }
    public function AddAbout()
    {
        return view('admin.about.create');
    }
    public function StoreAbout(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|unique:home_abouts|max:255',
                'short_dis' => 'required|unique:home_abouts|max:500',
                'long_dis' => 'required|unique:home_abouts|max:1000',
            ],
            [
                'title.required' => 'Masukkan Judul About',
                'short_dis.required' => 'Masukkan Short Description About',
                'long_dis.required' => 'Masukkan Long Description About',
            ]
        );
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('home.about')->with('success', 'add about');
    }
    public function EditAbout($id)
    {
        $homeabout = HomeAbout::find($id);
        return view('admin.about.edit', compact('homeabout'));
    }
    public function UpdateAbout(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|max:255',
                'short_dis' => 'required|max:255',
            ],
            [
                'title.required' => 'Update Judul About',
                'short_dis.required' => 'Update Short Description About',
                'long_dis.required' => 'Update Long Description About',
            ]
        );
        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('home.about')->with('success', 'About Updated');
    }
    public function DeleteAbout($id)
    {
        HomeAbout::find($id)->delete();
        return Redirect()->route('home.about')->with('success', 'About Deleted');
    }
}
