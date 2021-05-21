<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminModel;
use App\Models\UserContact;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'usertotal' => User::count(),
            'mestotal' => UserContact::count(),
            'userdetail' => User::where('id', session('id'))->first()
        ];
        return view('admin.dashboard', $data);
    }

    public function modcuracc(Request $req)
    {
        $id = session('id');
        $userdetail = User::where('id', $id)->first();
        if ($req->username == $userdetail->username) {
            $req->validate(
                [
                    'name' => 'required|min:3|max:32',
                    'username' => 'required|min:3|max:32',
                    'pro_pic' => 'nullable|max:2048|mimes:jpeg,jpg,png',
                    'work_rank' => 'required|min:3|max:48',
                    'ig_link' => 'nullable|min:3|max:50',
                    'fb_link' => 'nullable|min:3|max:50',
                ]
            );
        } else {
            $req->validate(
                [
                    'name' => 'required|min:3|max:32',
                    'username' => 'unique:users|required|min:3|max:32',
                    'pro_pic' => 'nullable|max:2048|mimes:jpeg,jpg,png',
                    'work_rank' => 'required|min:3|max:48',
                    'ig_link' => 'nullable|min:3|max:50',
                    'fb_link' => 'nullable|min:3|max:50',
                ]
            );
        }
        if (empty($req->pro_pic)) {
            $data = [
                'name' => $req->name,
                'username' => $req->username,
                'work_rank' => $req->work_rank,
                'ig_link' => $req->ig_link,
                'fb_link' => $req->fb_link
            ];
        } else {
            $call_model = User::where('id', $id)->first();
            $photo_path = public_path('user/usr_propic/' . $call_model->pro_pic);
            if (!empty($call_model->pro_pic)) {
                unlink($photo_path);
            }
            $img = $req->pro_pic;
            $imgName = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/usr_propic'), $imgName);
            $data = [
                'name' => $req->name,
                'username' => $req->username,
                'work_rank' => $req->work_rank,
                'ig_link' => $req->ig_link,
                'fb_link' => $req->fb_link,
                'pro_pic' => $imgName
            ];
        }
        User::where('id', $id)->update($data);
        $notif = [
            'alert' => 'success',
            'pesan' => 'Akun berhasil diperbarui!'
        ];
        return redirect()->back()->with($notif);
    }

    public function modcurpass()
    {
        $id = session('id');
        Request()->validate(
            [
                'curpass' => 'required',
                'newpass' => 'required_with:valpass|same:valpass|min:8|max:32',
                'valpass' => 'min:8|max:32'
            ]
        );
        $userdetail = User::where('id', $id)->first();
        if (Hash::check(request()->curpass, $userdetail->password)) {
            $data = [
                'password' => bcrypt(Request()->newpass),
            ];
            User::where('id', $id)->update($data);
            $notif = [
                'pesan' => 'Password berhasil diganti!',
                'alert' => 'success'
            ];
            return redirect()->route('admdashboard')->with($notif);
        } else {
            $notif = [
                'pesan' => 'Kolom current password salah!',
                'alert' => 'error'
            ];
            return redirect()->route('admdashboard')->with($notif);
        }
    }

    public function modcurmail()
    {
        $id = session('id');
        Request()->validate(
            [
                'email' => 'required|email|unique:users|max:48'
            ],
            [
                'email.required' => 'Email dibutuhkan!',
                'email.email' => 'Format Email kamu salah!',
                'email.unique' => 'Maaf, email sudah diambil!',
                'email.max' => 'Batas karakter dari email hanya 48 Huruf!'
            ]
        );
        $data = [
            'email' => request()->email
        ];
        User::where('id', $id)->update($data);
        $notif = array(
            'pesan' => 'Email berhasil di ganti',
            'alert' => 'success'
        );
        return redirect()->route('admdashboard')->with($notif);
    }

    public function useracc()
    {
        $data = [
            'userlist' => User::get()
        ];
        return view('admin.user.user', $data);
    }

    public function adduser(Request $req)
    {
        $req->validate(
            [
                'name' => 'required|min:3|max:32',
                'username' => 'unique:users|required|min:3|max:32',
                'pro_pic' => 'nullable|max:2048|mimes:jpeg,jpg,png',
                'work_rank' => 'required|min:3|max:48',
                'ig_link' => 'nullable|min:3|max:50',
                'fb_link' => 'nullable|min:3|max:50',
                'email' => 'unique:users|email|max:48|required',
                'level' => 'required|in:admin,staff',
                'password' => 'required|min:8|max:64'
            ]
        );
        if (empty($req->pro_pic)) {
            $data = [
                'name' => $req->name,
                'username' => $req->username,
                'work_rank' => $req->work_rank,
                'ig_link' => $req->ig_link,
                'fb_link' => $req->fb_link,
                'email' => $req->email,
                'level' => $req->level,
                'password' => Hash::make($req->password)
            ];
        } else {
            $img = $req->pro_pic;
            $imgName = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/usr_propic'), $imgName);
            $data = [
                'name' => $req->name,
                'username' => $req->username,
                'work_rank' => $req->work_rank,
                'pro_pic' => $imgName,
                'ig_link' => $req->ig_link,
                'fb_link' => $req->fb_link,
                'email' => $req->email,
                'level' => $req->level,
                'password' => Hash::make($req->password)
            ];
        }
        $notif = [
            'pesan' => 'Akun berhasil dibuat!',
            'alert' => 'success'
        ];
        User::create($data);
        return redirect()->route('useracc')->with($notif);
    }

    public function detuser($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }
        $data = [
            'userdetail' => $user
        ];
        return view('admin.user.userdetail', $data);
    }

    public function moduser($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }
        $data = [
            'userdetail' => $user
        ];
        return view('admin.user.useredit', $data);
    }

    public function actmoduser(Request $req, $id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }
        if ($req->email == $user->email && $req->username == $user->username) {
            $req->validate(
                [
                    'name' => 'required|min:3|max:32',
                    'username' => 'required|min:3|max:32',
                    'pro_pic' => 'nullable|max:2048|mimes:jpeg,jpg,png',
                    'work_rank' => 'required|min:3|max:48',
                    'ig_link' => 'nullable|min:3|max:50',
                    'fb_link' => 'nullable|min:3|max:50',
                    'email' => 'email|max:48|required',
                    'level' => 'required|in:admin,staff'
                ]
            );
        } else if ($req->email == $user->email) {
            $req->validate(
                [
                    'name' => 'required|min:3|max:32',
                    'username' => 'unique:users|required|min:3|max:32',
                    'pro_pic' => 'nullable|max:2048|mimes:jpeg,jpg,png',
                    'work_rank' => 'required|min:3|max:48',
                    'ig_link' => 'nullable|min:3|max:50',
                    'fb_link' => 'nullable|min:3|max:50',
                    'email' => 'email|max:48|required',
                    'level' => 'required|in:admin,staff'
                ]
            );
        } else if ($req->username == $user->username) {
            $req->validate(
                [
                    'name' => 'required|min:3|max:32',
                    'username' => 'required|min:3|max:32',
                    'pro_pic' => 'nullable|max:2048|mimes:jpeg,jpg,png',
                    'work_rank' => 'required|min:3|max:48',
                    'ig_link' => 'nullable|min:3|max:50',
                    'fb_link' => 'nullable|min:3|max:50',
                    'email' => 'unique:users|email|max:48|required',
                    'level' => 'required|in:admin,staff'
                ]
            );
        } else if ($req->username != $user->username && $req->email != $user->email) {
            $req->validate(
                [
                    'name' => 'required|min:3|max:32',
                    'username' => 'unique:users|required|min:3|max:32',
                    'pro_pic' => 'nullable|max:2048|mimes:jpeg,jpg,png',
                    'work_rank' => 'required|min:3|max:48',
                    'ig_link' => 'nullable|min:3|max:50',
                    'fb_link' => 'nullable|min:3|max:50',
                    'email' => 'unique:users|email|max:48|required',
                    'level' => 'required|in:admin,staff'
                ]
            );
        }
        if (empty($req->pro_pic)) {
            $data = [
                'name' => $req->name,
                'username' => $req->username,
                'work_rank' => $req->work_rank,
                'ig_link' => $req->ig_link,
                'fb_link' => $req->fb_link,
                'email' => $req->email,
                'level' => $req->level
            ];
        } else {
            $photo_path = public_path('user/usr_propic/' . $user->pro_pic);
            if (!empty($user->pro_pic)) {
                unlink($photo_path);
            }
            $img = $req->pro_pic;
            $imgName = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/usr_propic'), $imgName);
            $data = [
                'name' => $req->name,
                'username' => $req->username,
                'work_rank' => $req->work_rank,
                'pro_pic' => $imgName,
                'ig_link' => $req->ig_link,
                'fb_link' => $req->fb_link,
                'email' => $req->email,
                'level' => $req->level
            ];
        }
        User::where('id', $id)->update($data);
        $notif = [
            'pesan' => 'Akun berhasil diperbarui!',
            'alert' => 'success'
        ];
        return redirect()->route('useracc')->with($notif);
    }

    public function modpass($id)
    {
        if (!User::where('id', $id)->first()) {
            abort(404);
        }
        Request()->validate(
            [
                'newpass' => 'required_with:valpass|same:valpass|min:8|max:32',
                'valpass' => 'min:8|max:32'
            ]
        );
        $data = [
            'password' => Hash::make(Request()->newpass),
        ];
        User::where('id', $id)->update($data);
        $notif = [
            'pesan' => 'Password berhasil diganti!',
            'alert' => 'success'
        ];
        return redirect()->back()->with($notif);
    }

    public function deluser($id)
    {
        $call_model = User::where('id', $id)->first();
        if (!$call_model) {
            abort(404);
        }
        $photo_path = public_path('user/usr_propic/' . $call_model->pro_pic);
        if (!empty($call_model->pro_pic)) {
            unlink($photo_path);
        }
        User::where('id', $id)->delete();
        $notif = [
            'alert' => 'success',
            'pesan' => 'Akun berhasil dihapus!'
        ];
        return redirect()->back()->with($notif);
    }

    public function getcontact()
    {
        $data = [
            'getcontact' => UserContact::get()
        ];
        return view('admin.user.contact', $data);
    }

    public function detcontact($id)
    {
        $user = UserContact::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }
        $data = [
            'detcontact' => $user
        ];
        return view('admin.user.detcontact', $data);
    }

    public function delcontact($id)
    {
        if (!UserContact::where('id', $id)->first()) {
            abort(404);
        }
        UserContact::where('id', $id)->delete();
        $notif = [
            'pesan' => 'Visitor Contact Deleted',
            'alert' => 'success'
        ];
        return redirect()->back()->with($notif);
    }
}
