		<div class="nav-header">
		    <a href="{{ url('dashboard') }}" class="brand-logo">
		        {{-- <img class="logo-abbr" src="{{asset('images/logo.png')}}" alt=""> --}}
		        {{-- <img class="logo-compact" src="{{asset('images/logo-text.png')}}" alt=""> --}}
		        {{-- <img class="brand-title" src="{{asset('images/logo-text.png')}}" alt=""> --}}
		    </a>

		    <div class="nav-control">
		        <div class="hamburger">
		            <span class="line"></span><span class="line"></span><span class="line"></span>
		        </div>
		    </div>
		</div>


		<div class="header">
		    <div class="header-content">
		        <nav class="navbar navbar-expand">
		            <div class="collapse navbar-collapse justify-content-between">
		                <div class="header-left">
		                    <div class="dashboard_bar">
		                    </div>
		                </div>
		                <ul class="navbar-nav header-right">


		                    <li class="nav-item dropdown notification_dropdown">
		                        <a href="#" class="dropdown-item ai-icon" onclick="logout()">
		                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
		                                height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
		                                stroke-linecap="round" stroke-linejoin="round">
		                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
		                                <polyline points="16 17 21 12 16 7"></polyline>
		                                <line x1="21" y1="12" x2="9" y2="12"></line>
		                            </svg>
		                            <span class="ml-2">Logout </span>
		                        </a>
		                    </li>

		                </ul>
		            </div>
		        </nav>
		    </div>
		</div>

		<script>

			function logout() {

				var formData = { 'logout' : 'logout'};

					$.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    $.ajax({
                        type: "POST",
                        url: "{{ route('logout') }}",
                        cache: false,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'JSON',
                        

                        success: function (data) {

                                swal(  data.message,
                                    "   ",
                                    "success");
						setTimeout(function () {
							window.location.href = "{{ route('login')}}";
							}, 3000);




                        
                        },
                        error: function (data, jqXHR, textStatus, errorThrown) {
   
                            // swal(  "Harap cek semua data",
                            //         "   ",
                            //         "error");
                        },
                    });

			}
		</script>
