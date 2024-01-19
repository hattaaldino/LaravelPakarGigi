@extends('layout')

@section('title')
    <title>Halaman Admin</title>
@endsection

@section('content')
    <form name=text_form method=POST action='{{ route('admin.add.process') }}' onsubmit='return Blank_TextField_Validator()'>
        @csrf

        <br><br><table class='table table-bordered'>
        <tr><td>Nama Lengkap</td>   <td>  <input autocomplete='off' placeholder='Masukkan nama lengkap...' type=text class='form-control' name='nama_lengkap' size=30></td></tr>
        <tr><td>Username</td>   <td>  <input autocomplete='off' placeholder='Masukkan username...' type=text class='form-control' name='username' size=30></td></tr>
        <tr><td>Password</td>   <td> <input autocomplete='off' placeholder='Masukkan password admin...' type=password class='form-control' name='password' size=30></td></tr>
        <tr><td></td><td>
        <input class='btn btn-success' type=submit name=submit value='Simpan' >
        <input class='btn btn-danger' type=button name=batal value='Batal' onclick="window.location.href='{{ route ('admin') }}';">
        </td></tr>
        </table>
    </form>
@endsection

@section('javascript')
    <script Language="JavaScript">

        function Blank_TextField_Validator()
        {
            if (text_form.username.value == "")
            {
                alert("Username tidak boleh kosong !");
                text_form.username.focus();
                return (false);
            }
            if (text_form.password.value == "")
            {
                alert("Password tidak boleh kosong !");
                text_form.password.focus();
                return (false);
            }
            return (true);
        }
        function Blank_TextField_Validator_Cari()
        {
            if (text_form.keyword.value == "")
            {
                alert("Isi dulu keyword pencarian !");
                text_form.keyword.focus();
                return (false);
            }
            return (true);
        }
    </script>
@endsection