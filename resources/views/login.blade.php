    @extends('layout')

    @section('title')
        <title>Login Admin</title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="aset/login/css/style.css">
    @endsection

    @section('content')
        <div class="ayaem">
            <div class="hand"></div>
            <div class="hand hand-r"></div>
            <div class="arms">
            <div class="arm"></div>
            <div class="arm arm-r"></div>
            </div>
        </div>
        <div class="formku">
            <div class="info">
                <h4><i class="fa fa-paper-plane"></i> Login Admin</h4><br>
            </div>
            <form class="login-form" action=" {{ route('login') }} " method="post" name="text_form" onsubmit="return Blank_TextField_Validator()">
                @csrf                
                <input type="text" name="username" id="username" placeHolder="&#xf007;  Username" style="font-family:Arial, FontAwesome" />
                <input type="password" name="password" id="password" placeHolder="&#xf023;  Password" style="font-family:Arial, FontAwesome" />
                <input type="submit" name="submit" id="submitku" value="   Login   " />
            </form>
        </div>
    @endsection

    @section('javascript')
        <script type="text/javascript">
            function Blank_TextField_Validator()
            {
            if (text_form.username.value == "")
            {
            alert("Isi dulu username !");
            text_form.username.focus();
            return (false);
            }
            if (text_form.password.value == "")
            {
            alert("Isi dulu password !");
            text_form.password.focus();
            return (false);
            }
            return (true);
            }

            $('input[type="password"]')
            .on('focus', () => {
                $('*').addClass('password');
            })
            .on('focusout', () => {
                $('*').removeClass('password');
            });
        </script>
    @endsection
