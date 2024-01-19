@extends('layout')

@section('title')
    <title>Halaman Password</title>
@endsection

@section('content')
    @if (isset($status))
        <h2><a href='#'></a>{{ $status }}</h2>
    @else
        <form method='post' action=' {{route('update-password')}} '>
            @csrf

            <table class='table table-bordered'>
                <br><tr><td width=220>Masukkan password lama</td><td><input class='form-control' autocomplete='off' placeholder='Ketik password lama...' type='password' name='oldPass' /></td></tr>
                <br><tr><td>Masukkan password baru</td><td><input class='form-control' autocomplete='off' placeholder='Ketik password baru...' type='password' name='newPass1' /></td></tr>
                <br><tr><td>Masukkan kembali password baru</td><td><input class='form-control' autocomplete='off' placeholder='Ulangi password baru...' type='password' name='newPass2' /></td></tr>
                <tr><td></td><td>
                <input class='btn btn-success' type=submit name=submit title='Simpan' alt='Simpan' value='Simpan' />
                <input type='hidden' name='pass' value='{{ session('password') }}'>
                <input type='hidden' name='nama' value='{{ session('username') }}'></td></tr>
            </table>		
        </form>
    @endif
    
@endsection