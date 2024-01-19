@extends('layout')

@section('title')
    <title>Halaman Diagnosa</title>
@endsection

@section('content')
    <h2 class='text text-primary'>Diagnosa Penyakit Gigi dan Mulut</h2>  <hr>
    <div class='alert alert-success alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
           <h4><i class='icon fa fa-exclamation-triangle'></i>Perhatian !</h4>
           Silahkan memilih gejala sesuai dengan kondisi yang dialami, anda dapat memilih kepastian kondisi dari pasti tidak sampai pasti ya, jika sudah tekan tombol proses (<i class='fa fa-search-plus'></i>)  di bawah untuk melihat hasil.
         </div>
   <form name=text_form method=POST action='{{ route('diagnosis.proses') }}' >
      @csrf
      <table class='table table-bordered table-striped konsultasi'>
        <tbody class='pilihkondisi'>
            <tr><th>No</th><th>Gejala</th><th width='20%'>Pilih Kondisi</th></tr>

                @foreach ($gejala as $gejala_k => $gejala_v)
                    @php $gejala_count = $gejala_k+1; @endphp

                    <tr><td class=opsi>{{ $gejala_count }} </td>
                    <td class=gejala>{{ $gejala_v->nama_gejala }}</td>
                    <td class="opsi">
                        <select name="kondisi[]" id="sl{{ $gejala_count }}" class="opsikondisi"><option data-id="0" value="0">Pilih jika sesuai</option>
                    
                            @foreach ($kondisi as $kondisi_k => $kondisi_v)
                                <option data-id="{{ $kondisi_v->id }}" value="{{ $gejala_v->kode_gejala . '_' . $kondisi_v->id }}">{{ $kondisi_v->kondisi }}</option>
                            @endforeach
                        </select>
                    </td>
                    </tr>
                @endforeach    
            <input class='float' type=submit data-toggle='tooltip' data-placement='top' title='Klik disini untuk melihat hasil diagnosa' name=submit value='&#xf00e;' style='font-family:Arial, FontAwesome'>
        </tbody>
      </table>
    </form>
@endsection

@section('javascript')
    <script type='text/javascript'>
        $(document).ready(function () {
        var arcolor = new Array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');

        $('.opsikondisi').on('change', function () {
            var color = arcolor[$(this).find('option:selected').data('id')];
            $(this).css('background-color', color);
            console.log(color);
        });
        });
  </script>
@endsection