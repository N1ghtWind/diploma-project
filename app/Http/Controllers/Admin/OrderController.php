<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        Inertia::setRootView('admin');
        $users = User::all();
        return Inertia::render('Admin/Orders', compact('users'));
    }
}
