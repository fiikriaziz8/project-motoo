<?php

namespace App\Http\Controllers;

use App\Models\Review_App;
use App\Http\Requests\StoreReview_AppRequest;
use App\Http\Requests\UpdateReview_AppRequest;
use Illuminate\Http\Request;

class ReviewAppController extends Controller
{
    public function index()
    {
        //  
    }

    public function create(Request $request){
        if(auth()->user()->Role == "Konsumen"){
            $request->validate([
                'user_id'=>'required',
                'id_aplikasi'=> 'required',
                'isiReview' => 'required',
                'rating' => 'required'            
            ]);
    
            Review_App::create([
                'user_id'=>$request->user_id,
                'application_id'=> $request->id_aplikasi,
                'Deskripsi' => $request->isiReview,
                'Penilaian' => (int)$request->rating
            ]);
    
            return redirect()->back();
        }else{
            return redirect()->back()->with('error', 'Anda bukan Konsumen!');
        }
    }

    public function edit(Request $request)
    {
        Review_App::where('user_id', $request->user_id)
        ->where('application_id', $request->id_aplikasi)->update([
            'Deskripsi' => $request->isiReview,
            'Penilaian' => (int)$request->rating
        ]);
        return redirect()->back();
    }

    public function destroy(Review_App $review_App)
    {
        //
    }
}
