@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <span style="color:red"> Employee </span>
</div>

<div class="container">
    <div class="row" style="">
        <div class="col-md-2">
            <div class="db-card" style="border-bottom:10px solid #006EE5">
                <span style="color:#006EE5"><i class="fa fa-users fa-2x" aria-hidden="true"></i>  </span> Total Karyawan
                <h3>
                    {{ $karyawan->where('Role', 'Teknisi')->count() + $karyawan->where('Role', 'Reporter')->count() + $karyawan->where('Role', 'Admin')->count()}}
                </h3>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid green">
                <span style="color:green"><i class="fa fa-gear fa-2x" aria-hidden="true"></i> </span>
                Teknisi
                <h3>
                    {{ $karyawan->where('Role', 'Teknisi')->count() }}
                </h3>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid orange">
                <span style="color:orange"><i class="fa fa-desktop fa-2x" aria-hidden="true"></i>
                </span> Reporter
                <h3>
                    {{ $karyawan->where('Role', 'Reporter')->count() }}</h3>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid #148A9D">
                <span style="color:#148A9D"><i class="fa fa-user fa-2x" aria-hidden="true"></i>  </span> Admin
                <h3>
                    {{ $karyawan->where('Role', 'Admin')->count() }}
                </h3>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="margin-top:25px;border-top: 10px solid green">
                <h5> <font color="green">  Top 5 Most Ticket </font>  this Month (Technician)</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col"></th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">Total Ticket</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">More </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(array_slice($top_tiket_teknisi,0,5) as $tiket)
                        <tr>
                            <td>
                               {{ $tiket->Nama_User }}
                            </td>
                            <td>
                            </td>
                            <td> 
                                {{ $tiket->jumlah_tiket }}
                            </td>
                            <td> 
                                <a href="/dashboard/detail_tiket_teknisi/{{ $tiket->id }}"> <i class="fa fa-search-plus"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;">
            <div class="db-card-detail" style="margin-top:25px;border-top:10px solid #FFC107">
                <h5> <font color="green">  Top 5 Most Task </font> Month (Technician) </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">Total Ticket</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">More </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(array_slice($top_task_teknisi,0,5) as $task)
                        <tr>
                            <td>
                                {{ $task->Nama_User }}
                            </td>
                 
                            <td> 
                                {{ $task->jumlah_task }}
                            </td>
                            <td> 
                                <a href="/dashboard/detail_task_teknisi/{{ $task->id }}"> <i class="fa fa-search-plus"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="height:220px;margin-top:25px;border-top: 10px solid green">
                <h5> <font color="red">  Top 3 Least Ticket </font>  this Month (Technician)</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col"></th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">Total Ticket</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"scope="col">More </th> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(array_slice($least_ticket_teknisi,0,3) as $tiket)
                        <tr>
                            <td>
                               {{ $tiket->Nama_User }}
                            </td>
                            <td>
                            </td>
                            <td> 
                                {{ $tiket->jumlah_tiket }}
                            </td>
                            <td> 
                                <a href="/dashboard/detail_tiket_teknisi/{{ $tiket->id }}">
                                    <i class="fa fa-search-plus"></i> 
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;">
            <div class="db-card-detail" style="height:220px;margin-top:25px;border-top:10px solid #FFC107">
                <h5>  <font color="red">  Top 3 Least Task </font> this Month (Technician) </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white" scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col">Total Task</th>
                          <th style="background-color:#BF2C45;color:white" scope="col">More </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(array_slice($least_task_teknisi,0,3) as $task)
                        <tr>
                            <td>
                                {{ $task->Nama_User }}
                            </td>
                 
                            <td> 
                                {{ $task->jumlah_task }}
                            </td>
                            <td> 
                                <a href="/dashboard/detail_task_teknisi/{{ $task->id }}"> <i class="fa fa-search-plus"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
