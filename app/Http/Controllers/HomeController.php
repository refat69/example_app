<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function HomeSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function AddSlider()
    {
        return view('admin.slider.create');
    }
    public function StoreSlider(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|unique:sliders|min:4',
                'description' => 'required|unique:sliders|min:4',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'title.required' => 'Masukkan Judul Slider',
                'description.required' => 'Masukkan Deskripsi Slider',
                'image.required' => 'Masukkan Gambar Slider',
            ]
        );
        $slider_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location . $img_name;
        $slider_image->move($up_location, $img_name);
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
        ]);
        return Redirect()->route('home.slider')->with('success', 'Slider Berhasil Ditambahkan');
    }
    public function EditSlider($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }
    public function DeleteSlider($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::find($id)->delete();
        return Redirect()->route('home.slider')->with('success', 'Slider Berhasil Dihapus');
    }
}
