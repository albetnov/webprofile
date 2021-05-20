<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\User;
use App\Models\UserContact;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'basecms' => $this->UserModel->basecms(),
            'ipg' => $this->UserModel->index(),
            'service' => $this->UserModel->Iservice(),
            'team' => User::limit(4)->get()
        ];
        return view('user.index', $data);
    }

    public function about()
    {
        $data = [
            'basecms' => $this->UserModel->basecms(),
            'apg' => $this->UserModel->about()
        ];
        return view('user.about', $data);
    }

    public function service()
    {
        $data = [
            'basecms' => $this->UserModel->basecms(),
            'spage' => $this->UserModel->service()
        ];
        return view('user.service', $data);
    }

    public function team()
    {
        $data = [
            'basecms' => $this->UserModel->basecms(),
            'users' => User::get()
        ];
        return view('user.team', $data);
    }

    public function contact()
    {
        $data = [
            'basecms' => $this->UserModel->basecms()
        ];
        return view('user.contact', $data);
    }

    public function send_contact(Request $req)
    {
        $req->validate(
            [
                'name_contact' => 'required|min:3|max:50',
                'email_contact' => 'required|email|min:5|max:40',
                'subject_contact' => 'required|min:3|max:64',
                'message_contact' => 'required|min:15|max:1024'
            ]
        );   
        $data = [
            'name_contact' => $req->name_contact,
            'email_contact' => $req->email_contact,
            'subject_contact' => $req->subject_contact,
            'message_contact' => $req->message_contact
        ];
        UserContact::create($data);
        $notif = [
            'alert' => 'success',
            'pesan' => 'Pesan terkirim'
        ];
        return redirect()->back()->with($notif);
    }

}
