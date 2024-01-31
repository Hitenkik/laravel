@extends('layout.app')
@section('title')
    Partners
@endsection

{{-- ((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((index)))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))) --}}
@section('content')
    <div class="container-fluid mt-5">
        <div class="table-responsive mt-3">
            <div class="d-flex">
                <a class="btn btn-success btn-m text-white rounded" data-bs-toggle="modal"
                    data-bs-target="#createPartnerModal">Add
                    New Partners</a>
                <input type="search" placeholder="Search..." id="searchInput" class="w-50 border" style="margin-left:70%">
            </div>
            <table class="table mt-4">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Image</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tBody"></tbody>
            </table>
        </div>
    </div>


{{-- ((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((create form))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))) --}}

    <div class="modal fade" id="createPartnerModal" tabindex="-1" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-m" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pt-3" id="modalTitleId">
                        Enter New Partner Details
                    </h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-square-fill fa-2x
                         bg-white text-danger"></i></button>
                </div>
                <div class="modal-body">
                    <form id="addPartnerForm" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" />
                                <small class="text-danger name-error"></small>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" />
                                <small class="text-danger email-error"></small>
                            </div>

                            <div class="mb-3">
                                <label for="number" class="form-label">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Phone No" />
                                <small class="text-danger phone-error"></small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Uplode Image</label>
                                <input type="file" class="form-control form-control-lg" name="image" />
                                <small class="text-danger image-error"></small>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{-- ((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((Edit form)))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))) --}}

    <div class="modal fade" id="editPartnerModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-m" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Edit Partner
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updatePartnerForm" enctype="multipart/form-data">
                        @csrf
                        <div class="container mt-3">
                            <div class="mb-3">
                                <input type="hidden" id="id">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Name" />
                                <small class="text-danger" name-error></small>
                            </div>
                        </div>
                        <div class="container mt-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Email" />
                                <small class="text-danger" email-error></small>
                            </div>
                        </div>
                        <div class="container mt-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="Contact No" />
                                <small class="text-danger" name-error></small>
                            </div>
                        </div>
                        <div class="container mt-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control form-control-lg"
                                    placeholder="Image" />
                                <small class="text-danger" name-error></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{-- ((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((((script))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))) --}}
{{-- ############################################################## Create form ############################################################## --}}
@pushOnce('scripts')
    <script>
        function loadData(value = null) {
            $.ajax({
                url: 'partners',
                type: 'GET',
                data: {search: value},
                success: function(result) {
                    $('#tBody').html('');
                    $.each(result, function(key, value) {
                        $('#tBody').append(
                            '<tr>' +
                            '<td>' + value.name + '</td>' +
                            '<td>' + value.email + '</td>' +
                            '<td>' + value.phone + '</td>' +
                            '<td><img src="' + value.image +
                            '" height="70" width="50" alt="No Image"></td>' +
                            '<td class="text-center">' +
                            '<button class="btn btn-success m-1" id="editPartnerBtn" data-id="' +
                            value.id + '"> Edit </button>' +
                            '<button class="btn btn-danger m-1" id="deletePartnerBtn" data-id="' +
                            value.id + '"> Delete </button>' +
                            '</td>' +
                            '</tr>'
                        );
                    });
                }
            })
        }
        $(document).ready(function() {
            // $('#createPartnerModal').modal('show')
            loadData();

//{{-- ############################################################## Add form ############################################################## --}}


            $('#addPartnerForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'partners',
                    type: 'POST',
                    // data: $(this).serialize(),
                    data: new FormData($('#addPartnerForm')[0]),
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        loadData();
                        $('#createPartnerModal').modal('hide')
                    },
                    error: function(error) {
                        if (error.responseJSON.errors.name != undefined) {
                            $('.name-error').text(error.responseJSON.errors.name[0])
                        } else {
                            $('.name-error').text('')
                        }

                        if (error.responseJSON.errors.email != undefined) {
                            $('.email-error').text(error.responseJSON.errors.email[0])
                        } else {
                            $('.email-error').text('')
                        }

                        if (error.responseJSON.errors.phone != undefined) {
                            $('.phone-error').text(error.responseJSON.errors.phone[0])
                        } else {
                            $('.phone-error').text('')
                        }

                        if (error.responseJSON.errors.image != undefined) {
                            $('.image-error').text(error.responseJSON.errors.image[0])
                        } else {
                            $('.image-error').text('')
                        }
                    }
                })
            })
        });

//{{-- ############################################################## Edit form ################################################################ --}}


        $(document).on('click', '#editPartnerBtn', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id')
            $.ajax({
                url: 'partners/' + id + '/edit',
                type: 'GET',
                success: function(result) {
                    console.log(result.image);
                    $('#editPartnerimage').attr('src', result.image);
                    $('#name').val(result.name);
                    $('#email').val(result.email);
                    $('#phone').val(result.phone);
                    $('#id').val(result.id);
                    $('#editPartnerModal').modal('show')
                },
            });
        });

//{{-- ############################################################## Update form ############################################################## --}}


        $(document).on('submit', '#updatePartnerForm', function(e) {
            e.preventDefault();
            let id = $('#id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'partners/' + id,
                type: 'POST',
                data: new FormData($('#updatePartnerForm')[0]),
                processData: false,
                contentType: false,
                success: function(result) {
                    loadData();
                    $('#editPartnerModal').modal('hide')
                },
                error: function(error) {
                    if (error.responseJSON.errors.name != undefined) {
                        $('.name-error').text(error.responseJSON.errors.name[0])
                    } else {
                        $('.name-error').text('')
                    }
                    if (error.responseJSON.errors.email != undefined) {
                        $('.email-error').text(error.responseJSON.errors.email[0])
                    } else {
                        $('.email-error').text('')
                    }
                    if (error.responseJSON.errors.phone != undefined) {
                        $('.phone-error').text(error.responseJSON.errors.name[0])
                    } else {
                        $('.phone-error').text('')
                    }
                    if (error.responseJSON.errors.image != undefined) {
                        $('.image-error').text(error.responseJSON.errors.image[0])
                    } else {
                        $('.image-error').text('')
                    }
                }
            })
        })

//{{-- ############################################################## Delete form ############################################################## --}}


        $(document).on('click', '#deletePartnerBtn', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let canDelete = confirm('Are you sure to delete this record?');
            if (canDelete) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'partners/' + id,
                    type: 'DELETE',
                    success: function(result) {
                        loadData();
                    },
                });
            }
        })

//{{-- ############################################################## Search form ############################################################## --}}


        $(document).on('input', '#searchInput', function() {
            let value = $(this).val();
            loadData(value);
        })

        $(document).on('hidden.bs.modal', '#createPartnerModal', function() {
            $('#addPartnerForm')[0].reset();
        })

        $(document).on('hidden.bs.modal', '#editPartnerModal', function() {
            $('#updatePartnerForm')[0].reset();
        })
    </script>
@endpushOnce
