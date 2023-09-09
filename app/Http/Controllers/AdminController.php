<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.add_admin');
    }
    public function store(Request $r)
    {

        if ($r->hasFile('photo')) {
            $img = $r->file('photo')->getClientOriginalName();
            $r->file('photo')->storeAs('profile_img', $img, 'admin');
        } else {
            $img = 'profile.jpg';
        }
        $r->validate([
            'name' => ['required', 'unique:admins,name'],
            'password' => 'required',
            'email' => ['required', 'unique:admins,email'],
        ]);
        Admin::create([
            'name' => $r->name,
            'password' => Hash::make($r->password),
            'email' => $r->email,
            'status' => $r->status,
            'photo' => $img,
        ]);

        return  redirect()->back()->with('success-add-admin', 'successfully Added Admin');
    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.update_admin', compact('admin'));
    }
    public function updateAdmin($id, Request $r)
    {

        $oldImg = Admin::findOrFail($id)->photo;
        if ($r->hasFile('photo')) {
            $img = $r->file('photo')->getClientOriginalName();
            $r->file('photo')->storeAs('profile_img/', $img, 'admin');
            if ($oldImg !== 'profile.jpg') {
                Storage::disk('admin')->delete('profile_img/' . $oldImg);
            }
        } else {

            $img = $oldImg;
        }
        $r->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Admin::where('id', $id)->update([
            'name' => $r->name,
            'email' => $r->email,
            'password' => $r->password,
            'photo' => $img,
        ]);

        return redirect()->route('admin.showAdmins')->with('success-update-admin', 'successfully Updated Admin');
    }
    public function deleteAdmin($id)
    {
        if (Auth::guard('admins')->user()->id == $id) {
            return  redirect()->route('admin.notAllowed');
        } else {
            Admin::find($id)->delete();
            return redirect()->back()->with('success-delete-admin', 'successfully Deleted Admin');
        }
    }
}
