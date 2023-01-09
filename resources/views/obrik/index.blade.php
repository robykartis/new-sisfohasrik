@extends('layouts.v1.app')
@section('title')
    Obrik
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render() }}
@endsection
@push('css')
    <link href="{{ asset('ltr/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">{{ $title }}</h5>
                        <div class="ms-auto">

                            <a href="{{ route('pendaftaranobrik.create') }}" class="btn btn-primary btn-sm"><i
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
                                            <select name="klarifikasi" id="klarifikasi" class="form-select">
                                                <option value="">Semua Klarifikasi</option>
                                                @foreach ($klarifikasis as $klarifikasi)
                                                    <option value="{{ $klarifikasi->id }}">
                                                        {{ $klarifikasi->nama_klarifikasi }}
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
                                    <th>Tahun</th>
                                    <th>Kode</th>
                                    <th>Klarifikasi</th>
                                    <th>Nama</th>
                                    <th>Induk</th>
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
