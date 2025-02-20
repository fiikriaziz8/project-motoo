@extends('layouts.main')
@section('container')
<div id="box-utama">
    <div class="container">
        <div class="row">
            <div class="col-md-4"> 
                <img src="{{ asset('img/app-logo/product01.png') }}" width="350px;">
            </div>
            <div class="col-md-8">
                <div id="detail-box">
                    <h4>{{ $app->Nama_Aplikasi }}</h4>
                    <p>
                        {{ $app->Description }}
                    </p>
                    <hr style="margin-bottom:17px;">
                    <div class="row">
                        <div class="col-md-2">
                            <div id="user-guide">
                                <a href="#" target="_blank">
                                    <h5>
                                        User Guide 
                                    </h5>
                                </a>
                            </div>
                        </div>
                        @auth
                        @if(auth()->user()->Role == "Admin" || auth()->user()->Role == "Teknisi")
                        <div class="col-md-3">
                            <div id="tec-doc">
                                <a href="/{{ $app->Technical_Document }}" target="_blank">
                                    <h5 style="color:white">
                                        Technical Document
                                    </h5>
                                </a>
                            </div>
                        </div>
                        @endif  
                        @endauth
                    </div>
                </div>
                <hr>
                <div style="font-weight:bold">
                    Business User : Maintenance
                    <br><br>
                    Login User : {{ $app->Login }}
                    <br><br>
                    Category : {{ $app->Category }}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div id="open-app">
                                    OPEN APPLICATION
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Reviews</a></li>
                        @auth
                        @if(auth()->user()->Role=='Teknisi' || auth()->user()->Role=="Admin")
                        <li><a data-toggle="tab" href="#tab2">Teknisi</a></li>
                        <li><a data-toggle="tab" href="#tab3">Informasi Teknis</a></li>
                        @endif
                        @if(auth()->user()->Role=='Reporter')
                        <li><a data-toggle="tab" href="#tab2">Teknisi</a></li>
                        @endif
                        @endauth
                        
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab3  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-2" style="width:240px;">
                                    <div id="review1">
                                        <center> 
                                            REVIEW<br>
                                        @for ($i = 0; $i<=$review_all->where('application_id', $app->id)->avg('Penilaian')-1;$i++)
                                        <i class="fa fa-star fa-2x"></i>
                                        @endfor
                                        @if($review->where('application_id', $app->id)->avg('Penilaian') != 5)
                                        @for($k=$i; $k<5;$k++)
                                            <i class="fa fa-star-o empty fa-2x"></i>
                                        @endfor
                                        @endif
                                        <br>
                                        <span style="text-align:right;color:#BF2C45">
                                            @if($review_all->where('application_id', $app->id)->avg('Penilaian')== null)
                                            No Review Yet
                                            @else
                                            {{ $review_all->where('application_id', $app->id)->avg('Penilaian')}}
                                            @endif
                                        </span>  
                                        <hr>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        /{{ $review_all->where('application_id', $app->id)->where('Penilaian', 5)->where('application_id', $app->id)->count() }}
                                        <br>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        /{{ $review_all->where('application_id', $app->id)->where('Penilaian', 4)->count() }}
                                        <br>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        /{{ $review_all->where('application_id', $app->id)->where('Penilaian', 3)->count() }}
                                        <br>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        /{{ $review_all->where('application_id', $app->id)->where('Penilaian', 2)->count() }}
                                        <br>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        <i class="fa fa-star-o empty"></i>
                                        /{{ $review_all->where('application_id', $app->id)-> where('Penilaian', 1)->count() }}
                                    </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="review2"> 
                                        @foreach($review as $rev)
                                        <div> 
                                            <span style="float:right;font-size:10px;color:black">
                                                @if ($rev->created_at != null)
                                                {{ $rev->created_at->toDateString() }}
                                                @else
                                                No Date
                                                @endif
                                            </span>
                                            <h5> {{ $rev->user->Nama_User }} </h5>
                                            <p style="color:#BF2C45">
                                                @for ($i = 0; $i<$rev->Penilaian;$i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </p>
                                            <p>
                                                {{ $rev->Deskripsi }}
                                            </p>
                                            <hr>
                                        </div>
                                        @endforeach
                                        <div style="float:right;">
                                            {{ $review->links() }}
                                        </div>
                                    </div>
                                </div>
                                @auth
                                @if($review->contains(function($col){return $col['user_id'] == auth()->user()->id;}))
                                <div class="col-md-4" style="margin-left:-50px;">
                                    <div id="review3"> 
                                        <h5> 
                                            <center>
                                                Edit Your Review 
                                            </center>  
                                        </h5>
                                        <form method="post" action={{ Route('editReviewApp') }} class="review-form">
                                            @csrf
                                            @auth
                                            @if(auth()->user()->Role=='Konsumen')
                                            <div class="input-rating" style="text-align:center;">
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <div id="kotak-isi-review">
                                                <input name="id_aplikasi" value="{{ $app->id }}" style="display:none">
                                                <input name="user_id" value="{{ auth()->user()->id }}" style="display:none">
                                                <input type="text" name="isiReview" class="form-control" style="border-radius:3px;height:180px;padding:35px;padding-left:55px;" placeholder="Edit your review here...">
                                            </div>
                                            <div>
                                                <button type="submit" class="button-submit">
                                                    SUBMIT EDIT
                                                </button>
                                            </div>
                                            @else
                                            <div class="input-rating" style="text-align:center;">
                                                <div class="stars">
                                                    <input disabled id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input disabled id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input disabled id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input disabled id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input disabled id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <div id="kotak-isi-review">
                                                <input disabled type="text" disabled name="isiReview" class="form-control" style="border-radius:3px;height:180px;padding:35px;padding-left:55px;" placeholder="You're not allowed to review">
                                            </div>
                                            <div>
                                                <button type="submit" class="button-submit" disabled>
                                                    SUBMIT
                                                </button>
                                            </div>
                                            @endif
                                            @endauth
                                        <form> 
                                    </div>
                                </div>
                                @else
                                <div class="col-md-4" style="margin-left:-50px;">
                                    <div id="review3"> 
                                        <h5> 
                                            <center>
                                                Write A Review 
                                            </center>  
                                        </h5>
                                        <form method="post" action={{ Route('addReviewApp') }} class="review-form">
                                            @csrf
                                            @auth
                                            @if(auth()->user()->Role=='Konsumen')
                                            <div class="input-rating" style="text-align:center;">
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <div id="kotak-isi-review">
                                                <input name="id_aplikasi" value="{{ $app->id }}" style="display:none">
                                                <input name="user_id" value="{{ auth()->user()->id }}" style="display:none">
                                                <input type="text" name="isiReview" class="form-control" style="border-radius:3px;height:180px;padding:35px;padding-left:55px;" placeholder="Enter your review here...">
                                            </div>
                                            <div>
                                                <button type="submit" class="button-submit">
                                                    SUBMIT
                                                </button>
                                            </div>
                                            @else
                                            <div class="input-rating" style="text-align:center;">
                                                <div class="stars">
                                                    <input disabled id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input disabled id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input disabled id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input disabled id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input disabled id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <div id="kotak-isi-review">
                                                <input disabled type="text" disabled name="isiReview" class="form-control" style="border-radius:3px;height:180px;padding:35px;padding-left:55px;" placeholder="You're not allowed to review">
                                            </div>
                                            <div>
                                                <button type="submit" class="button-submit" disabled>
                                                    SUBMIT
                                                </button>
                                            </div>
                                            @endif
                                            @endauth
                                        <form> 
                                    </div>
                                </div>
                                @endif
                                @endauth
                                @guest
                                <div class="col-md-4" style="margin-left:-50px;">
                                    <div id="review3"> 
                                        <h5> 
                                            <center>
                                                Write A Review 
                                            </center>  
                                        </h5>
                                        <form method="post" action={{ Route('addReviewApp') }} class="review-form">
                                            @csrf
                                            <div class="input-rating" style="text-align:center;">
                                                <div class="stars">
                                                    <input disabled id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input disabled id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input disabled id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input disabled id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input disabled id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <div id="kotak-isi-review">
                                                <input type="text" disabled name="isiReview" class="form-control" style="border-radius:3px;height:180px;padding:35px;padding-left:55px;" placeholder="Login to write a review..">
                                            </div>
                                            <div>
                                                <button type="submit" class="button-submit" disabled>
                                                    SUBMIT
                                                </button>
                                            </div>
                                        <form> 
                                    </div>
                                </div>
                                @endguest
                            </div>
                        </div>
                        <!-- /tab1  -->
                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                @foreach($app->users as $teknisi)
                                <div class="col-md-2 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('img/teknisi/maudy.jpg') }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Teknisi</p>
                                            <h3 class="product-name"><a href="#">{{ $teknisi->username }}</a></h3>
                                            @if(auth()->user()->Role=="Reporter" || auth()->user()->Role=="Teknisi" || auth()->user()->Role=="Admin")
                                            <i class="fa fa-phone"></i> <b class="product-category">{{ $teknisi->Nomor_HP }}</b>
                                            @endif
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /tab2  -->

                        
                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bs-example" data-example-id="striped-table"> 
                                        <table class="table table-striped"> 
                                            <tbody> 
                                                <tr> 
                                                    <th scope="row"><b>Platform Teknologi</b></th> 
                                                    <td>{{ $app->Platform }}</td> 
                                                </tr> 
                                                <tr> 
                                                    <th scope="row">DB Prod</th> 
                                                    <td>{{ $app->DB_Prod }}</td>
                                                </tr>
                                                <tr> 
                                                    <th scope="row">DB Dev</th> 
                                                    <td>{{ $app->DB_Dev }}</td>
                                                </tr>
                                                <tr> 
                                                    <th scope="row">Server Dev</th> 
                                                    <td>{{ $app->Server_Dev }}</td>
                                                </tr>
                                                <tr> 
                                                    <th scope="row">User Login</th> 
                                                    <td>{{ $app->Login }}</td>
                                                </tr>
                                                <tr> 
                                                    <th scope="row">Enviroment</th> 
                                                    <td>{{ $app->Enviroment_Aplikasi }}</td>
                                                </tr>
                                                <tr> 
                                                    <th scope="row">Notes</th> 
                                                    <td>{{ $app->Notes_Aplikasi }}</td>
                                                </tr>
                                            </tbody> 
                                        </table> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->


            <br><br>
            <div class="row" style="margin-left:30px;margin-right:30px;">
                <h3>
                    <center>RELATED PRODUCTS</center>
                </h3>

                @foreach($related_app as $rel_app)
                <div class="col-lg-3 col-xs-6">
                    <div class="product">
                        <div class="product-body">
                            <img src="{{ asset('img/app-logo/product01.png') }}" width="225px;">
                            <p class="product-category">{{ $rel_app->Category }}</p>
                            <h3 class="product-name"><a href="/detail/{{ $app->id }}">{{ $rel_app->Nama_Aplikasi }}</a></h3>
                            @if ($review_all->where('application_id', $rel_app->id) != "[]")
                            <p style="color:#BF2C45;">
                                <div class="product-rating">
                                    @for ($i = 0; $i<=$review_all->where('application_id', $app->id)->avg('Penilaian')-1;$i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @if($review_all->where('application_id', $app->id)->avg('Penilaian') != 5)
                                    @for($k=$i; $k<5;$k++)
                                        <i class="fa fa-star-o empty"></i>
                                    @endfor
                                    @endif
                                </div>
                            </p>
                            @else
                            <div class="product-rating">
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            @endif
                            <div class="product-btns">
                                @guest
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Login to add this to your favorites!</span></button>
                                @endguest
                                <button class="add-to-compare"><i class="fa fa-file"></i><span class="tooltipp">document</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        <div style="float:right;margin-right:30px;">
            {{ $related_app->links() }}
        </div>
    </div>
</div>
</div>
@endsection