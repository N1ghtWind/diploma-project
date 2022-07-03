<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    public function rootView(Request $request): string
    {

        return 'app';
    }

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            '_token' => csrf_token(),
            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ? [
                        'id' => $request->user()->id,
                        'name' => $request->user()->name,
                        'media' => $request?->user()?->userable?->media()?->first() ? [
                            'id' => $request->user()->userable->media()->first()->id,
                            'url' => $request->user()->userable->media()->first()->original_url,
                        ] : null,
                    ] : null,
                ];

            },
            'flash' =>  [
                'success' => session()->get('success'),
            'error' => $request->session()->get('error'),
            ],


            'notifications' => $request?->user()?->is_admin() ? [
                'admin' => [
                    'count' => $request->user()->unreadNotifications()->count(),
                    'data' => $request->user()->unreadNotifications()->get() ? $request->user()->unreadNotifications()->get()->each(function ($notification) {
                        $notification->diff_time = $notification->created_at->diffForHumans();
                    }) : null,
                ],
            ] : [],
        ]);
    }
}
