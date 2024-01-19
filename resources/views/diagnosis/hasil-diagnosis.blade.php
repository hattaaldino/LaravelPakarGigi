@extends('layout')

@section('title')
    <title>Halaman Diagnosa</title>
@endsection

@section('content')
    @php $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700'); @endphp

    <div class='content'>
        <h2 class='text text-primary'>Hasil Diagnosis &nbsp;&nbsp;<button id='print' onClick='window.print();' data-toggle='tooltip' data-placement='right' title='Klik tombol ini untuk mencetak hasil diagnosa'><i class='fa fa-print'></i> Cetak</button> </h2>
                <hr><table class='table table-bordered table-striped diagnosa'> 
            <th width=8%>No</th>
            <th width=10%>Kode</th>
            <th>Gejala yang dialami</th>
            <th width=20%>Pilihan</th>
            </tr>
        
        @php $ig = 0; @endphp
        @foreach ($argejala as $key => $value)
            @php
                $kondisi = $value;
                $ig++;
                $gejala = $key;
            @endphp

            <tr>
                <td>{{ $ig }}</td>
                <td>G{{ str_pad($gejala, 3, '0', STR_PAD_LEFT) }}</td>
                <td><span class="hasil text text-primary">{{ $gejala_list[$gejala] }} </span></td>
                <td><span class="kondisipilih" style="color:{{ $arcolor[$kondisi] }}">{{ $arkondisitext[$kondisi] }}</span>
                </td>
            </tr>
        @endforeach

        @php $np = 0; @endphp
        @foreach ($arpenyakit as $key => $value)
            @php
                $np++;
                $idpkt[$np] = $key;
                $nmpkt[$np] = $arpkt[$key];
                $vlpkt[$np] = $value;
            @endphp
        @endforeach

        @if(empty($idpkt))
            @php
                $idpkt[] = 0;
                $idpkt[] = 0;
            @endphp
        @endif

        @if(empty($nmpkt))
            @php
                $nmpkt[] = 0;
                $nmpkt[] = 0;
            @endphp
        @endif
        
        @if(empty($vlpkt))
            @php
                $vlpkt[] = 0;
                $vlpkt[] = 0;
            @endphp
        @endif
        
        @php $vlpktnew = round($vlpkt[1], 2)*100; @endphp

    </table><div class='well well-small'><img class='card-img-top img-bordered-sm' style='float:right; margin-left:15px;' src='{{ asset('gambar').(isset($argpkt[$idpkt[1]]) ? 'penyakit/' . $argpkt[$idpkt[1]] : 'noimage.png' ) }}' height=200><h3>Hasil Diagnosa</h3>
        <div class='callout callout-default'>Jenis penyakit gigi dan mulut yang diderita adalah <b><h3 class='text text-success'>{{ $nmpkt[1] }}</b> {{ $vlpktnew }} % ({{ $vlpkt[1] }})<br></h3>
        </div></div><div class='box box-info box-solid'><div class='box-header with-border'><h3 class='box-title'>Detail penyakit</h3></div><div class='box-body'><h4>
        {{ $ardpkt[$idpkt[1]] ?? ''}}
        </h4></div></div>
            <div class='box box-warning box-solid'><div class='box-header with-border'><h3 class='box-title'>Saran penyakit</h3></div><div class='box-body'><h4>
        {{ $arspkt[$idpkt[1]] ?? ''}}
        </h4></div></div>
            <div class='box box-danger box-solid'><div class='box-header with-border'><h3 class='box-title'>Kemungkinan lainnya</h3></div><div class='box-body'><h4>
        @for ($ipl = 2; $ipl < count($idpkt); $ipl++)
          <h4><i class='fa fa-caret-square-o-right'></i> {{ $nmpkt[$ipl] }}</b> {{ round($vlpkt[$ipl], 2) }} % ({{ $vlpkt[$ipl] }})<br></h4>
        @endfor
        </div></div>
    </div>
@endsection