@extends('layout')

@section('title')
    <title>Halaman Password</title>
@endsection

@section('content')
    <h2><a href='#'>Akses Ditolak</a></h2>
    <br>
    <strong>Anda harus login untuk dapat mengakses menu ini!</strong><br><br>
    <input type=button value='   Klik Disini   ' onclick=location.href=" {{ route('dashboard') }} "><br><br><br><br>
@endsection