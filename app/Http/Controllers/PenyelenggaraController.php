<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_access_menu;
use App\User_menu;
use App\User_sub_menu;
use App\Event;
use Auth;
class PenyelenggaraController extends Controller
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
        $event = Event::where('tgl_mulai','>=',$date)->where('id_user','=',$id_user)->get();
        //dd($event);
        $data = [
            'title' => 'Event',
            'role_id' => $role_id,
        ];
        return view('penyelenggara.index', ['event'=>$event],['data' => $data,'subMenu' => $subMenu, 'menu'  => $menu,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_id = Auth::user()->role_id;
        $id_user = Auth::user()->id;
        $menu = user_menu::join('user_access_menus','user_menus.id','=','user_access_menus.menu_id')->where('user_access_menus.role_id','=',$role_id)->orderBy('user_access_menus.id','ASC')->get()->toArray();
        foreach($menu as $m) {
            $menuId = $m['menu_id'];
            $subMenu[] = User_sub_menu::where('is_active','=',1)->where('menu_id','=', $menuId)->get()->toArray();
        }
        //dd($role_id,$menu,$subMenu);
        $data = [
            'title' => 'Add Event',
            'role_id' => $role_id,
            'id_user' => $id_user,
        ];
        return view('penyelenggara.addEvent', ['data' => $data,'subMenu' => $subMenu, 'menu'  => $menu,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
    		'nama_event' => 'required',
    		'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
    		'waktu_mulai' => 'required',
    		'waktu_selesai' => 'required',
    		'tempat' => 'required',
    		'kuota' => 'required',
    		'biaya' => 'required',
        ]);
        $data = $request->all();
        $data['image'] = $request->file('image')->Store(
            'assets/gallery', 'public'
        );
        Event::create($data);
        return \redirect(url('event'));
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
            'title' => 'Event',
            'role_id' => $role_id,
            'id_user' => $id_user,
            //'event' => $event,
        ];
        return view('penyelenggara.detailEvent', ['data'=>$data,'event' => $event,'subMenu' => $subMenu, 'menu'  => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
            'title' => 'Event',
            'role_id' => $role_id,
            'id_user' => $id_user,
            //'event' => $event,
        ];
        return view('penyelenggara.editEvent', ['data'=>$data,'event' => $event,'subMenu' => $subMenu, 'menu'  => $menu]);
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
        $old = Event::findOrFail($id);
        //$user = User::find($id);
    $data = $request->all();
    // $user->update($data);
    if ($request->file('image') == NULL) {
        $data['image'] = $old->image;
        //Storage::delete($request->user()->image);
    }else{
        $data['image'] = $request->file('image')->store('assets/gallery','public');
    }
    $item = Event::findOrFail($id);
    $item->update($data);
    return redirect(url('event'))->with('status','Event berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::destroy($id);
        return \redirect(url('event'))->with('status','Event berhasil dihapus');
    }
}
