<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDataAdmin(Request $request) {
        $search = $request->input('search');

        $admin = Admin::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10);

        return view('admin.index', ['admin' => $admin]);
    }

    
}
