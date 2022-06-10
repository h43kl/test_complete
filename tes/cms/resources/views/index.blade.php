<html lang="en">

<head>
    <title>Login CMS </title>
    @include('partials.head')
</head>

<body class="h-100">
    <div class="authincation h-100 bg-login-9">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="#"
                                                alt="" class="mb-2" style="max-width:222px;"></a>
                                        <p class="text-center" style="font-size:12px;">Please enter your email and
                                            password to login</p>
                                    </div>

                                    <form action="#" method="POST" id="loginForm" class="mt-5">
                                        <div class="form-group">
                                            <label class="mb-1 text-bluelighty"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-bluelighty"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>

                                        <div class="text-center mt-5">
                                            <button type="submit"
                                                class="btn bg-bluelighty text-white btn-block btn-fauth mx-auto d-block">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('partials.foot')

</body>

</html>

<script>
         
        $("#loginForm").submit(function (event) {
            
            event.preventDefault();
            
            var formData = new FormData(this);
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });


                    $.ajax({
                        type: "POST",
                        url: "{{ route('login.post') }}",
                        cache: false,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        

                        success: function (data) {
                            console.log('data',data)

                            if (data.response == 200) {
                                swal(  data.message,
                                    "   ",
                                    "success");

                                setTimeout(function () {
                                    window.location.href = "{{ route('dashboard')}}";
                                    }, 3000);

                            } else {
                                swal(  data.message,
                                    "   ",
                                    "error");

                            }

                           
                        },
                        error: function (data, jqXHR, textStatus, errorThrown) {
                            console.log('data',data);
                            console.log(textStatus);
                        },
                    });
   
           
        });
</script>