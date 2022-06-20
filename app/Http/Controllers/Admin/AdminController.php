<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
   public function index() {
    Inertia::setRootView('admin');
    return Inertia::render('Admin/Admin');
   }


}
