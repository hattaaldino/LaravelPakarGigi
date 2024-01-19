@extends('layout')

@section('title')
    <title>Halaman Pengetahuan</title>
@endsection

@section('content')
    <div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
        <h4><i class='icon fa fa-exclamation-triangle'></i>Petunjuk Pengisian Pakar !</h4>
        Silahkan pilih gejala yang sesuai dengan penyakit yang ada, dan berikan <b>nilai kepastian (MB & MB)</b> dengan cakupan sebagai berikut:<br><br>
        <b>1.0</b> (Pasti Ya)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.8</b> (Hampir Pasti)&nbsp;&nbsp;|<br>
        <b>0.6</b> (Kemungkinan Besar)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.4</b> (Mungkin)&nbsp;&nbsp;|<br>
        <b>0.2</b> (Hampir Mungkin)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.0</b> (Tidak Tahu atau Tidak Yakin)&nbsp;&nbsp;|<br><br>
        <b>CF(Pakar) = MB – MD</b><br>
        MB : Ukuran kenaikan kepercayaan (measure of increased belief) MD : Ukuran kenaikan ketidakpercayaan (measure of increased disbelief) <br> <br>
        <b>Contoh:</b><br>
        Jika kepercayaan <b>(MB)</b> anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.8 (Hampir Pasti)</b><br>
        Dan ketidakpercayaan <b>(MD)</b> anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.2 (Hampir Mungkin)</b><br><br>
        <b>Maka:</b> CF(Pakar) = MB – MD (0.8 - 0.2) = <b>0.6</b> <br>
        Dimana nilai kepastian anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.6 (Kemungkinan Besar)</b>
    </div>
    <form name=text_form method=POST action='{{ route('pengetahuan.add.process') }}' onsubmit='return Blank_TextField_Validator()'>
        @csrf
        <br><br><table class='table table-bordered'>
        <tr><td width=120>Penyakit</td><td><select class='form-control' name='kode_penyakit'  id='kode_penyakit'><option value=''>- Pilih Penyakit -</option>
        
            @foreach ($penyakit as $penyakit_v)
                <option value='{{ $penyakit_v->kode_penyakit }}'>{{ $penyakit_v->nama_penyakit }}</option>
            @endforeach

        </select>
        </td></tr>
        <tr><td>Gejala</td><td><select class='form-control' name='kode_gejala' id='kode_gejala'><option value=''>- Pilih Gejala -</option>

            @foreach ($gejala as $gejala_v)
                <option value='{{ $gejala_v->kode_gejala }}'>{{ $gejala_v->nama_gejala }}</option>
            @endforeach

        </select></td></tr>
        <tr><td>MB</td><td><input autocomplete='off' placeholder='Masukkan MB' type=text class='form-control' name='mb' size=15 ></td></tr>
        <tr><td>MD</td><td><input autocomplete='off' placeholder='Masukkan MD' type=text class='form-control' name='md' size=15 ></td></tr>
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