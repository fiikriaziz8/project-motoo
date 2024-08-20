@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <span style="color:red"> Dashboard </span>
</div>
<div class="container">
    <div class="row" style="">
        <div class="col-md-2">
            <div class="db-card" style="border-bottom:10px solid #006EE5">
                <span style="color:#006EE5">
                    <i class="fa fa-desktop fa-2x" aria-hidden="true"></i>
                </span>
                @if(auth()->user()->Role == "Admin")
                <a href="/daftar-aplikasi" style="font-weight:bold"> 
                    Apps Support
                </a>
                @else
                App Support
                @endif
                <h3>
                    {{ $application->count() }}
                </h3>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid green">
                <span style="color:green"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i> </span>
                <a href="/ticket-task" style="font-weight:bold">Ticket Complete / All Ticket </a>
                <h3>
                    {{ count($tiket_complete) }} / {{ count($tiket_api) }}
                </h3>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid orange">
                <span style="color:orange"><i class="fa fa-desktop fa-2x" aria-hidden="true"></i> </span> 
                <a href="/ticket-task" style="font-weight:bold">Task Complete / All Task </a>
                <h3>
                    {{ count($task_complete) }} / {{ count($task_api) }}</h3>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid #148A9D">
                <span style="color:#148A9D"><i class="fa fa-star fa-2x" aria-hidden="true"></i>  </span> 
                @if(auth()->user()->Role == "Admin")
                <a href="/daftar-aplikasi" style="font-weight:bold"> 
                    Apps In Review
                </a>
                @else
                App In Review
                @endif
                <h3>
                    {{ count($review_aplikasi) }}
                </h3>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="margin-top:25px;border-top: 10px solid green">
                <h5> Top 5 Most Ticket this Month (Technician)</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white" scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"></th>
                          <th style="background-color:#BF2C45;color:white" scope="col">Total Ticket</th>
                          <th style="background-color:#BF2C45;color:white" scope="col">More </th>
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
                <h5> Top 5 Most Task this Month (Technician) </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white"  scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col">Total Ticket</th>
                          <th style="background-color:#BF2C45;color:white" scope="col">More 
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
    
    <div class="row" style="margin-left:20px;margin-top:20px">
        <div class="col-md-6">
            <div class="db-card-detail" style="border-top: 10px solid #148A9D;padding-top:8px">
                <h5> Total Request: {{ count($tiket_api->where('Request_Type', 'Request')) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white" scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"> </th>
                          <th style="background-color:#BF2C45;color:white" scope="col">Total </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>
                                Aprroved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                               {{ count($tiket_api->where('Aproval_Status', 'Approved')->where('Request_Type', 'Request')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                In Progress
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'In Progress')->where('Request_Type', 'Request')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'Resolved')->where('Request_Type', 'Request')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Canceled
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'Canceled')->where('Request_Type', 'Request')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'Closed')->where('Request_Type', 'Request')) }}    
                            </td>
                        </tr>
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;margin-bottom:60px;">
            <div class="db-card-detail" style="border-top:10px solid #FFC107;padding-top:8px">
                <h5> Total Incident: {{ count(($tiket_api->where('Request_Type', 'Incident'))) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white" scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white" scope="col"> </th>
                          <th style="background-color:#BF2C45;color:white" scope="col">Total
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>
                                Aprroved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                               {{ count($tiket_api->where('Aproval_Status', 'Approved')->where('Request_Type', 'Incident')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                In Progress
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'In Progress')->where('Request_Type', 'Incident')) }}    
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'Resolved')->where('Request_Type', 'Incident')) }}    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Canceled
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'Canceled')->where('Request_Type', 'Incident')) }}    
    
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($tiket_api->where('Request_Status', 'Closed')->where('Request_Type', 'Incident')) }}        
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection