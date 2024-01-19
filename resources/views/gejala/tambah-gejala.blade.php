@extends('layout')

@section('title')
    <title>Halaman Gejala</title>
@endsection

@section('content')
    <form name=text_form method=POST action='{{ route('gejala.add.process') }}' onsubmit='return Blank_TextField_Validator()'>
        @csrf

        <br><br><table class='table table-bordered'>
        <tr><td width=120>Nama Gejala</td><td><input type=text autocomplete='off' placeholder='Masukkan gejala baru...' class='form-control' name='nama_gejala' size=30></td></tr>
        <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
        <input class='btn btn-danger' type=button name=batal value='Batal' onclick="window.location.href='{{ route ('gejala') }}';"></td></tr>
        </table>
    </form>
@endsection

@section('javascript')
    <script Language="JavaScript">

        function Blank_TextField_Validator()
        {
            if (text_form.nama_gejala.value == "")
            {
                alert("Nama Gejala tidak boleh kosong !");
                text_form.nama_gejala.focus();
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