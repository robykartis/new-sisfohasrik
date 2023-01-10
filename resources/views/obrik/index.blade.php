@extends('layouts.app')
@section('title')
    Obrik
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
@endpush

@section('content')
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $title }}</h3>
                <div class="ms-auto">

                    <a href="{{ route('pendaftaranobrik.create') }}" class="btn btn-success btn-sm"><i
                            class="si si-plus"></i></a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter  data-table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">No</th>
                            <th>Tahun</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Kode</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Klarifikasi</th>
                            <th style="width: 15%;">Nama</th>
                            <th style="width: 15%;">Induk</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
@endsection


@push('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('backend/assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('backend/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('backend/assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



    <script type="text/javascript">
        function confirmDelete() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('Data berhasil dihapus.', 'Sukses', {
                    timeOut: 5000
                });
            @endif
        });
    </script>
    {{-- Action Tambah Data --}}

    <script type="text/javascript">
        $(function() {

            // Pass Header Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Render Table
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pendaftaranobrik.index') }}",
                    data: function(d) {
                        d.tahun = $('#tahun').val();
                        d.klarifikasi = $('#klarifikasi').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'nama_klarifikasi',
                        name: 'nama_klarifikasi',
                        render: function(data, type, full, meta) {
                            return full.nama_klarifikasi;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'induk',
                        name: 'induk'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            //   Reload table
            $('#tahun, #klarifikasi').change(function() {
                table.ajax.reload();
            });
            // Submit Filter
            $('form').on('submit', function(event) {
                event.preventDefault();
                table.draw();
            });



            $(document).on('click', '.deleteData', function() {
                var kode_id = $(this).data("id");
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    // Tambahkan kode ajax di sini
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('pendaftaranobrik.store') }}" + '/' + kode_id,
                        success: function(data) {
                            // Tambahkan toastr untuk menampilkan pesan sukses
                            toastr.success('Data berhasil dihapus.', 'Sukses', {
                                timeOut: 5000
                            });
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    </script>
@endpush












{{-- <table class="table table-striped table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Kode</th>
                                                <th>Klarifikasi Obrik</th>
                                                <th>Nama</th>
                                                <th>Induk</th>
                                                <th width="180px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendaftaran_obriks as $pendaftaran_obrik)
                                                <tr>
                                                    <td>{{ $pendaftaran_obrik->tahun }}</td>
                                                    <td>{{ $pendaftaran_obrik->kode }}</td>
                                                    <td>{{ $pendaftaran_obrik->nama_klarifikasi }}</td>
                                                    <td>{{ $pendaftaran_obrik->nama }}</td>
                                                    <td>{{ $pendaftaran_obrik->induk }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="" class="btn btn-info btn-sm">Show</a>
                                                        <a href="" class="btn btn-danger btn-sm">delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> --}}
