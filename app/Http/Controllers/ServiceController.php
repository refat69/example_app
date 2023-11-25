<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function HomeService()
    {
        $services = Service::latest()->paginate(5);
        return view('admin.service.index', compact('services'));
    }
    public function AddService()
    {
        return view('admin.service.create');
    }
    public function StoreService(Request $request)
    {

        Service::insert([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Service Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('home.service')->with($notification);
    }
    public function EditService($id)
    {
        $services = Service::find($id);
        return view('admin.service.edit', compact('services'));
    }
    public function UpdateService(Request $request, $id)
    {
        Service::find($id)->update([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('home.service')->with($notification);
    }
    public function DeleteService($id)
    {
        Service::find($id)->delete();
        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('home.service')->with($notification);
    }
}
