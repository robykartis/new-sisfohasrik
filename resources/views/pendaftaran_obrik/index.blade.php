@extends('layouts.app')
@section('title')
    Kode TLHP
@endsection
{{-- @section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection --}}
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">dsdad</h3>
                            <div align="right">
                                <a href="{{ route('pendaftaranobrik.create') }}" type="button"
                                    class="btn btn-success btn-sm"> <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-12 table-responsive">

                                <table class="table table-striped table-bordered data-table">
                                    <form>
                                        <label for="tahun">Tahun:</label>
                                        <select name="tahun" id="tahun">
                                            <option value="">Semua Tahun</option>
                                            @foreach (DB::table('pendaftaran_obriks')->pluck('tahun') as $i)
                                                <option value="{{ $i }}"
                                                    {{ $request->tahun == $i ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="klarifikasi">Klarifikasi:</label>
                                        <select name="klarifikasi" id="klarifikasi">
                                            <option value="">Semua Klarifikasi</option>
                                            @foreach ($klarifikasis as $klarifikasi)
                                                <option value="{{ $klarifikasi->id }}">{{ $klarifikasi->name_obrik }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit">Filter</button>
                                    </form>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Kode</th>
                                            <th>Klarifikasi</th>
                                            <th>Nama</th>
                                            <th>Induk</th>
                                            <th width="180px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection

@push('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
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
                        data: 'name_obrik',
                        name: 'name_obrik',
                        render: function(data, type, full, meta) {
                            return full.name_obrik;
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
                                                    <td>{{ $pendaftaran_obrik->name_obrik }}</td>
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
