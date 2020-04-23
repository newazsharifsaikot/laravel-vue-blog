<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    public function postList(){
        $post = Post::with('user', 'category')->orderBy('id','desc')->paginate(10);
        return response()->json($post,200);
    }

    public function store(Request $request){
        $this->validate($request,[
            'category_id'=>'required',
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);
        $str_position = strpos($request->image,';');
        $str_to_array = substr($request->image,0,$str_position);
        $extension = explode('/', $str_to_array);
        $maw = $extension[1];
        $image_name = time().'-'.uniqid().'.'.$maw;
        $resize_img = Image::make($request->image)->resize(600, 350);
        $path = public_path()."/uploads/post/";
        $resize_img->save($path.$image_name);

        $post = new post();
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $image_name;
        $post->save();
        return response()->json($post,200);
    }

    public function edit($id){
        $post = post::findOrFail($id);
        return response()->json($post,200);
    }

    public function upadte(Request $request,$id){
        $this->validate($request,[
            'category_id'=>'required',
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);

        $post = post::findOrFail($id);

        if ($request->image != $post->image){
            $str_position = strpos($request->image,';');
            $str_to_array = substr($request->image,0,$str_position);
            $extension = explode('/', $str_to_array);
            $maw = $extension[1];
            $image_name = time().'-'.uniqid().'.'.$maw;
            $resize_img = Image::make($request->image)->resize(600, 350);
            $path = public_path()."/uploads/post/";
            $resize_img->save($path.$image_name);
            if (file_exists('uploads/post/'.$post->image)){
                @unlink('uploads/post/'.$post->image);
            }
        }else{
            $image_name = $post->image;
        }

        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $image_name;
        $post->save();
        return response()->json($post,200);

    }

    public function details($id){
        $post = post::findOrFail($id);
        return response()->json($post,200);
    }


    public function destroy($id){
        $post = post::findOrFail($id);

        if (file_exists('uploads/post/'.$post->image)){
            @unlink('uploads/post/'.$post->image);
        }
        $post->delete();
        return response()->json($post,200);

    }


}
