@extends('layout')

@section('title')
    <title>Halaman Penyakit</title>
@endsection

@section('content')
    <form name=text_form method=POST action='{{ route('penyakit.add.process') }}' onsubmit='return Blank_TextField_Validator()'>
        @csrf

        <br><br><table class='table table-bordered'>
            <tr><td width=120>Nama Penyakit</td><td><input autocomplete='off' type=text placeholder='Masukkan penyakit baru...' class='form-control' name='nama_penyakit' size=30></td></tr>
            <tr><td width=120>Detail Penyakit</td><td> <textarea rows='4' cols='50' class='form-control' name='det_penyakit'type=text placeholder='Masukkan detail penyakit baru...'></textarea></td></tr>
            <tr><td width=120>Saran Penyakit</td><td><textarea rows='4' cols='50' class='form-control' name='srn_penyakit'type=text placeholder='Masukkan saran penyakit baru...'></textarea></td></tr>
            <tr><td width=120>Gambar Post</td><td>Upload Gambar (Ukuran Maks = 1 MB) : <input type='file' class='form-control' name='gambar' required /></td></tr>		  
            <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
            <input class='btn btn-danger' type=button name=batal value='Batal' onclick="window.location.href='{{ route ('penyakit') }}';"></td></tr>
            </table>
        </table>
    </form>
@endsection

@section('javascript')
    <script Language="JavaScript">

        function Blank_TextField_Validator()
            {
            if (text_form.nama_penyakit.value == "")
            {
                alert("Nama Penyakit tidak boleh kosong !");
                text_form.nama_penyakit.focus();
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

        function readURL(input) {

            if (input.files &&
                    input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#upload").change(function () {
            readURL(this);
        });
    </script>
@endsection