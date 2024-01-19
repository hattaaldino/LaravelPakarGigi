@extends('layout')

@section('title')
    <title>Halaman Beranda</title>
@endsection

@section('content')
	<div class='row'>

        <div class='col-lg-3 col-xs-6'>
          <div class='small-box bg-aqua'>
            <div class='inner'>
              <h3> {{ $data['total_gejala'] }} </h3>
              <p>Total Gejala</p>
            </div>
            <div class='icon'>
              <i class='ion ion-thermometer'></i>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3> {{ $data['total_penyakit'] }} </h3>
              <p>Total Penyakit</p>
            </div>
            <div class="icon">
              <i class="ion ion-bug"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> {{ $data['total_pengetahuan'] }} </h3>
              <p>Total Pengetahuan</p>
            </div>
            <div class="icon">
              <i class="ion ion-erlenmeyer-flask"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
             <h3> {{ $data['total_admin'] }} </h3>
              <p>Total Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
    </div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('aset/banner/banner1.png') }}" alt="First slide">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('aset/banner/banner2.png') }}" alt="Second slide">
            <div class="carousel-caption">
            </div>
        </div>
        </div> 
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="fa fa-angle-right"></span>
        </a>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-4 text-center padding wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeIn;">
            <div class="single-service">
            
                    <img src="{{ asset('aset/banner/gb1.png') }}" alt="">
            

                <h4>Jangan lupa periksa kesehatan gigi dan mulut anda ke dokter gigi minimal setiap 6 bulan sekali.</h4>
            </div>
        </div>
        <div class="col-sm-4 text-center padding wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeIn;">
            <div class="single-service">
            
                    <img src="{{ asset('aset/banner/gb2.png') }}" alt="">
                
                <h4>Perbanyak konsumsi asupan bergizi dan kurangi konsumsi makanan dan minuman dengan kandungan gula yang tinggi.</h4>

            </div>
        </div>
        <div class="col-sm-4 text-center padding wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="900ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 900ms; animation-name: fadeIn;">
            <div class="single-service">
                    <img src="{{ asset('aset/banner/gb3.png') }}" alt="">

                <h4>Jangan lupa sikat gigi minimal 2 kali sehari saat pagi setelah sarapan dan malam sebelum tidur.</h4>
                
            </div>
        </div>
    </div>
    <div></div> 
@endsection