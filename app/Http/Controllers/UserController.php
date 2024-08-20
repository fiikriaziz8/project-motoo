<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\application_teknisi;
use App\Models\application;
use App\Models\Ticket;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller{
    
    public function profile($x){
        return view('profile',[
            'page' => 'Profile',
            'user' => User::find($x)
        ]);
    }
    

    public function viewEdit($x){
        return view('editprofile',[
            'page' => 'Profile',
            'user' => User::find($x)
        ]);
    }

    
    public function create(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nomor_hp' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ]);

        User::insert([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'Nomor_HP' => $request->nomor_hp,
            'Nama_User' => $request->nama,
            'Email' => $request->email,
            'Role' => 'Konsumen',
            'Status_Keaktifan'=> true, 
        ]);
        
        return redirect()->route('loginpage');
    }
    
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);
        
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->with('loginError', 'Login Failed');
    }
        
        public function edit(Request $request){
            $request->validate([
                'username' => 'required',
                'Nomor_HP' => 'required',
                'Nama_User' => 'required',
                'Email' => 'required',
            ]);

            User::where('id', $request->id)->update([
                'username' => $request->username,
                'Nomor_HP' => $request->nomor_hp,
                'Nama_User' => $request->nama_user,
                'Email' => $request->email  ,
            ]);
            return redirect()->route('profile', $request->id);
        }

        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('loginpage');
        }
        
        public function showJob(){
            return view('tesdata', [
                'page' => 'arip',
                'user' => User::with('applications')->get(),
                'userr' =>User::all(),
                'apps' => application::all(),
                'application' => application::with('users')->get(),
                'ticket' => Ticket::all(),
                'ticket2' => Ticket::orderBy('user_id','asc')->get(),
        ]);
    }

    public static function countTicket($id){
        $count = Ticket::where('user_id', $id)->count();
        return $count;
    }

    public function employee_dashboard(){
        $top_tiket_teknisi = DB::select('
                SELECT u.id, u.Nama_User, COUNT(t.id) AS jumlah_tiket
                FROM tickets t
                JOIN users u ON t.user_id = u.id
                GROUP BY u.id, u.Nama_User
                ORDER BY jumlah_tiket desc'
            );
        $top_task_teknisi = DB::select('
                SELECT u.id, u.Nama_User, COUNT(t.id) AS jumlah_task
                FROM tasks t
                JOIN users u ON t.user_id = u.id
                GROUP BY u.id, u.Nama_User
                ORDER BY jumlah_task desc'
            );
        $least_ticket_teknisi =  DB::select('
                    SELECT u.id, u.Nama_User, COUNT(t.id) AS jumlah_tiket
                    FROM tickets t
                    JOIN users u ON t.user_id = u.id
                    GROUP BY u.id, u.Nama_User
                    ORDER BY jumlah_tiket asc'
                );
        $least_task_teknisi =  DB::select('
                    SELECT u.id, u.Nama_User, COUNT(t.id) AS jumlah_task
                    FROM tasks t
                    JOIN users u ON t.user_id = u.id
                    GROUP BY u.id, u.Nama_User
                    ORDER BY jumlah_task asc'
                );
        return view('admin.report',[
            'top_tiket_teknisi' => $top_tiket_teknisi,
            'top_task_teknisi' => $top_task_teknisi,
            'least_ticket_teknisi' => $least_ticket_teknisi,
            'least_task_teknisi' => $least_task_teknisi,
            'karyawan' => User::all(),
        ]);
    }
}