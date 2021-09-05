<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Models\Topic;
use Illuminate\Http\RedirectResponse;

class TopicController extends Controller
{

    /**
     * TopicController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {
        return view('topics.new');
    }

    public function store(StoreTopicRequest $request): RedirectResponse
    {
        $topic = auth()->user()->topics()->create($request->validated());
        return redirect()->route('topic.show', $topic);
    }

    public function index()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }
}
