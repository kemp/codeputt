<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display the user's profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();

        return view('profile.show', compact('user'));
    }

}
