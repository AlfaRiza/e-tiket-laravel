<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Peserta_event;
use App\User_access_menu;
use App\User_menu;
use App\User_sub_menu;
use Auth;
//use App\Auth;
//use App\Http\Controllers\Auth;
use App\Http\Controllers\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $role_id = Auth::user()->role_id;
        $image = Auth::user()->image;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        //dd($role_id,$menu,$subMenu);
        $data = [
            'title' => 'Home',
            'role_id' => $role_id,
            'image' => $image,
        ];
        return view('user.index', ['data' => $data,'subMenu' => $subMenu, 'menu'  => $menu,]);
    }

    public function myEvent(){
        $role_id = Auth::user()->role_id;
        $id = Auth::user()->id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        //dd($role_id,$menu,$subMenu);
        $data = [
            'title' => 'My Event',
            'role_id' => $role_id,
        ];
        $date = date("Y-m-d");
        $event = Event::join('peserta_events','events.id','=','peserta_events.id_event')->where('tgl_mulai','>=',$date)->where('peserta_events.id_user','=',$id)->get();
        
        return view('user.myEvent',['event'=>$event],['data' => $data,'subMenu' => $subMenu, 'menu'  => $menu,]);
    }
    public function allEvent(){
        $role_id = Auth::user()->role_id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        //dd($role_id,$menu,$subMenu);
        $date = date("Y-m-d");
        $data = [
            'title' => 'All Event',
            'role_id' => $role_id,
        ];
        $event = Event::where('tgl_mulai','>=',$date)->get();
        return view('user.allEvent',['event'=>$event], ['data' => $data,'subMenu' => $subMenu, 'menu'  => $menu,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Ikuti($id){
        $id_user = Auth::user()->id;
        $cek = Peserta_event::where('id_event','=',$id)->where('id_user','=',$id_user)->get()->toArray();
        if($cek){
            return redirect(url('allEvent'))->with('status','Anda sudah mengikuti event ini');
        }else{
            Peserta_event::create([
                'id_event' => $id,
                'id_user'   => $id_user,
            ]);
            return redirect(url('myEvent'))->with('status','Event Berhasil diikuti');
        }
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
        $role_id = Auth::user()->role_id;
        $id_user = Auth::user()->id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        //dd($role_id,$menu,$subMenu);
        $event = Event::find($id);
        $data = [
            'title' => 'All Event',
            'role_id' => $role_id,
            'id_user' => $id_user,
            //'event' => $event,
        ];
        return view('penyelenggara.detailEvent', ['data'=>$data,'event' => $event,'subMenu' => $subMenu, 'menu'  => $menu]);
    }
    public function detail($id)
    {
        $role_id = Auth::user()->role_id;
        $id_user = Auth::user()->id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        //dd($role_id,$menu,$subMenu);
        $event = Event::find($id);
        $data = [
            'title' => 'AllEvent',
            'role_id' => $role_id,
            'id_user' => $id_user,
            //'event' => $event,
        ];
        return view('user.detailEvent', ['data'=>$data,'event' => $event,'subMenu' => $subMenu, 'menu'  => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $role_id = Auth::user()->role_id;
        $id_user = Auth::user()->id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }

        $user = User::where('id','=',$id_user)->get()->toArray();
        //dd($user);
        
        $data = [
            'title' => 'Edit Profile',
            'role_id' => $role_id,
            'id_user' => $id_user,
        ];
        return view('User.editProfile',['user'=>$user] ,['data'=>$data,'subMenu' => $subMenu, 'menu'  => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::User()->id;
        $old = Auth::User()->image;
        $user = User::find($id);
    $data = $request->all();
    // $user->update($data);
    if ($request->file('image') == NULL) {
        $data['image'] = $old;
        //Storage::delete($request->user()->image);
    }else{
        $data['image'] = $request->file('image')->store('assets/gallery','public');
        
    }
    $request->user()->update($data);
        return redirect(url('user'))->with('status','Profile berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
