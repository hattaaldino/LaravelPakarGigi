@extends('layout')

@section('title')
    <title>Halaman Riwayat</title>
@endsection

@section('content')
    <h2 class='text text-primary'>Riwayat Konsultasi</h2>
    <hr>

    @php
        $limit = 15;

        if (!empty($offset)) {
            $offset = 0;
        }
    @endphp

    @if(count($hasil) > 0)
        <div class='row'><div class='col-md-8'><table class='table table-bordered table-striped riwayat' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Penyakit</th>
                <th nowrap>Nilai CF</th>
                <th width='21%' class='text-center'>Aksi</th>
            </tr>
            </thead>
            <tbody>
        
            @php
                $counter = 1;
                $no = 1 + $offset;
            @endphp

            @foreach ( $hasil as $hasil_k => $hasil_v )
                @if($hasil_v->hasil_id > 0)
                    <tr class='{{ $counter % 2 == 0 ? 'dark' : 'light'}}'>
                        <td align=center>{{ $no }}</td>
                        <td>{{ $hasil_v->tanggal }}</td>
                        <td>{{ $arpkt[$hasil_v->hasil_id] }}</td>
                        <td>{{ $hasil_v->hasil_nilai }}</td>
                        <td align=center>
                            <a type='button' class='btn btn-default btn-xs' target='_blank' href='{{ route('riwayat.detail', ['id_hasil' => $hasil_v->hasil_id]) }}'><i class='fa fa-eye' aria-hidden='true'></i> Detail </a> &nbsp;
                        </td>
                    </tr>

                    @php
                        $no++;
                        $counter++;
                    @endphp
                @endif

            @endforeach

            </tbody></table>
        </div>

        <div class="col-md-4">
            <div class="box box-success box-solid">
            <div class="box-header with-border">
                <i class="fa fa-pie-chart"></i>

                <h3 class="box-title">Grafik</h3>

                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div id="donut-chart" class="chart" style="width:100%;height:250px;"></div>
                <hr>
                <div id="legend-container"></div>
            </div>
            <!-- /.box-body-->
            </div>
        </div>
        
        <div class=paging>
           
            @if($offset!=0) 
                <span class=prevnext> <a href='{{ url("/riwayat?offset=".$offset-10) }}'>Back</a></span>
            @else
                <span class=disabled>Back</span>
            @endif
            
            @php
            //hitung jumlah halaman
            $halaman = intval($baris/$limit);//Pembulatan
        
            if ($baris%$limit){
                $halaman++;
            }
            @endphp

            @for ($i=1; $i<=$halaman; $i++)
                @php $newoffset = $limit * ($i-1); @endphp

                @if($offset != $newoffset)
                    <a href='{{ url("/riwayat?offset=$newoffset") }}'>{{ $i }}</a>
                @else
                    <span class=current>{{ $i }}</span>
                @endif
                
            @endfor
            
            
            
            @if(!(($offset/$limit)+1==$halaman) && $halaman !=1)
        
                
                @php $newoffset = $offset + $limit; @endphp
                
                <span class=prevnext><a href='{{ url("/admin?offset=$newoffset") }}'>Next</a>
            @else 
                <span class=disabled>Next</span>
            @endif
            </div>
    @else
        <br><b>Data Kosong !</b>
    @endif
@endsection

@section('javascript')
    <script>
        $(function () {

        var donutData = {{ json_encode($arr) }}

        function legendFormatter(label, series) {
            return '<div class="text text-primary margin4">' + label + ' ' + Math.round(series.percent) + '%';
        };

        $.plot('#donut-chart', donutData, {
            series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.3,
                label: {
                show: true,
                radius: 2/3,
                formatter: function (label, series) {
                    return '<div class="badge bg-navy color-pallete">' + Math.round(series.percent) + '%</div>';
                },
                threshold: 0.01
                }

            }
            },
            legend: {
            show: true,
            container: $("#legend-container"),
            labelFormatter: legendFormatter,
            }
        })
        /*
        * END DONUT CHART
        */

        })

        /*
        * Custom Label formatter
        * ----------------------
        */
        function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + '<br>'
                + Math.round(series.percent) + '%</div>'
        }
    </script>
@endsection