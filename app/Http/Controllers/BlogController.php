<?php

namespace App\Http\Controllers;

use App\Category;
use App\post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $post = Post::with('user', 'category')->orderBy('id','desc')->get();
        return response()->json($post,200);
    }

    public function single_post($id){
        $post = Post::with('user', 'category')->where('id', $id)->first();
        return response()->json($post,200);
    }

    public function latest_post(){
        $post = Post::orderBy('id', 'desc')->get();
        return response()->json($post,200);
    }

    public function category(){
        $category = Category::all();
        return response()->json($category,200);
    }

    public function category_by_post($id){
        $post = post::with('user', 'category')->where('category_id', $id)->get();
        return response()->json($post,200);
    }

    public function search(){
        $data = \Request::get('s');

        if($data){
            $post = post::where('title', 'LIKE', "%$data%")
                ->orWhere('description', 'LIKE', "%$data%")
                ->get();
            return response()->json($post, 200);
        }else{
            return $this->index();
        }

    }


}
