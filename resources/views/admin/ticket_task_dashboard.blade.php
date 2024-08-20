@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a>/ <span style="color:red"> Ticket & Task </span>
</div>
<div class="container"> 
    <div class="row">
        <div class="col-md-2">
            <div class="ticket-status-card" style="background-color: #148A9D;height:80px;width:400px;">
                <span style="padding-left:12px;padding-top:10px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-ticket fa-2x" aria-hidden="true"></i>
                </span>
                <h5 style="color:white">
                    Total Ticket Request
                    <br>
                    {{ count($request) }}
                </h5>
                <hr style="margin-top:-1px;margin-bottom:10px;">
                
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:235px;">
            <div class="ticket-status-card" style="height:80px;background-color: #FFC107;;color:black;width:400px;">
                <span style="padding-left:12px;padding-top:10px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                </span>
                <h5>
                    Total Ticket Incident
                    <br>
                    {{ count($incident) }}
                </h5>
                <hr  style="margin-top:-1px;margin-bottom:10px;">
                
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:235px;">
            <div class="ticket-status-card" style="height:80px;background-color: green;;color:white;width:400px;">
                <span style="padding-left:12px;padding-top:10px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-exchange fa-2x" aria-hidden="true"></i>
                </span>
                <h5 style="color:white">
                    Total Task
                    <br>
                    {{ count($task) }}
                </h5>
                <hr  style="margin-top:-1px;margin-bottom:10px;">
            </div>
        </div>
    </div>

    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="border-top: 10px solid #148A9D;padding-top:8px">
                <h5> Total Request: {{ count($tiket_api->where('Request_Type', 'Request')) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white"scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white"scope="col"> </th>
                          <th style="background-color:#BF2C45;color:white"scope="col">Total </th> 
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
        <div class="col-md-2"  style="margin-left:75px;">
            <div class="db-card-detail" style="border-top:10px solid #FFC107;padding-top:8px">
                <h5> Total Incident: {{ count(($tiket_api->where('Request_Type', 'Incident'))) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white"scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white"scope="col"> </th>
                          <th style="background-color:#BF2C45;color:white"scope="col"> Total</th>
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

    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="height:230px;padding-top:8px;margin-top:25px;border-top: 10px solid green">
                <h5> Total Task: {{ count(($task)) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white"scope="col">Name</th>
                          <th style="background-color:#BF2C45;color:white"scope="col"> </th>
                          <th style="background-color:#BF2C45;color:white"scope="col">Total </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>
                                In Progress
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($task->where('task_status', 'In Progress')) }}  
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved & Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($task->where('task_status', 'Closed')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Task Completed In Time
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($task->where('overdue_status', 0)) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Task Late
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ count($task->where('overdue_status', 1)) }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;">
            <div class="db-card-detail" style="height:230px;border-top:10px solid #FFC107;padding-top:8px;margin-top:25px">
                <h5> Top 3 Task Type</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th style="background-color:#BF2C45;color:white"scope="col">Tipe Task</th>
                          <th style="background-color:#BF2C45;color:white"scope="col"></th>
                          <th style="background-color:#BF2C45;color:white"  scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(array_slice($top_task_type,0,3) as $tiket)
                        @if($tiket->task_type == "Null")
                        @continue
                        @endif
                        <tr>
                            <td>
                               {{ $tiket->task_type }}
                            </td>
                            <td>
                            </td>
                            <td> 
                                {{ $tiket->Jumlah }}
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


