<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function list(){
        $user=DB::table('users')->get();
        return view('user.list',compact("user"));
    }
    public function edit(Request $request,$id)
    {
        $user=User::find($id);
        if($request->isMethod('POST')){
            $result=User::where('id',$id)->update($request->except('_token'));
            if($result){
              Session::flash('success','sửa thành công');
              return redirect()->route('route_user_edit',['id'=>$id]);
            }
        }
        // dd($category);
        return view('user.edit',compact('user'));
    }

    // public function edit(CategoryRequest $request,$id)
    // {
    //     $category=Category::find($id);
    //     if($request->isMethod('POST')){
    //         $result=Category::where('id',$id)->update($request->except('_token'));
    //         if($result){
    //           Session::flash('success','sửa thành công');
    //           return redirect()->route('route_category_edit',['id'=>$id]);
    //         }
    //     }
    //     // dd($category);
    //     return view('category.edit',compact('category'));
    // }
    // public function delete($id){
    //     Category::where('id',$id)->delete();
    //     Session::flash('success','xoa thanh cong id la'.$id);
    //     return redirect()->route('route_category_list');
    // }
}
