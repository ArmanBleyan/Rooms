<?php
 
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(Request $request)
    {

        $admins = Auth::user()->name;


        $id = Auth::id();

        $admin = User::where('id', '=', $id)->first('type');


        $search = $request['search'] ?? "";
        if($search != ""){
             $rooms = Room::where('type', 'LIKE', "$search%")->get();
        }else {
             $rooms = Room::all();
        }


        return view ('room.index', compact('admins', 'rooms', 'admin'));
    }
 
    
    public function create()
    {
        $admins = Auth::user()->name;

        return view('room.create', compact('admins'));
    }

    public function store(Request $request)
    {
        
        $room = new Room();

        $room->name = $request->input('name');
        $room->description = $request->input('description');
        $room->type = $request->input('type');
        $room->booking = $request->input('booking');
       
        $room->save();
        return redirect('/admin');

    }
 
    
    public function edit($id)
    {
        $admins = Auth::user()->name;
        
        $room = Room::find($id);

        $id = Auth::id();

        $admin = User::where('id', '=', $id)->first('type');

        return view('room.edit', compact('room', 'admins', 'admin'));
    }


    
    public function update(Request $request, $id)
    {

            $room = Room::find($id);

            $auth_id = Auth::id();

            $user = User::where('id', '=', $auth_id)->first();

            if($user['type']){

                $room->name = $request->input('name');
                $room->description = $request->input('description');
                $room->type = $request->input('type');
                $room->booking = $request->input('booking');

            }else {

                $room->booking = $request->input('booking');

            }


            $room->save();

            return redirect('/admin');    

    }
 
  
    public function destroy($id)
    {
        Room::destroy($id);
        return redirect('/admin');  
    }


}