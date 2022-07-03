<?php

namespace App\Http\Controllers;

use App\Models\ContactUsMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Inertia\Inertia;

class ContactUsController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        return Inertia::render('ContactUs/ContactUs');
    }

    public function store(Request $request) {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactUsMessages::create($data);
        return redirect()->back()->with('success', 'Message sent!');
    }
}
