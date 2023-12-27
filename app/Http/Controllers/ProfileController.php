<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showEditProfile() {
        return view('dashboard.edit');
    }
}
