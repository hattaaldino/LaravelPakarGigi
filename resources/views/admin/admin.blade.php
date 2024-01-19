@extends('layout')

@section('title')
    <title>Halaman Admin</title>
@endsection

@section('content')
    <br>
    <form method=GET action='{{ route('admin') }}' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
        @csrf

        <br><table class='table table-bordered'>
        <tr><td>
            <input class='btn bg-olive margin' type=button name=tambah value='Tambah Admin' onclick="window.location.href='{{ route('admin.add') }}';">
            <input type=text name='keyword' style='margin-left: 10px;' placeholder='Ketik dan tekan cari...' class='form-control' value=' {{ $keyword ?: '' }} ' /> 
            <input class='btn bg-olive margin' type=submit value='   Cari   ' name=Go></td> </tr>
        </table>
    </form>

    @php
        $limit = 10;

        if (!empty($offset)) {
            $offset = 0;
        }
    @endphp

    @if(count($admin) > 0)
        @if(!empty($keyword))
            @php $no = 1; @endphp
            <div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i> Sukses!</h4>
                Admin yang anda cari di temukan.
            </div>            
        @else
            @php $no = 1 + $offset; @endphp
        @endif

        <table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th width='21%'>Aksi</th>
              </tr>
            </thead>
            <tbody>
            
            @php $counter = 1; @endphp

            @foreach ( $admin as $admin_k => $admin_v )
                <tr class='{{ $counter % 2 == 0 ? 'dark' : 'light'}}'>
                    <td align=center>{{ $no }}</td>
                    <td>{{ $admin_v->username }}</td>
                    <td>{{ $admin_v->nama_lengkap }}</td>
                    <td align=center><a type='button' class='btn btn-success margin' href='{{ route('admin.update', ['username' => $admin_v->username]) }}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Ubah </a> &nbsp;
                    <a type='button' class='btn btn-danger margin' href="JavaScript: confirmIt('Anda yakin akan menghapusnya ?','{{ route('admin.delete.process', ['username' => $admin_v->username]) }}','','','','u','n','Self','Self')" onMouseOver="self.status=''; return true" onMouseOut="self.status=''; return true"><i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</a>
                    </td>
                </tr>

                @php
                    $no++;
                    $counter++;
                @endphp

            @endforeach

            </tbody>
        </table>

        @if(empty($keyword))
            <div class=paging>
            @if($offset!=0)
                <span class=prevnext> <a href='{{ url("/admin?offset=".$offset-10) }}'>Back</a></span>
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
                    <a href='{{ url("/admin?offset=$newoffset") }}'>{{ $i }}</a>
                @else
                    <span class=current>{{ $i }}</span>
                @endif
                
            @endfor
            
            
            {{-- cek halaman akhir --}}
            @if(!(($offset/$limit)+1==$halaman) && $halaman !=1)        
                
                @php $newoffset = $offset + $limit; @endphp
                
                <span class=prevnext><a href='{{ url("/admin?offset=$newoffset") }}'>Next</a>
            @else 
                {{-- cetak halaman tanpa link --}}
                <span class=disabled>Next</span>                
            @endif
            </div>
        @endif
    @else
        @if(!empty($keyword))
            <div class='alert alert-danger alert-dismissible'>
                <h4><i class='icon fa fa-ban'></i> Gagal!</h4>
                Maaf, Admin yang anda cari tidak ditemukan , silahkan inputkan dengan benar dan cari kembali.
            </div>
        @else
            <br><b>Data Kosong !</b>
        @endif
    @endif
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
