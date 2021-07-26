<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use App\Models\Event;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function savecomment(Request $request, Event $event)
    {
        
    
        $request->validate([
            'description' => 'required|min:1|max:120',
            'photo' => 'mimes:jpg,png|max:2048'
        ]);

        
        if($request->file('photo')!= null)
        {
            $path = $request->file('photo')->store('event', ['disk' => 'public']);

        } 
        else{
            $path = null;
        }
        $comment = Comment::create([
            'description' => $request->description,
            'post_id' => $event -> id,
            'user_id' => auth() -> id(),
            'image' => $path,
            
        ]);
       
       return redirect()->back();
    }

    public function delete(Comment $comment)
    {
       if ($comment->user_id == auth()->id())
       {
        $comment->delete();
        return redirect()->back();
       }
       
    }
}
