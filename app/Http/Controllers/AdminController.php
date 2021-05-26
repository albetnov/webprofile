<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminModel;
use App\Models\UserContact;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;
use App\Models\HomePage;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->UserModel = new UserModel();
    }
    //Start of Dashboard
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
    //End of Dashboard
    //Start of Manage User
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
    //End of Manage User
    //Start of Manage Page
    public function getbase()
    {
        $data = [
            'bscms' => $this->UserModel->basecms()
        ];
        return view('admin.pageadj.changebase', $data);
    }

    public function base_edit(Request $req)
    {
        $bscms = $this->UserModel->basecms();
        $req->validate(
            [
                'favicon' => 'nullable|max:2048|mimes:ico',
                'app_name' => 'min:3|max:32|required',
                'call_us' => 'required|digits:12',
                'email' => 'required|email|max:48',
                'location' => 'required|max:64',
                'fb_link' => 'required|max:48',
                'ig_link' => 'required|max:48',
                'quote' => 'required|max:64',
                'quote_author' => 'required|max:32'
            ]
        );
        if (empty($req->favicon)) {
            $data = [
                'app_name' => $req->app_name,
                'call_us' => $req->call_us,
                'email' => $req->email,
                'location' => $req->location,
                'fb_link' => $req->fb_link,
                'ig_link' => $req->ig_link,
                'quote' => $req->quote,
                'quote_author' => $req->quote_author
            ];
        } else {
            $photo_path = public_path('user/img/' . $bscms->favicon);
            if (!empty($bscms->favicon)) {
                unlink($photo_path);
            }
            $img = $req->favicon;
            $imgName = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/img'), $imgName);
            $data = [
                'favicon' => $imgName,
                'app_name' => $req->app_name,
                'call_us' => $req->call_us,
                'email' => $req->email,
                'location' => $req->location,
                'fb_link' => $req->fb_link,
                'ig_link' => $req->ig_link,
                'quote' => $req->quote,
                'quote_author' => $req->quote_author
            ];
        }
        $this->AdminModel->updBaseCMS($data);
        $notif = [
            'pesan' => 'Base Config updated!',
            'alert' => 'success'
        ];
        return redirect()->back()->with($notif);
    }

    public function gethome()
    {
        $data = [
            'ipage' => HomePage::first()
        ];
        return view('admin.pageadj.changehome', $data);
    }

    public function act_home(Request $req)
    {
        $req->validate(
            [
                'title' => 'required|min:3|max:20',
                'title_c1' => 'required|min:3|max:32',
                'title_c2' => 'required|min:3|max:32',
                'title_c3' => 'required|min:3|max:32',
                'desc_c1' => 'required|min:3|max:24',
                'desc_c2' => 'required|min:3|max:24',
                'desc_c3' => 'required|min:3|max:24',
                'img_welcome' => 'nullable|mimes:jpeg,jpg,png|max:4096',
                'title_welcome' => 'required|min:3|max:32',
                'desc_welcome' => 'required|min:3|max:512',
                'yt_id' => 'required|min:3|max:15',
                'yt_bg' => 'nullable|mimes:jpg|max:4096'
            ]
        );
        $ipage = HomePage::first();
        if ($req->img_welcome) {
            $photo_path = public_path('user/img/' . $ipage->img_welcome);
            if (!empty($ipage->img_welcome)) {
                unlink($photo_path);
            }
            $img = $req->img_welcome;
            $img_welcome = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/img'), $img_welcome);
            $data = [
                'title' => $req->title,
                'title_c1' => $req->title_c1,
                'title_c2' => $req->title_c2,
                'title_c3' => $req->title_c3,
                'desc_c1' => $req->desc_c1,
                'desc_c2' => $req->desc_c2,
                'desc_c3' => $req->desc_c3,
                'img_welcome' => $img_welcome,
                'title_welcome' => $req->title_welcome,
                'desc_welcome' => $req->desc_welcome,
                'yt_id' => $req->yt_id
            ];
        }
        if ($req->yt_bg) {
            $img = $req->yt_bg;
            $img_ytbg = 'vid_bg.jpg';
            $img->move(public_path('user/img'), $img_ytbg);
        }
        if (!$req->img_welcome) {
            $data = array_filter($req->except('_token', 'yt_bg'));
        }
        HomePage::where('id', '1')->update($data);
        $notif = [
            'pesan' => 'Index page updated!',
            'alert' => 'success'
        ];
        return redirect()->back()->with($notif);
    }

    public function chbg_home(Request $req)
    {
        $req->validate(
            [
                'img_c1' => 'nullable|mimes:jpeg,jpg,png|max:4096',
                'img_c2' => 'nullable|mimes:jpeg,jpg,png|max:4096',
                'img_c3' => 'nullable|mimes:jpeg,jpg,png|max:4096'
            ]
        );
        $ipage = HomePage::first();
        if ($req->img_c1) {
            $photo_path = public_path('user/img/' . $ipage->img_c1);
            if (!empty($ipage->img_c1)) {
                unlink($photo_path);
            }
            $img = $req->img_c1;
            $img_c1 = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/img'), $img_c1);
            $data = [
                'img_c1' => $img_c1
            ];
            HomePage::where('id', '1')->update($data);
        }
        if ($req->img_c2) {
            $photo_path = public_path('user/img/' . $ipage->img_c2);
            if (!empty($ipage->img_c2)) {
                unlink($photo_path);
            }
            $img = $req->img_c2;
            $img_c2 = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/img'), $img_c2);
            $data = [
                'img_c2' => $img_c2
            ];
            HomePage::where('id', '1')->update($data);
        }
        if ($req->img_c3) {
            $photo_path = public_path('user/img/' . $ipage->img_c3);
            if (!empty($ipage->img_c3)) {
                unlink($photo_path);
            }
            $img = $req->img_c3;
            $img_c3 = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/img'), $img_c3);
            $data = [
                'img_c3' => $img_c3
            ];
            HomePage::where('id', '1')->update($data);
        }
        $notif = [
            'pesan' => 'Pergantian Corousel berhasil.',
            'alert' => 'success'
        ];
        return redirect()->back()->with($notif);
    }

    public function getabout()
    {
        $data = [
            'gab' => $this->UserModel->about()
        ];
        return view('admin.pageadj.changeabout', $data);
    }

    public function about_edit(Request $req)
    {
        $req->validate(
            [
                'about_img' => 'nullable|max:4096|mimes:jpg,jpeg,png',
                'work_exp' => 'required|numeric|max:500',
                'about_title' => 'required|min:3|max:20',
                'about_p1' => 'required|min:3|max:768',
                'about_p2' => 'required|min:3|max:768',
            ]
        );
        if (!$req->about_img) {
            $data = [
                'work_exp' => $req->work_exp,
                'about_title' => $req->about_title,
                'about_p1' => $req->about_p1,
                'about_p2' => $req->about_p2
            ];
        } else {
            $apage = $this->UserModel->about();
            $photo_path = public_path('user/img/' . $apage->about_img);
            if (!empty($apage->about_img)) {
                unlink($photo_path);
            }
            $img = $req->about_img;
            $img_about = time() . '.' . $img->getClientOriginalName();
            $img->move(public_path('user/img'), $img_about);
            $data = [
                'about_img' => $img_about,
                'work_exp' => $req->work_exp,
                'about_title' => $req->about_title,
                'about_p1' => $req->about_p1,
                'about_p2' => $req->about_p2
            ];
        }
        $this->AdminModel->updAboutPage($data);
        $notif = [
            'pesan' => 'About page updated!',
            'alert' => 'success'
        ];
        return redirect()->back()->with($notif);
    }

    //End of Manage Page
}
