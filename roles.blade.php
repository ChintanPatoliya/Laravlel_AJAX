<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Template · Bootstrap v5.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css" integrity="sha512-rogivVAav89vN+wNObUwbrX9xIA8SxJBWMFu7jsHNlvo+fGevr0vACvMN+9Cog3LAQVFPlQPWEOYn8iGjBA71w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/appStyles.css')}}" rel="stylesheet">

    <style>
        * {
            font-display: optional;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
@include('users.layouts.header')


{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
{{--++++++++++++++++++++=++++++++++++++++++++++++++++ WHOLE CONTAINER ++++++++++++++++++++++++++++++++++++++++++++++++--}}
{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}


<div class="container-fluid">
    <div class="row">

        @include('users.layouts.sidebar')
        <main class="col-md-9 ms-sm-auto  col-lg-10 px-md-4">
            <div class="card mt-2">
                <div class="card-header bg-secondary d-flex justify-content-between">
                    <h3 class="text-light">Roles</h3>
                    <a href="{{ route('roles.create') }}" id="createRoleModalBtn" type="button" data-bs-toggle="modal" data-bs-target="#createRoleModal"
                       class="btn btn-outline-warning">Create Role</a>

                </div>
                <div class="card-body mt-1">
                    <table class="table table-hover text-dark  table-condensed" id="role_table">
                        <thead>
                        <th>id</th>
                        <th>Role</th>
                        <th>Operations</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++ CREATE MODEL ++++++++++++++++++++++++++++++++++++++++++++++++--}}
{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}

<div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Roles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createRoleForm" name="createRoleForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="role_name" class="col-form-label">Choose your role:</label>
                        <input type="text" name="role_name" class="form-control" id="role_name">
                        <span class="text-danger error-text role_name_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="saveBtn" class="btn btn-primary">Assign Role</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}
{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++ UPDATE MODEL ++++++++++++++++++++++++++++++++++++++++++++++++--}}
{{--++++++++++++++++++++=+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--}}


<div class="modal fade editRole" tabindex="-1" role="dialog" id="updateRoleModal" aria-labelledby="updateRoleModalLabel"
     aria-hidden="true"
     data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateRoleModallable">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/roles/{role}" enctype="multipart/form-data" method="post"
                      id="update-role-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="role_id" name="role_id">
                    <div class="form-group">
                        <label for="">Role name</label>
                        <input type="text" class="form-control" id="editRoleName" name="role_name"
                               placeholder="Enter role name">
                        <span class="text-danger error-text role_name_error"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="updateRoleBtn" name="updateRoleBtn" class="btn btn-block btn-success">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.js" integrity="sha512-2sjxi4MoP9Gn7QE0NhJdxOFVMK/qYsZO6JnO6pngGvck8p5UPwFX2LV5AsAMOQYgvbzMmki6sIqJ90YO3STAnA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // toastr.options.preventDuplicates = true;
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {

// ++++++++++++++++++++=+++++++++++++++++++++++++++++++ ADD NEW ROLE +++++++++++++++++++++++++++++++++++++++++++++++++++

            $(document).on('click','#createRoleModalBtn',function () {
                $('#saveBtn').val("create-book");
                $('#role_id').val('');
                $('#createRoleModal').modal('show');
            });
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Save');

                $.ajax({
                    data: $('#createRoleForm').serialize(),
                    url: '/roles',
                    type: "POST",
                    success: function (data) {

                        $('#createRoleModal').modal('hide');
                        $('#role_table').DataTable().ajax.reload(null,false);

                    },
                    // error: function (data) {
                    //     // console.log('Error:', data);
                    //     $('#saveBtn').html('Save Changes');
                    // }
                });
            });

            $('#createRoleForm').on('submit', function (e) {
                e.preventDefault();
                var form = $("#role_name").val();
                console.log(form);
                $.ajax({
                    ajax: '/roles',
                    method: 'POST',
                    data: {
                        form: form
                    },
                    processData: true,
                    dataType: 'json',
                    success: function (data) {
                        if (data.code == 0) {
                            $.each(data.error, function (prefix, val) {
                                // $(form).find('span.' + prefix + '_error').text(val[0]);

                            });
                        } else {
                            // alert(data.msg);

                        }
                    }
                });
            });
            var createRoleModal = document.getElementById('createRoleModal')
            createRoleModal.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                var button = event.relatedTarget
                // Extract info from data-bs-* attributes
                var recipient = button.getAttribute('data-bs-whatever')
                var modalTitle = createRoleModal.querySelector('.modal-title')
                var modalBodyInput = createRoleModal.querySelector('.modal-body input')

                modalTitle.textContent = 'New message to '
                modalBodyInput.value = recipient
            })

            {{--++++++++++++++++++++=+++++++++++++++++++++++++++++++ GET ALL ROLE ++++++++++++++++++++++++++++++++++++++++++++++++--}}

            var table = $('#role_table').DataTable({
                processing: true,
                info: true,
                ajax: '/roles',
                "pageLength": 5,
                "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "columnDefs": [{
                    targets: 2,
                    orderable: false,
                    searchable: false
                }],
                columns: [
                    //  {data:'id', name:'id'},
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'role_name',
                        name: 'role_name'
                    },
                    {
                        data: function (row) {
                            return '<div class="btn-group">          ' +
                            '                   <button class="btn btn-sm btn-primary" data-id="' + row.id + '" ' +
                            'id="editRoleBtn">Update</button>                      ' +
                            '   <button class="btn btn-sm btn-danger" data-id="' + row.id + '" id="deleteRoleBtn">Delete</button>  ' +
                            '</div>';
                        },
                        name: 'actions',
                    },
                ],
            })
        })
    })


    // ++++++++++++++++++++=+++++++++++++++++++++++++++++++ UPDATE  ROLE ++++++++++++++++++++++++++++++++++++++++++++++++

    $(function () {

        $(document).on('click','#editRoleBtn',function () {

            let id = $(this).data('id');
            $('#role_id').val(id);
            // $('#updateRoleBtn').val("update-role");
            // var a = $(this).attr('data-id');
            $.ajax({
                url: '/roles/'+ id +'/edit',
                type: "get",
                success: function (data) {
                    $('#editRoleName').val(data.role.role_name);
                    $('#updateRoleModal').modal('show');
                },
                error: function (data) {
                    // console.log('Error:', data);
                    $('#updateRoleBtn').html('Save Changes');
                }
            });

        });

        $('#updateRoleBtn').click(function (e) {
            e.preventDefault();
            let id = $('#role_id').val();
            $.ajax({
                data: $('#update-role-form').serialize(),
                url: '/roles/'+id,
                type: "PUT",
                success: function (data) {
                    $('#update-role-form').trigger("reset");
                    $('#updateRoleModal').modal('hide');
                    $('#role_table').DataTable().ajax.reload(null,false);
                },
                error: function (data) {
                    // console.log('Error:', data);
                    $('#updateRoleBtn').html('Save Changes');
                }
            });
        });
    });


    {{--++++++++++++++++++++=+++++++++++++++++++++++++++++++ DELETE ROLE ++++++++++++++++++++++++++++++++++++++++++++++++--}}

    $(function () {
        $(document).on('click', '#deleteRoleBtn', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to save the changes?',
                showCancelButton: true,
                confirmButtonText: `Delete`,
                denyButtonText: `Don't Delete`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/roles/'+ id,
                        type: "DELETE",
                        success: function (data) {
                            $('#role_table').DataTable().ajax.reload(null,false);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                    Swal.fire('Deleted!', 'Role deleted Successfully', 'Danger')
                }
            })
        });
    })
</script>
</body>
</html>

