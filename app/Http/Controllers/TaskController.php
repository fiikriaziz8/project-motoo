<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{

    public function detailTeknisi($id){
        $task = Task::where('user_id', $id)->get();
        $nama_teknisi = $task[0]->user->Nama_User;
        return view('admin.detail_task_teknisi',[
            'task' => $task,
            'request' => $nama_teknisi
        ]);

    }

}
