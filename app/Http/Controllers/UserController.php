<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

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
            'ipg' => $this->UserModel->index()
        ];
        return view('user.index', $data);
    }

    public function about()
    {
        $data = [
            'basecms' => $this->UserModel->basecms()
        ];
        return view('user.about', $data);
    }

    public function service()
    {
        $data = [
            'basecms' => $this->UserModel->basecms()
        ];
        return view('user.service', $data);
    }

    public function team()
    {
        $data = [
            'basecms' => $this->UserModel->basecms()
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

}
