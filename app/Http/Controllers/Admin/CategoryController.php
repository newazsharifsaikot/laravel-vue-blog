<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(){
        $category = Category::orderBy('id', 'desc')->paginate(10);

            return response()->json($category,200);
        }


    public function store(Request $request){
        $this->validate($request,[
           'name'=>'required|unique:categories'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return response()->json($category, 200);
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return response()->json($category,200);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|unique:categories,name,'.$id
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return response()->json($category, 200);
    }

    public function details($id){
        $category = Category::findOrFail($id);
        return response()->json($category, 200);
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json($category,200);
    }

    public function delete_all($id){
        $all_id = explode(',',$id);
        foreach ($all_id as $id){
            $category = Category::find($id);
            $category->delete();
        }
    }


}
