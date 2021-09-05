<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBadgeRequest;
use App\Models\Badge;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BadgeController extends Controller
{

    /**
     * BadgeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {
        return view('badges.new');
    }

    public function store(StoreBadgeRequest $request): RedirectResponse
    {
        Badge::create($request->validated());
        return back();
    }
}
