<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function homeclient(Request $request)
    {   
        $id=Auth::user()->id;
        $user=DB::table('users')->find($id);
        // dd($user);
        $category = DB::table('category')
            ->join('khoa_hoc','khoa_hoc.id_category', '=', 'category.id')
            ->select('category.*', 'khoa_hoc.name as nameKH','khoa_hoc.id as idKH','price','describe','process','image')
            ->whereNull('khoa_hoc.deleted_at')
            ->get();
        // $khoahoc = DB::table('khoa_hoc')->get();
        return view('client.home',compact('category','user'));
        
    }
    public function addToCart(Request $request,$id){
        // dd($request);
        $idUser=Auth::user()->id;
        $user=DB::table('users')->find($idUser);
        $bill= new Bill();
        $bill->id_user=$user->id;
        $bill->id_khoa_hoc=$request->id;
        $bill->save();
        // dd($bill);
        return view('client.cart',compact('user'));
    }
}
