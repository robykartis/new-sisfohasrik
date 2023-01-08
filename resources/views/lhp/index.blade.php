@extends('layouts.v1.app')
@section('title')
    LHP
@endsection
{{-- @section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection --}}


@push('css')
    <link href="{{ asset('ltr/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">hhh</h5>
                        <div class="ms-auto">

                            <a href="{{ route('lhp.create') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered data-table" style="width:100%">
                            <form>
                                <div class="row mb-2">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <select class="form-select" name="tahun" id="tahun">
                                                <option value="">Semua Tahun</option>
                                                @for ($i = date('Y'); $i >= 1900; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $request->tahun == $i ? 'selected' : '' }}>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group">
                                            <select name="nama_pendaftaran" id="nama_pendaftaran" class="form-select">
                                                <option value="">Semua Nama Obrik</option>
                                                @foreach ($nama_pendaftaran as $pendaftaran)
                                                    <option value="{{ $pendaftaran->id }}">
                                                        {{ $pendaftaran->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group">
                                            <select name="nama_klarifikasi" id="nama_klarifikasi" class="form-select">
                                                <option value="">Semua Klarifikasi Obrik</option>
                                                @foreach ($nama_klarifikasi as $klarifikasi)
                                                    <option value="{{ $klarifikasi->id }}">
                                                        {{ $klarifikasi->name_obrik }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No LHP</th>
                                    <th>Tahun</th>
                                    <th>Tgl LHP</th>
                                    <th>Klarifikasi Obrik</th>
                                    <th>Nama Obrik</th>
                                    <th>Action</th>
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
@endsection
@section('modal')
    <section class="content">
        <div class="container-fluid">
            <div class="modal fade"id="modal-delete" aria-labelledby="ModalLabel">
                <div class="modal-dialog modal-sm ">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="ModalLabel">Konfirmasi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Klik Oke untuk lanjutkan&hellip;</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-danger">Ya</button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push('js')
    <script src="{{ asset('ltr/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('ltr/assets/js/table-datatable.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



    <script type="text/javascript">
        function confirmDelete() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('lhp.index') }}",
                    data: function(d) {
                        d.tahun = $('#tahun').val();
                        d.nama_pendaftaran = $('#nama_pendaftaran').val();
                        d.nama_klarifikasi = $('#nama_klarifikasi').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'no_lhp',
                        name: 'no_lhp'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'tgl_lhp',
                        name: 'tgl_lhp'
                    },

                    {
                        data: 'nama_klarifikasi_obrik',
                        name: 'nama_klarifikasi_obrik',
                        render: function(data, type, full, meta) {
                            return full.nama_klarifikasi_obrik;
                        }
                    },
                    {
                        data: 'nama_pendaftaran_obrik',
                        name: 'nama_pendaftaran_obrik',
                        render: function(data, type, full, meta) {
                            return full.nama_pendaftaran_obrik;
                        }
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#tahun, #nama_pendaftaran,#nama_klarifikasi').change(function() {
                table.ajax.reload();
            });

            // Submit Filter
            $('form').on('submit', function(event) {
                event.preventDefault();
                table.draw();
            });

            var user_id;

            $(document).on('click', '.delete', function() {
                user_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function() {
                $.ajax({
                    url: "users/destroy/" + user_id,
                    beforeSend: function() {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            alert('Data Deleted');
                        }, 2000);
                    }
                })
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
@endpush
