<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Link;
use Illuminate\Support\Facades\DB;
class LinkController extends Controller
{

    public function index()
    {
        if(Auth::check()){
        $user_id = Auth::user()->id;
            $links = Link::where('iduser',$user_id)->paginate(10);
            $lists = DB::table('links')
                ->select('category')
                ->groupBy('category')
                ->get();
            return view('pages.links',['links' => $links,'lists' => $lists]);
        }
    }

    public function store()
    {
        if(Auth::check()){
        $user_id = Auth::user()->id;
        Link::create([
            'title' => request('title'),
            'name' => request('name'),
            'href' => request('link'),
            'picture' => request('picture'),
            'category' => request('category'),
            'iduser' => $user_id,
           
        ]);
        $lists = DB::table('links')
            ->select('category')
            ->groupBy('category')
            ->get();
        $links = Link::where('iduser',$user_id)->paginate(10);
        return view('pages.links',['links' => $links,'lists' => $lists]);
        }
        
    }

    public function list($param)
    {
        if(Auth::check()){
        $user_id = Auth::user()->id;
        $links = Link::where('iduser',$user_id)
        ->where('category',$param)
        ->orderBy('name')
        ->paginate(10);
        $lists = DB::table('links')
            ->select('category')
            ->groupBy('category')
            ->get();
        return view('pages.links',['links' => $links,'lists' => $lists]);
        }
    }
}
