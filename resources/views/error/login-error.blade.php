<html>
    <head>
        <title>Login Gagal ! - Certainty Factor</title>
        <link href='{{ asset('css/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css') }}' rel='stylesheet'>
        <link rel='stylesheet' href='{{ asset('animasi/login/ayam.css') }}'>
        <link rel='stylesheet' href='{{ asset('aset/cinta.css') }}'>
        <link href='{{ asset('css/main.css') }}'' rel='stylesheet' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('aset/bootstrap.css') }}'>
    </head>

    <body>
		<div class='errorpage'> <center><div class='danger'><i class='fa fa-exclamation-triangle'></i></div><br><h1>LOGIN GAGAL!</h1>
        Username dan Password anda salah.<br><br><input name='submit' id='submitku' type=submit style='padding: 6px 12px;' value='ULANGI LAGI' onclick=location.href='{{route('login-form')}}'></a><br><p class='message'>Masih bingung, Kembali ke <a href='#'>Halaman Bantuan</a></p></center></div>
        <div class='chick-wrapper-landing show'>
        <div class='wing-back'></div>
        <div class='body'>
            <div class='eye-left'></div>
            <div class='eye-right'></div>
        </div>
        <div class='wing-front'></div>
        </div>
        <div class='chick-wrapper-run run'><img class='egg-lay' src='{{ asset('animasi/login/lay_egg.png') }}'/>
        <div class='legs'>
            <div class='leg-l'></div>
            <div class='leg-r'></div>
        </div>
        <div class='wing-back'> </div>
        <div class='sweat-1'></div>
        <div class='sweat-2'></div>
        <div class='sweat-3'></div>
        <div class='body'>
            <div class='eye-liner'>
            <div class='eye'></div>
            </div>
            <div class='eye-lid'></div>
            <div class='cheek'></div>
        </div>
        <div class='sweat-last'></div>
        <div class='wing-front'></div>
        </div>
        <script  src='{{ asset('animasi/login/index.js') }}'></script>
    </body>

</html>