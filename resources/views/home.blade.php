@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Blog</div>
                    <div class="card-body">
                        <table id="example" class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action/s</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var table = $('#example').DataTable({
                serverSide: true,
                processing: true,
                stateSave: true,
                ajax: '/api/blog',
                dom: 'Blfrtip',
                lengthChange: false, // true to show the showing of entries
                buttons: [
                    {
                        text: 'Create',
                        action: function (e, dt, node, config) {
                            window.location = 'blog/create';
                        }
                    }
                ],
                columns: [
                    {data: 'title'},
                    {data: 'description'},
                    {data: 'actions', orderable: false, bSearchable: false},
                ],
                "drawCallback": function (settings) {
                    $('[data-toggle=confirmation]').confirmation({
                        rootSelector: '[data-toggle=confirmation]',
                        onConfirm: function () {
                            axios({
                                method: 'DELETE',
                                url: $(this).attr('data-url')
                            }).then(function (response) {
                                var data = response.data;
                                $.notify(data.message, {
                                    className: 'success',
                                    position: 'top-center',
                                });
                                table.draw(false);
                            }).catch(function (error) {
                                var data = error.response.data;
                                $.notify(data.message, {
                                    className: 'error',
                                    position: 'top-center',
                                });
                                table.draw(false);
                            });
                        }
                    });
                },
                initComplete: function () {
                    table.buttons().container()
                        .appendTo($('#example_wrapper .col-sm-6:eq(0)'));
                }
            })
        </script>
    @endpush

@endsection
