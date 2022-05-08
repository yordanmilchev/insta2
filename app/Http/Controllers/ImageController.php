<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Admin;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    function imagesave(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required|image'
        ]);
        $image = new Image;
        $image->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/images/', $filename);
            $image->image = $filename;
        }
        $image->userid = session('LoggedUser');
        $image->save();
        return redirect()->back()->with('status','Image added successfully.');
    }

    function profile_pic_save(Request $request)
    {
        $request -> validate(['profile_image' => 'required|image']);
        $value = session('LoggedUser');
        $image = new Image;
        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $default_profile_pic = Image::where('image', 'default.png')->where('profile_pic_id', $value)->first();
            if($default_profile_pic){
                $default_profile_pic->delete();
            }
            else
            {
                $old_profile_pic = Image::where('profile_pic_id', $value)->first();
                if($old_profile_pic)
                {
                    File::delete('uploads/profile_pic/'.$old_profile_pic->image);
                    $old_profile_pic->delete();
                }
            }
            $file->move('uploads/profile_pic/', $filename);
            $image->image = $filename;
        }
        $image->userid = $value;
        $image->profile_pic_id = $value;
        $image->save();
        return redirect()->back()->with('status_pic','Image added successfully.');
    }

    function delete_pic($id)
    {
        $deletedImage = Image::find($id);
        File::delete('uploads/images/'.$deletedImage->image);
        $deletedImage->delete();
        Comment::where('pic_id', $id)->delete();
        return response()->json(['id' => $id]);
    }

    function user_id($id)
    {
        $image = Image::where('id', $id)->with('user')->with('profile_pic')->first();
        return response()->json(['image' => asset('uploads/profile_pic').'/'. $image->profile_pic->image,
            'name' => $image->user->name, 'description' => $image->description]);
    }

    function showcomments($id)
    {
        $data = '';
        $comments = Comment::orderby('id', 'desc')->where('pic_id', $id)->with('user')->get();
        if($comments->count()>0)
        {
            foreach ($comments as $item)
            {
                $data .= '<h5 style="color: black;"><span style="font-weight: bold;">'.$item->user->name.'</span>: '.$item->comment.'</h5>';
            }
        }
        else
        {
            $data = '<h5 style="color: black;text-align: center;">No comments</h5>';
        }
        return response()->json(['data' => $data]);
    }

    function addcomment(Request $request)
    {
        $pic_id = $request->get('pic');
        $text = $request->get('text');
        if($text != '')
        {
            $comment = new Comment;
            $comment->userid = session('LoggedUser');
            $comment->comment = $text;
            $comment->pic_id = $pic_id;
            $comment->save();
        }
        $data = '';
        $comments = Comment::orderby('id', 'desc')->where('pic_id', $pic_id)->with('user')->get();
        foreach ($comments as $item)
        {
            $data .= '<h5 style="color: black;"><span style="font-weight: bold;">'.$item->user->name.'</span>: '.$item->comment.'</h5>';
        }
        return response()->json(['data' => $data]);
    }
}
