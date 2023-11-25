<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function homeService()
    {
        $services = Service::latest()->paginate(5);
        return view('admin.service.index', compact('services'));
    }
    public function addService()
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
    public function editService($id)
    {
        $services = Service::find($id);
        return view('admin.service.edit', compact('services'));
    }
    public function updateService(Request $request, $id)
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
    public function deleteService($id)
    {
        Service::find($id)->delete();
        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->route('home.service')->with($notification);
    }
}
