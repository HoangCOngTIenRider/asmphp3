<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhoahocRequest;
use App\Models\Category;
use App\Models\khoahoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KhoahocController extends Controller
{
    public function list()
    {
        $category = DB::table('category')
            ->join('khoa_hoc','khoa_hoc.id_category', '=', 'category.id')
            ->select('category.*', 'khoa_hoc.name as nameKH','khoa_hoc.id as idKH','price','describe','process','image')
            ->whereNull('khoa_hoc.deleted_at')
            ->get();
            // dd($category);
        // $khoahoc = DB::table('khoa_hoc')->get();
        return view('khoa_hoc.list',compact('category'));
    }
    public function listHome()
    {
        $category = DB::table('category')
            ->join('khoa_hoc','khoa_hoc.id_category', '=', 'category.id')
            ->select('category.*', 'khoa_hoc.name as nameKH','khoa_hoc.id as idKH','price','describe','process','image')
            ->whereNull('khoa_hoc.deleted_at')
            ->get();
        return view('home',compact('category'));
    }
    public function add(KhoahocRequest $request){
        $category = DB::table('category')->get();
        if($request->post()){
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image']= uploadFile('hinh',$request->file('image'));
                
            }
    
            $khoahoc = Khoahoc::create($params);
            
         if($khoahoc->id){
            Session::flash('success','theem moi thanh cong');
            return redirect()->route('route_khoa_hoc_add');
         }
      }
        return view('khoa_hoc.add',compact('category'));
    }

    
    public function edit(KhoahocRequest $request,$id){
        $khoahoc = Khoahoc::find($id);
        $category = DB::table('category')->get();
        if($request -> isMethod('POST')){
            $parmas = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                //xóa ảnh cũ
                $resultDL= Storage::delete('/public'.$khoahoc->image);
                if($resultDL){
                    $params['image']= uploadFile('hinh',$request->file('image'));
                }
            }
            else{
                $params['image'] = $khoahoc->image;
            }
            Khoahoc::where('id',$id)
            ->update($parmas);
            if($request){
                Session::flash('success','sua thanh cong sv');
                return redirect()->route('route_khoa_hoc_edit',['id'=>$id]);
            }
        }
         return view('khoa_hoc.edit',compact('khoahoc','category'));
    }
    public function delete($id){
        khoahoc::where('id',$id)->delete();
        Session::flash('success','xoa thanh cong id la'.$id);
        return redirect()->route('route_khoa_hoc_list');
    }
}
