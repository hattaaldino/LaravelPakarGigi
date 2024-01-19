@extends('layout')

@section('title')
    <title>Halaman Pengetahuan</title>
@endsection

@section('content')
    <form name=text_form method=POST action='{{ route('pengetahuan.update.process') }}' onsubmit='return Blank_TextField_Validator()'>
        @csrf       
        
        <input type=hidden name=id value='{{ $kode_pengetahuan }}'>
        <br><br><table class='table table-bordered'>
       
        <tr><td width=120>Penyakit</td><td><select class='form-control' name='kode_penyakit' id='kode_penyakit'>
            @foreach ($penyakit as $penyakit_v)
                <option value='{{ $penyakit_v->kode_penyakit }}' {{ $penyakit_v->kode_penyakit == $kode_penyakit ? 'selected' : '' }}>{{ $penyakit_v->nama_penyakit }}</option>
            @endforeach    
        </select></td></tr>
        <tr><td>Gejala</td><td><select class='form-control' name='kode_gejala' id='kode_gejala'>
            @foreach ($gejala as $gejala_v)
                <option value='{{ $gejala_v->kode_gejala }}' {{ $gejala_v->kode_gejala == $kode_gejala ? 'selected' : '' }}>{{ $gejala_v->nama_gejala }}</option>
            @endforeach    
        </select></td></tr>
        <tr><td>MB</td><td><input autocomplete='off' placeholder='Masukkan MB' type=text class='form-control' name='mb' size=15 value='{{$mb}}'></td></tr>
        <tr><td>MD</td><td><input autocomplete='off' placeholder='Masukkan MD' type=text class='form-control' name='md' size=15 value='{{$md}}''></td></tr>

        <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
        <input class='btn btn-danger' type=button name=batal value='Batal' onclick="window.location.href='{{ route ('pengetahuan') }}';"></td></tr>
        </table>
    </form>
@endsection

@section('javascript')
    <script Language="JavaScript">

        function Blank_TextField_Validator()
        {
            if (text_form.kode_penyakit.value == "")
            {
                alert("Pilih dulu penyakit !");
                text_form.kode_penyakit.focus();
                return (false);
                }
                if (text_form.kode_gejala.value == "")
                {
                alert("Pilih dulu gejala !");
                text_form.kode_gejala.focus();
                return (false);
                }
                if (text_form.mb.value == "")
                {
                alert("Isi dulu MB !");
                text_form.mb.focus();
                return (false);
                }
                if (text_form.md.value == "")
                {
                alert("Isi dulu MD !");
                text_form.md.focus();
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