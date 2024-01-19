<li><a {{ url()->current() == route('dashboard') ? 'class="active"' : ''  }} href="{{ route('dashboard') }}"><i class="fa fa-home"></i> <span>Beranda</span></a><li>
  <div class="container"></div>

  @if(session()->has('username') && session()->has('password'))
    <li><a {{ url()->current() == route('admin') ? 'class="active"' : ''  }} href="{{ route('admin') }}"><i class="fa fa-user"></i> <span>Admin</span></a><li>
      <div class="container"></div>	
    <li><a {{ url()->current() == route('penyakit') ? 'class="active"' : ''  }} href="{{ route('penyakit') }}"><i class="fa fa-bug"></i> <span>Penyakit</span></a><li>
      <div class="container"></div>	
    <li><a {{ url()->current() == route('gejala') ? 'class="active"' : ''  }} href="{{ route('gejala') }}"><i class="fa fa-eyedropper"></i> <span>Gejala</span></a><li>
      <div class="container"></div>
    <li><a {{ url()->current() == route('pengetahuan') ? 'class="active"' : ''  }} href="{{ route('pengetahuan') }}""><i class="fa fa-flask"></i> <span>Pengetahuan</span></a><li>
      <div class="container"></div>
    <li><a {{ url()->current() == route('password') ? 'class="active"' : ''  }} href="{{ route('password') }}""><i class="fa fa-edit"></i> <span>Ubah Password</span></a><li>
      <div class="container"></div>
  @else
    <li><a {{ url()->current() == route('diagnosis') ? 'class="active"' : ''  }} href="{{ route('diagnosis') }}""><i class="fa fa-search-plus"></i> <span>Diagnosa</span></a><li>
      <div class="container"></div>
    <li><a {{ url()->current() == route('riwayat') ? 'class="active"' : ''  }} href="{{ route('riwayat') }}""><i class="fa fa-clock-o"></i> <span>Riwayat</span></a><li>
      <div class="container"></div>
  @endif