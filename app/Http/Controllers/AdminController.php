<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_access_menu;
use App\User_menu;
use App\User_sub_menu;
use App\Event;
use DB;
use Auth;
//use App\Http\Controllers\DB;
class AdminController extends Controller
{
    function __construct() { 
        $this->middleware('preventBackHistory'); 
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->role_id;
        $id_user = Auth::user()->id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        $date = date("Y-m-d");
        $event = Event::where('tgl_mulai','>=',$date)->where('id_user','=',$id_user)->get()->toArray();
        //dd($event);
        $jml_p = User::where('role_id','=',2)->count();
        $jml_m = User::where('role_id','=',3)->count();
        $jml_e = Event::all()->count();
        $q = \DB::table('Events');
        if($q->count() > 0){
            foreach ($q->get()->toArray() as $d) {
                $jml[] = $d;
            }
        }
        //dd($jml);
        $data = [
            'title' => 'Dashboard',
            'role_id' => $role_id,
            'jml' => $jml,
        ];
        return view('admin.index', ['data' => $data,'subMenu' => $subMenu, 'menu'  => $menu, 'event' => $event, 'jml_p' => $jml_p, 'jml_m' => $jml_m, 'jml_e' => $jml_e ]);
    }

    public function manage(){
        $role_id = Auth::user()->role_id;
        $id_user = Auth::user()->id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        $user = User::where('role_id','!=',$role_id)->get();
        $data = [
            'title' => 'Manage User',
            'role_id' => $role_id,
            'user'  =>  $user
        ];
        return view('admin.manage', ['data' => $data,'subMenu' => $subMenu, 'menu'  => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        return \redirect(url('manageUser'))->with('status','User berhasil dihapus');
    }
}
