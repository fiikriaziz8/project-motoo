<?php

namespace App\Http\Controllers;

use App\Models\application;
use App\Models\Review_App;
use App\Models\Favorite;
use App\Models\application_teknisi;
use App\Models\User;
use App\Http\Requests\StoreapplicationRequest;
use App\Http\Requests\UpdateapplicationRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ApplicationController extends Controller{
    public function searchApp(Request $request){
        if ($request->has('search')){
            if($request->kategori == "" && $request->search == ""){
                $search = "All Categories";
                $application = application::paginate(6);
            }
            if ($request->search != "" && $request->kategori == ""){
                $application = application::whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])->paginate(6);
                $search = "All Categories";
            }
            if($request->search == null && $request->kategori != ""){
                $application = application::where('Login', '=', $request->kategori)->paginate(6);
                $search = $request->kategori;
            }
            if($request->search != "" && $request->kategori != ""){
                $application = application::whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                                            ->where('Login','=',$request->kategori)
                                            ->paginate(6);     
                $search = "All Categories";
            }   
        }
        else{
            $application = application::paginate(6);
            $search = "All Categories";
        }
    

        $top_app = Review_App::selectRaw('application_id, avg(Penilaian) as avg')
                    ->groupBy('application_id')
                    ->orderBy('avg', 'desc')
                    ->paginate(3);
        

        return view('store', [
            'app' => application::all(),
            'page' => 'Search App',
            'search' => $search,
            'request_temp' => $request,
            'rev' => Review_App::all(),
            'top_app' => $top_app,
            'application' => $application
        ]);
    }

    public function filterApp(Request $request){
        #SEARCH, KATEGORI, LOGIN, DEVICE
        if($request->has('categories') && $request->has('login') && $request->has('device') && $request->has('search')){
            $application = application::where('Category', $request->categories)
            ->where('Login', $request->login)
            ->where('Device', $request->device)
            ->whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
            ->paginate(6);
            $search =$request->categories . " / ". $request->login . " / " . $request->device;
        }
        else{
            #SEARCH, KATEGORI, LOGIN
            if($request->has('categories') && $request->has('login') && $request->has('search')){
                $application = application::where('Category', $request->categtories)
                ->where('Login', $request->login)
                ->whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                ->paginate(6) ;
                $search = $request->categories . " / " . $request->login;
            }
            else{
                #SEARCH, KATEGORI, DEVICE
                if($request->has('categories') && $request->has('device') && $request->has('search')){
                    $application = application::where('Category', $request->categtories)
                    ->where('Device', $request->device)
                    ->whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                    ->paginate(6) ;
                    $search = $request->categories . " / " . $request->device;
                }
                else{
                    #SEARCH, DEVICE, LOGIN
                    if($request->has('device') && $request->has('login') && $request->has('search')){
                        $application = application::where('Device', $request->device)
                        ->where('Login', $request->login)
                        ->whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                        ->paginate(6) ;
                        $search = $request->login . " / " . $request->device;
                    }
                    else{
                        #DEVICE, LOGIN, KATEGORI
                        if ($request->has('device') && $request->has('login') && $request->has('categories')){
                            $application = application::where('Device', $request->device)
                            ->where('Login', $request->login)
                            ->where('Category', $request->categories)
                            ->paginate(6) ;
                            $search =$request->categories . " / ". $request->login . " / " . $request->device;
                        }
                        else{
                            #SEARCH, KATEGORI
                            if($request->has('categories') && $request->has('search')){
                                $application = application::where('Category', $request->categories)
                                ->whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                                ->paginate(6);
                                $search = $request->categories;
                            }
                            else{
                                #SEARCH, DEVICE
                                if($request->has('device') && $request->has('search')){
                                    $application = application::where('Device', $request->device)
                                    ->whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                                    ->paginate(6);
                                    $search = $request->device;
                                }
                                else{
                                    #SEARCH, LOGIN
                                    if($request->has('login') && $request->has('search')){
                                        $application = application::where('Login', $request->login)
                                        ->whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                                        ->paginate(6);  
                                        $search = $request->login;
                                    }
                                    else{
                                        #DEVICE, LOGIN
                                        if($request->has('login') && $request->has('device')){
                                            $application = application::where('Login', $request->login)
                                            ->where('Device', $request->device)
                                            ->paginate(6);
                                            $search = $request->login . " / " . $request->device;
                                        }
                                        else{
                                            #LOGIN, KATEGORI
                                            if ($request->has('login') && $request->has('categories')){
                                                $application = application::where('Category', $request->categories)
                                                ->where('Login', $request->login)
                                                ->paginate(6);
                                                $search = $request->categories . " / " . $request->login;
                                            }
                                            else{
                                                #DEVICE, KATEGORI
                                                if ($request->has('device') && $request->has('categories')){
                                                    $application = application::where('Category', $request->categories)
                                                    ->where('Device', $request->device)
                                                    ->paginate(6);
                                                    $search = $request->categories . " / " . $request->device;
                                                }
                                                else{
                                                    #ONLY CATEGORIES
                                                    if($request->has('categories')){
                                                        $application = application::where('Category', $request->categories)
                                                        ->paginate(6);
                                                        $search = $request->categories;
                                                    }
                                                    else{
                                                        if($request->has('login')){
                                                            $application = application::where('Login', $request->login)
                                                            ->paginate(6);
                                                            $search = $request->login;
                                                        }
                                                        else{
                                                            if($request->has('device')){
                                                                $application = application::where('Device', $request->device)
                                                                ->paginate(6);   
                                                                $search = $request->device;
                                                            }
                                                            else{
                                                                if($request->has('search')){
                                                                    $application = application::whereRaw('LOWER(Nama_Aplikasi) LIKE ?', ["%{$request->search}%"])
                                                                    ->paginate(6);
                                                                    $search = "All Categories";
                                                                }
                                                                else{
                                                                    $application = application::paginate(6);
                                                                    $search = "All Categories";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $top_app = Review_App::selectRaw('application_id, avg(Penilaian) as avg')
                    ->groupBy('application_id')
                    ->orderBy('avg', 'desc')
                    ->paginate(3);
        
        return view('store', [
            'app' => application::all(),
            'search' => $search,
            'rev' => Review_App::all(),
            'page' => 'Filter',
            'top_app' => $top_app,
            'request_temp' => $request,
            'application' => $application,
        ]); 

    }

    public function getApplication(){
        return view('home', [
            'page' => 'Home',
            'application' => Application::paginate(12),
            'rev' => Review_App::all()
        ]);
    }

    public function appDetails($x){
        $app = Application::find($x);
        $relate_app = Application::where('Category', $app->Category)->get();
        $relate_app_final= $relate_app->reject(function($data, $x){
                return $data['application_id'] == $x;
            });
        $paginate = 4;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $relate_app_paginate = new LengthAwarePaginator($relate_app_final
                                                                ->forPage($currentPage, $paginate),
                                                                $relate_app_final->count(),
                                                                $paginate,
                                                                $currentPage
                                                            );
        
        return view('detail', [
            'page' => 'Apps Detail',
            'review' =>  Review_App::where('application_id', $x)->paginate(3),
            'review_all' => Review_App::where('application_id', $x)->get(),
            'app' => $app,
            'related_app' => $relate_app_paginate
        ]);
    }

    public function app_dashboard(){
        $aplikasi = Application::all();
        $review = Review_App::all();

        $blank_review = [];
        foreach($aplikasi as $app_item){
            $count = 0;
            foreach($review as $rev_item){
                if($rev_item->application_id == $app_item->id){
                    $count += 1;
                }
            }
            if ($count == 0){
                array_push($blank_review, $app_item->id);
            }
        }

        return view('admin.daftar_aplikasi',[
            'apps' => Application::paginate(10),
            'review_app_all' => Review_App::all(),
            'app_blank_review' => count($blank_review)
        ]);
    }

    public function deleteApp($id){
        
        $deleted = Application::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['message' => 'Data telah berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }
    }

    public function showFormCreate(){
        return view('admin.tambah_aplikasi');
    }

    public function createApp(Request $request){
        $request->validate([
            'Nama_Aplikasi' => 'required',
            'User_Guide' => 'required',
            'Technical_Document' => 'required',
            'Category'  => 'required',
            'Login'  => 'required',
            'Device'  => 'required',
            'Description' => 'required',
            'Platform' => 'required',
            'DB_Prod' => 'required',
            'DB_Dev' => 'required',
            'Server_Dev' => 'required',
            'Username_Aplikasi' => 'required',
            'Password_Aplikasi' => 'required',
            'Enviroment_Aplikasi' => 'required',
            'Notes_Aplikasi'  => 'required'
        ]);

        Application::insert([
            'Nama_Aplikasi' => $request->Nama_Aplikasi,
            'User_Guide' => $request->User_Guide,
            'Technical_Document' => $request->Technical_Document,
            'Category'  => $request->Category,
            'Login'  => $request->Login,
            'Device'  => $request->Device,
            'Description' => $request->Description,
            'Platform' => $request->Platform,
            'DB_Prod' => $request->DB_Prod,
            'DB_Dev' => $request->DB_Dev,
            'Server_Dev' => $request->Server_Dev,
            'Username_Aplikasi' => $request->Username_Aplikasi,
            'Password_Aplikasi' => $request->Password_Aplikasi,
            'Enviroment_Aplikasi' => $request->Enviroment_Aplikasi,
            'Notes_Aplikasi'  => $request->Notes_Aplikasi
        ]);

        return redirect()->route('daftar-aplikasi')
                ->with('success', 'Berhasil menambahkan data aplikasi!');
    }

    public function showEditForm($id){
        return view('admin.edit_aplikasi',[
            'app' => Application::where('id', $id)->first()
        ]);
    }

    public function updateApp(Request $request, $id){
        $request->validate([
            'Nama_Aplikasi' => 'required',
            'User_Guide' => 'required',
            'Technical_Document' => 'required',
            'Category'  => 'required',
            'Login'  => 'required',
            'Device'  => 'required',
            'Description' => 'required',
            'Platform' => 'required',
            'DB_Prod' => 'required',
            'DB_Dev' => 'required',
            'Server_Dev' => 'required',
            'Username_Aplikasi' => 'required',
            'Password_Aplikasi' => 'required',
            'Enviroment_Aplikasi' => 'required',
            'Notes_Aplikasi'  => 'required'
        ]);


        Application::where('id',$id)->update([
            'Nama_Aplikasi' => $request->Nama_Aplikasi,
            'User_Guide' => $request->User_Guide,
            'Technical_Document' => $request->Technical_Document,
            'Category'  => $request->Category,
            'Login'  => $request->Login,
            'Device'  => $request->Device,
            'Description' => $request->Description,
            'Platform' => $request->Platform,
            'DB_Prod' => $request->DB_Prod,
            'DB_Dev' => $request->DB_Dev,
            'Server_Dev' => $request->Server_Dev,
            'Username_Aplikasi' => $request->Username_Aplikasi,
            'Password_Aplikasi' => $request->Password_Aplikasi,
            'Enviroment_Aplikasi' => $request->Enviroment_Aplikasi,
            'Notes_Aplikasi'  => $request->Notes_Aplikasi
        ]);
        return redirect()->route('daftar-aplikasi')
                ->with('success', 'Berhasil mengubah data aplikasi!');

    }

}
