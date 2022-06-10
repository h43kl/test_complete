
@extends('dashboard')
@section('content')



        <div class="container-fluid">




                <div class="page-titles">
                    <h4>User</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
                    </ol>
                    <button type="button" class="btn btn-primary mb-2 btn-add-cms" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="flaticon-381-plus"></i> Add
                    </button>
                </div>


                @include('element.user/user_list')

        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">User Image</h4>
                </div>
                <div class="modal-body">
                    <img src="" id="imageID">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
    
                    <form action="#" method="post"  id="form">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for=""> Name</label>
                                        <input type="text"  onblur="nameFunction(this)" class="form-control"  name="name" id="name" required>
                                        <input type="hidden" name="id" id="data_id">
        
                                        <br><br>
                                        <label for=""> Email</label>
                                        <input type="email" class="form-control"  name="email" id="email" onblur="mailFunction()" required>
        
                                    </div>
                                    <div class="col-md-6">
                                      
                                        <label>Password</label>
                                        <div class="input-group" id="show_hide_password">
                                          <input class="form-control" type="password" name="password" id="password">
                                          <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            <progress max="100" value="0" id="meter"></progress>
                                            Password Strenght
                                            <div class="textbox text-center">  </div>
                                          </div>
                                        </div>
                                        <br><br>
                                        <label for=""> Image</label>
                                        <br>
                                        <img  src="https://via.placeholder.com/200/0000FF/808080" id="image_user" src="#" alt="your image" style="width: 145px;"/>
                                        <img  src="" id="imageIDs" src="#"  alt="your image" style="width: 145px;display:none"/>
                                        <input type="file" name="images" onchange="image_first(this);" id="image">
                                        <span class="required" style="color:red;">*Ukuran image 200px X 200px & tidak lebih dari 2MB</span>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
    
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="confirm">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <script>

        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });

        var code = document.getElementById("password");

        var strengthbar = document.getElementById("meter");
        var display = document.getElementsByClassName("textbox")[0];

        code.addEventListener("keyup", function() {
            checkpassword(code.value);
        });

        function mailFunction() {
            
            var email = document.getElementById('email');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          
            if(!filter.test(email.value)) {
                
                swal( "Format Email salah ","   ","error");
            } else {

            }
        }

        function nameFunction(params) {
            
            
            if( params.value.length < 3 ) {
                
                swal( "Minimal character 3 ","   ","error");
            } else {

            }
        }

        function image_first(input) {
            
            const ty = input.files[0].type;
            const uk = input.files[0].size;
          
            if (ty == 'image/jpeg' || ty == 'image/png' ) {
                if (uk < 10000000) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {

                            $('#image_user').attr('src', e.target.result);
                            if (ty == 'application/pdf') {
                                $("#imageID").hide();
                            }

                            var image = new Image();

                            //Set the Base64 string return from FileReader as source.
                            image.src = e.target.result;
                            image.onload = function () {
                            var height = this.height;
                            var width = this.width;
                            console.log('heigth',height);
                            console.log('width',width)
                            if (height > 200 || width > 200) {
                                swal("Ukuran image anda lebih dari 200px x 200px", "", "error");
                         
                            return false;
                            }
                          
                            return true;
                        };
                        }
 


                        reader.addEventListener('load', () => {
                            localStorage.setItem("image_id", reader.result)
                        });
                        reader.readAsDataURL(input.files[0]);
                    }
                } else {
                    swal("Ukuran dokumen anda lebih dari 10mb", "maksimal ukuran 10mb", "error");
                }
            } else {
                swal("Tipe dokumen anda bukan PDF ", "Mohon sesuaikan", "error");
            }
        }

        function checkpassword(password) {
            var strength = 0;
            if (password.match(/[a-z]+/)) {
                strength += 1;
            }
            if (password.match(/[A-Z]+/)) {
                strength += 1;
            }
            if (password.match(/[0-9]+/)) {
                strength += 1;
            }
            if (password.match(/[$@#&!]+/)) {
                strength += 1;

            }

            if (password.length < 6) {
                display.innerHTML = "minimum number of characters is 6";
            }

            if (password.length > 12) {
                display.innerHTML = "maximum number of characters is 12";
            }

            switch (strength) {
                case 0:
                strengthbar.value = 0;
                break;

                case 1:
                strengthbar.value = 25;
                break;

                case 2:
                strengthbar.value = 50;
                break;

                case 3:
                strengthbar.value = 75;
                break;

                case 4:
                strengthbar.value = 100;
                break;
            }
        }

        $("#form").submit(function (event) {

            event.preventDefault();

            var formData = new FormData(this);
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    $.ajax({
                        type: "POST",
                        url: "{{ route('user.store') }}",
                        cache: false,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        

                        success: function (data) {
                          

                            if (data.status == 200) {
                              
                                swal(  data.data,
                                    "   ",
                                    "success");
                                setTimeout(function () {
                                    location.reload();
                                    }, 3000);
                            } else {
                           
                                swal(  data.data.errors[0],
                                    "   ",
                                    "error");
                            }



                        
                        },
                        error: function (data, jqXHR, textStatus, errorThrown) {
   
                            // swal(  "Harap cek semua data",
                            //         "   ",
                            //         "error");
                        },
                    });


        });

    </script>

@endsection
