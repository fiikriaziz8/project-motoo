@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <a href="/dashboard">Dashboard </a>/ <span style="color:red"> Aplikasi </span>
</div>
<div id="detail_teknisi_box">
    <div>
        <h4>
            Tambah Aplikasi
        </h4>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <form method="post" action="{{ Route('create-app') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h5>
                                Nama Aplikasi
                            </h5>
                            <input type="text" name="Nama_Aplikasi" class="form-control" style="" >
                        </div>   
                        <br>
                        <div style="display:flex">
                            <div style="margin-right:20px;">
                                <h5>
                                    Kategori
                                </h5>
                                <input type="text" name="Category" class="form-control" style="" >
                            </div>  
                            <div>
                                <h5>
                                    Jenis Login
                                </h5>
                                <input type="text" name="Login" class="form-control" style="" >
                            </div>    
                        </div>   
                        <br>
                        <div style="display:flex">
                            <div style="margin-right:20px;">
                                <h5>
                                    Device
                                </h5>
                                <input type="text" name="Device" class="form-control" style="" >
                            </div>  
                            <div>
                                <h5>
                                    Platform
                                </h5>
                                <input type="text" name="Platform" class="form-control" style="" >
                            </div>    
                        </div>   
                        <br>
                        <div>
                            <h5>
                                Deskripsi Aplikasi
                            </h5>
                            <div id="kotak-isi-review">
                                <input type="text" name="Description" class="form-control" style="border-radius:3px;height:70px;padding:35px;padding-left:55px;">
                            </div>
                        </div>
                        <br>
                        <div style="display:flex">
                            <div style="margin-right:20px;">
                                <h5>
                                    Link User Guide Document
                                </h5>
                                <input type="text" name="User_Guide" class="form-control" style="" >
                            </div>  
                            <div>
                                <h5>
                                    Link Techinal Document
                                </h5>
                                <input type="text" name="Technical_Document" class="form-control" style="" >
                            </div>    
                        </div>   
                        <br>
                        <div style="display:flex">
                            <div style="margin-right:20px;">
                                <h5>
                                    Username Aplikasi
                                </h5>
                                <input type="text" name="Username_Aplikasi" class="form-control" style="" >
                            </div>  
                            <div>
                                <h5>
                                    Password Aplikasi
                                </h5>
                                <input type="text" name="Password_Aplikasi" class="form-control" style="" >
                            </div>    
                        </div>   
                    </div>
                    <div class="col-md-4">
                        <div style="display:flex">
                            <div style="margin-right:20px;">
                                <h5>
                                    DB Production
                                </h5>
                                <input type="text" name="DB_Prod" class="form-control" style="" >
                            </div>  
                            <div>
                                <h5>
                                    DB Dev
                                </h5>
                                <input type="text" name="DB_Dev" class="form-control" style="" >
                            </div>    
                        </div>   
                        <br>
                        <div style="display:flex">
                            <div style="margin-right:20px;">
                                <h5>
                                    Server Dev
                                </h5>
                                <input type="text" name="Server_Dev" class="form-control" style="" >
                            </div>  
                            <div>
                                <h5>
                                    Enviroment
                                </h5>
                                <input type="text" name="Enviroment_Aplikasi" class="form-control" style="" >
                            </div>    
                        </div>   
                        <br>
                        <div>
                            <h5>
                                Notes Aplikasi
                            </h5>
                            <div id="kotak-isi-review">
                                <input type="text" name="Notes_Aplikasi" class="form-control" style="border-radius:3px;height:70px;padding:35px;padding-left:55px;">
                            </div>
                        </div>
                        <br>
                        <button type="submit" style="float:right" id="sign-in-button" >
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection