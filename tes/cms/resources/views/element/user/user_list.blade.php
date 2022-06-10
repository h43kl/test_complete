<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    	$(function () {

                    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            window.table = $('#table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    // "scrollY":        "500px",
                    // "scrollX":        "200px",
                    "scrollCollapse": true,
                    "paging":         true,
                    "pageLength": 10,
            //             "lengthMenu": [[4, 10, 15, 25, 50, -1], [4, 10, 15, 25, 50, "All"]],
                    "order": [[0, "asc"], [1, "asc"]],
            //             "columnDefs": [{"orderable": false, "targets": [8, 9, 10]}],
                    ajax: {
                        url:"{{route('user.list')}}",
                        dataType:"json",
                        type:"GET",
                        token:{"_token":"3EvB4SzVdhtZ3qpmRUw690m6JPpxuePdPp2qNUec"}
                    },
                    
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'image', name: 'image'},
                        {data: 'action', name: 'action'},
                    ]
            });
        });

        function image_file(params) {
           
            event.preventDefault();
            var id = params;

            $('#myModal').modal("show");

            $.get('file_image/' + id , function (data) {
                console.log('data',data)
                document.getElementById("imageID").src="/public/foto_profile/"+ data.data.image;
                // $("#imageID").attr('src',data.data.image);

            })
        }

        function show(params) {
                
            event.preventDefault();
            var id = params;
            $('.bd-example-modal-lg').modal("show");
            $.get('user/' + id , function (data) {
                console.log('data',data)

                $('#data_id').val(data.data.id);
                $('#name').val(data.data.name);
                $('#email').val(data.data.email);
                
                document.getElementById("image_user").src="/public/foto_profile/"+ data.data.image;
               
            })
        }

        function del(params) {
		
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                
                var id = params;
                var allData = JSON.stringify(id)
                
                $.ajaxSetup({
                            headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                        $.ajax({
                            type: "POST",
                            url: "{{ url('userdelete') }}" + '/' + id,
                            cache: false,
                            data: allData,
                            processData: false,
                            contentType: false,
                            dataType: 'JSON',
                            

                            success: function (data) {
                            
                                swal(" Hapus Data Berhasil ",
                                        "   ",
                                        "success");

                            setTimeout(function () {
                                location.reload();
                                }, 3000);
                            
                            },
                            error: function (data, jqXHR, textStatus, errorThrown) {
                                console.log('data',data);
                                console.log(textStatus);
                            },
                        });

            });
        }

</script>