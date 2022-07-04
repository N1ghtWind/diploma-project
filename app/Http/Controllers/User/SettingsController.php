<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('User/Settings', [

            'user_profile_picture' => User::find(auth()->user()->id)?->getMedia()?->first()?->getUrl(),
            'is_carrier' => User::find(auth()?->user()?->id)?->is_carrier(),
            'default_image' => asset('assets/images/default.webp'),
        ]);
    }

    public function account()
    {
        return Inertia::render('User/Account');
    }

    public function update_user_data(Request $request)
    {

        if ($request?->has('image') && $request?->image != null && $request?->image?->getSize() > 0) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            if (User::find(auth()->user()->id)?->getMedia()?->first() != null) {
                foreach (User::find(auth()->user()->id)?->getMedia() as $media) {
                    $media->delete();
                }
            }
            User::findOrFail(auth()->user()->id)->addMediaFromRequest('image')->usingName($image_name)->toMediaCollection();
        } else {
            return redirect()->back()->with('error', ['Please select an image']);
        }
        return redirect()->back()->with('success', 'Successfully updated the profile data!');
    }
}
