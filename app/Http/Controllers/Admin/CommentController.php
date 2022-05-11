<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $model;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->model = $comment;
        $this->user = $user;
    }


    public function index(Request $request, $user_id)
    {
        /*se não existir usuario*/
        if (!$user = $this->user->find($user_id))
            return redirect()->back();

        $comments = $user->comments()->get();

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($user_id)
    {
        if (!$user = $this->user->find($user_id))
            return redirect()->back();

        return view('users.comments.create', compact('user'));
    }

    public function store(Request $request, $user_id)
    {
        if (!$user = $this->user->find($user_id))
            return redirect()->back();

        //$comments = $user->comments()->create($request->all());
        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function edit($user_id, $id)
    {
        //Buscando o usuario pelo id
        if (!$comment = $this->model->find($id)) {
            return redirect()->back();
        }

        $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }

    public function update(Request $request, $id)
    {
        if (!$comment = $this->model->find($id)) {
            return redirect()->back();
        }
        //$comments = $user->comments()->create($request->all());
        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $comment->user_id);
    }
}
