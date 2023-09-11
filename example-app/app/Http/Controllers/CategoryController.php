<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    public function list()
    {
        $category = DB::table('category')->whereNull('deleted_at')->get();
        // dd($category);
        return view('category.list', compact('category'));
    }
    public function add(CategoryRequest $request)
    {
        if ($request->isMethod('POST')) {
            // dd($request->except('_token'));
            $category = Category::create($request->except('_token'));
            if ($category->id) {
                Session::flash('success', 'Thêm mới thành công');
                return redirect()->route('route_category_add');
            }
        }

        return view('category.add');
    }

    public function edit(CategoryRequest $request,$id)
    {
        $category=Category::find($id);
        if($request->isMethod('POST')){
            $result=Category::where('id',$id)->update($request->except('_token'));
            if($result){
              Session::flash('success','sửa thành công');
              return redirect()->route('route_category_edit',['id'=>$id]);
            }
        }
        // dd($category);
        return view('category.edit',compact('category'));
    }
    public function delete($id){
        Category::where('id',$id)->delete();
        Session::flash('success','xoa thanh cong id la'.$id);
        return redirect()->route('route_category_list');
    }
}
