<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplyRequest;
use App\Models\Topic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ReplyController extends Controller
{

    /**
     * ReplyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Topic $topic, StoreReplyRequest $request): RedirectResponse
    {
        $topic->replies()->create([
                'user_id' => auth()->user()->id,
            ] + $request->validated());

        return back();

    }

}
