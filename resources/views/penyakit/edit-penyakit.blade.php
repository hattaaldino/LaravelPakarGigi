@extends('layout')

@section('title')
    <title>Halaman Penyakit</title>
@endsection

@section('content')
    <form name=text_form method=POST action='{{ route('penyakit.update.process') }}' onsubmit='return Blank_TextField_Validator()'>
        @csrf
        
        

        <input type=hidden name=id value='{{ $kode_penyakit }}'>
        <br><br><table class='table table-bordered'>
        <tr><td width=120>Nama Penyakit</td><td><input autocomplete='off' type=text class='form-control' name='nama_penyakit' size=30 value='{{ $nama_penyakit }}'></td></tr>
        <tr><td width=120>Detail Penyakit</td><td><textarea rows='4' cols='50' type=text class='form-control' name='det_penyakit'>{{ $det_penyakit }}</textarea></td></tr>
        <tr><td width=120>Saran Penyakit</td><td><textarea rows='4' cols='50' type=text class='form-control' name='srn_penyakit'>{{ $srn_penyakit }}</textarea></td></tr>
        <tr><td width=120>Gambar Post</td><td>Upload Gambar (Ukuran Maks = 1 MB) : <input id='upload' type='file' class='form-control' name='gambar' required /></td></tr>
        <tr><td></td><td><img id='preview' src=' {{ asset('gambar').(!empty($gambar) ? 'penyakit/' . $gambar : 'noimage.png' ) }} ' width=200></td></tr>          
        <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
        <input class='btn btn-danger' type=button name=batal value='Batal' onclick="window.location.href='{{ route ('penyakit') }}';"></td></tr>
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