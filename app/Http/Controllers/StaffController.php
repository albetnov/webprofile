<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $data = [
            'staffanc' => Staff::get()
        ];
        return view('staff.index', $data);
    }
}
