@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <a href="/dashboard">Dashboard </a>/ <span style="color:red">{{ $request }} </span>
</div>

<div id="detail_teknisi_box">
    <div>
        <h4>
            Daftar Tiket oleh {{ $request }}
        </h4>
        <hr>
        <div class="table-responsive" style="border-radius:5px;">
            <table class="table table-striped table-sm">
              <thead style="color:white;vertical-align:middle;background-color:#BF2C45">
                <tr>
                  <th> No </th>
                  <th scope="col">Task ID</th>
                  <th scope="col">Ticket ID</th>
                  <th scope="col">Task Type</th>
                  <th scope="col">Task Status</th>
                  <th scope="col">Scheduled Start Time</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">Scheduled End Time</th>
                  <th scope="col">Overdue</th>
                </tr>
              </thead>
              <?php 
                $no = 1
              ?>
              <tbody>
                @foreach($task as $task)
                <tr>
                    <td style="background-color:gray">
                        {{ $no }}.
                    </td>
                    <td>
                        {{ $task->id }}
                    </td>
                    <td>
                        {{ $task->ticket }}
                    </td>
                    <td>
                        {{ $task->task_type }}
                    </td>
                    <td>
                        {{ $task->task_status }}
                    </td>
                    <td>
                        {{ $task->scheduled_start_time}}
                    </td>
                    <td>
                        {{ $task->actual_start_time }}
                    </td>
                    <td>
                        {{ $task->scheduled_end_time }}
                    </td>
                    <td>
                        {{ $task->overdue_status }}
                    </td>
                </tr>
                <?php 
                $no = $no + 1
              ?>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection