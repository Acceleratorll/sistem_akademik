@extends('layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <div class="panel-body" style="overflow-x: auto">
                            <button type="button" class="btn btn-default btn-primary mb-3" id="btn-tambah">
                                Tambah Jurusan
                            </button>
                            <table id="table" class="table table-striped table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="modal-title">Tambah Jurusan</h4>
                </div>
                <form action="javascript:;" id="form" onsubmit="onSave(this)" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="_method" id="method">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Deskripsi">
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> --}}
                        <button type="submit" class="btn btn-danger" id="btn-submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let method
        let url
        let type
        var i = 1;
        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('major.datatable') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $("#btn-tambah").on('click', function() {
                $("#modal-title").html('Tambah Jurusan')
                method = 'insert'
                $("#method").val('POST')
                $('#modalData form')[0].reset()
                $("#btn-submit").html('Simpan')
                $("#modalData").modal('show')
            })
        })

        function onSave() {
            if (method == 'insert') {
                url = `{{ route('major.store') }}`
                type = "POST"
            } else if (method == 'update') {
                url = `{{ url('major') }}/${id}`
                type = "POST"
            }
            new Promise(function(resolve, reject) {
                $.ajax({
                        url: url,
                        type: type,
                        contentType: false,
                        processData: false,
                        data: new FormData($("#form")[0]),
                    })
                    .done(res => {
                        $('#modalData').modal('hide');
                        swal.fire({
                            title: 'Success!',
                            text: 'Berhasil Simpan Data',
                            icon: 'success'
                        })
                        reload_ajax($('#table'))
                        i = 1;
                        resolve(res)
                    })
                    .fail(err => {
                        let response = JSON.parse(err.responseText)
                        let str = ''
                        $.each(response.errors, (key, value) => {
                            str += `${value} <br>`;
                        })
                        swal.fire({
                            title: 'Oops...',
                            html: str,
                            icon: 'error',
                        })
                        reject(err)
                    })
            })
        }

        function editData(id) {
            $("#modal-title").html('Update Tahun')
            method = 'update'
            $('#modalData form')[0].reset()
            $("#btn-submit").html('Update')
            $('#status').prop('selectedIndex', 0)
            new Promise((resolve, reject) => {
                $.ajax({
                        url: `{{ route('major.show') }}/${id}`,
                        methot: 'GET',
                        dataType: 'JSON'
                    })
                     (res => {
                        let data = res.data
                        $("#id").val(data.id)
                        $("#name").val(data.name)
                        $("#description").val(data.description)
                        $("#method").val('PUT')
                        $("#modalData").modal('show')
                        resolve(res)
                    })
                    .fail(err => {
                        swal.fire({
                            title: 'Oops...',
                            html: 'Ada yang error nih',
                            icon: 'error',
                        })
                        reject(err)
                    })
            })
        }

        function deleteData(id) {
            swal.fire({
                title: 'Yakin?',
                text: "Ingin menghapus data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    new Promise((resolve, reject) => {
                        $.ajax({
                                url: `{{ url('major') }}/${id}`,
                                method: 'DELETE',
                                data: {
                                    '_token': CSRF_TOKEN,
                                }
                            })
                            .done(res => {
                                reload_ajax($('#table'))
                                swal.fire({
                                    title: 'Success!',
                                    text: res.message,
                                    icon: 'success'
                                })
                                resolve(res)
                            })
                            .fail(err => {
                                let response = JSON.parse(err.responseText)
                                swal.fire({
                                    title: 'Oops...',
                                    html: response.errors,
                                    icon: 'error',
                                })
                                reject(err)
                            })
                    })
                }
            })
        }
    </script>
@endsection
