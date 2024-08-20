<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ticket;
use App\Models\Task;
use App\Models\User;
use App\Models\Review_App;
use Illuminate\Support\Facades\DB;
use App\Models\application;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function ticket_task_dashboard(){
        $top_task_type = DB::select('
            SELECT task_type, count(task_type) AS Jumlah
            FROM tasks 
            GROUP BY task_type
            ORDER BY Jumlah desc
        ');
        
        return view('admin.ticket_task_dashboard',[
            'request' => Ticket::where('Request_Type', 'Request')->get(),
            'incident' => Ticket::where('Request_Type', 'Incident')->get(),
            'task' => Task::all(),
            'tiket_api' => Ticket::all(),
            'top_task_type' => $top_task_type
        ]);
    }

    public function dashboardSite(){
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
    
        return view('admin.dashboard', [
            'tiket_api' => Ticket::all(),
            'task_api' =>  Task::all(),
            'top_tiket_teknisi' => $top_tiket_teknisi,
            'top_task_teknisi' => $top_task_teknisi,
            'least_ticket_teknisi' => $least_ticket_teknisi,
            'least_task_teknisi' => $least_task_teknisi,
            'teknisi' => User::where('Role', 'Teknisi')->get(),
            'tiket_complete' => Ticket::where('Request_Status', 'Closed')->get(),
            'task_complete' => Task::where('task_status', 'Closed')->get(),
            'application' => Application::all(),
            'review_aplikasi' => Review_App::all()
        ]);
    }
    
    public function detailTeknisi($id){
        $tiket = Ticket::where('user_id', $id)->get();
        $user = ($tiket[0]->user);
        $now = Carbon::now();
        $daftar_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('admin.detail_tiket_teknisi',[
            'tiket' => $tiket,
            'request' => $user->Nama_User,
            'teknisi' => $user,
            'bulan' => $daftar_bulan,
            'bulan_sekarang' => $now->month
        ]);
    }

    public function filterTeknisi(Request $request){

        $tiket = Ticket::where('user_id', $request->id)->get();
        dd($tiket);
        if ($tiket->has('month')) {
            $tiket_by_month = Ticket::whereMonth('created_at', $request->input('month'))->get();
         }else{
            $tiket_by_month = [];
         }

        $user = ($tiket[0]->user);
        $now = Carbon::now();
        $daftar_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('admin.detail_tiket_teknisi',[
            'tiket' => $tiket_by_month,
            'request' => $user->Nama_User,
            'teknisi' => $user,
            'bulan' => $daftar_bulan,
            'bulan_sekarang' => $now->month
        ]);
    }
}