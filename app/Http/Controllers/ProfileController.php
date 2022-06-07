<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function index(User $user)
    {

        /**
         * Determine if the authenticated user follow the profile of an user
         * @return Boolean to show following status
         */
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile):false;

        $followers = Cache::remember(
            'followers.count.' . $user->id,
            now()->addSeconds(30),
            function(){
            return auth()->user()->profile->followers->count();
        });

        $following = Cache::remember(
            'following.count.' . $user->id,
            now()->addSeconds(30),
            fn() => $user->following->count()
        );

        $postsCount = Cache::remember(
            'posts.count.' . $user->id,
            now()->addSeconds(30),
            fn() => $user->posts->count()
        );

        if ($user->profile) {
            return view('profiles.home', compact('user', 'follows','following', 'followers', 'postsCount'));
        } else {
            abort(404);
        }
    }

    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        return view('profiles.edit', compact('profile'));
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $profile->update($request->getProfileData());
        $profile->save();
        return to_route('profile.home', auth()->user()->username );
    }
}