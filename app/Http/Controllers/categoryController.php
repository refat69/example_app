<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function allCat()
    {
        // $categories = DB :: table('categories')
        //             ->join('users','categories.user_id','users.id')
        //             ->select('categories.*','users.name')
        //             ->latest()->paginate(5);
        $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);

        return view('admin.category.index', compact('categories'));
    }
    public function addCat(Request $request)
    {
        $validatedData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],
            [
                'category_name.required' => 'Please Input Category Name',
                'category_name.max' => 'Category Less Than 255Chars',
            ]
        );
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth()->user()->id,
            'created_at' => Carbon::now()
        ]);
        // $category = new category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth()->user()->id;
        // $category->save();
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth()->user()->id;
        // DB::table('categories')->insert($data);
        return Redirect()->back()->with('success', 'Category Inserted Successfully');
    }
    public function edit($id)
    {
        $categories = DB::table('categories')->where('id', $id)->first();
        // $categories = category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $update = DB::table('categories')->where('id', $id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth()->user()->id
        ]);
        // $update = category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);
        return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }
    public function softDelete($id)
    {
        $delete = DB::table('categories')->where('id', $id)->delete();
        // $delete = category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Soft Deleted Successfully');
    }
}
