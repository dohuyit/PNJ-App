<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listComments = Comment::all();

        return view('backend.pages.comments.list', compact('listComments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        try {
            DB::transaction(function () use ($comment) {
                $comment->delete();
            });

            return redirect()->route('comment.index')->with('success', 'Xóa bình luận thành công!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
