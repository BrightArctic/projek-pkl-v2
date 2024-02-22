@extends('layouts.app')

@section('title', 'History')

@push('style')
<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css" />
<link rel="shortcut icon" href="img/pnj.ico" type="image/x-icon">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Barang Dipinjam</h1>
        </div>
        <h2 class="section-title">Note.</h2>
        <p class="">Silahkan ke PUSDATIN untuk mengambil barang dan Mohon Kembalikan Barang Yang Dipinjam Sesuai Batas Peminjaman.</p>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-striped table" id="table-1" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col" style="text-align: center;">Foto</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">keterangan</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Kepemilikan</th>
                                        <th scope="col">Tgl.Dipinjam</th>
                                        <th scope="col">Tgl.Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    <tr>
                                        @foreach ($data as $index => $row)
                                        <th scope="row" style="text-align: center;" >{{ $index + $data->firstItem() }}</th>
                                        <td>
                                            <img src="{{ $row->image }}" style="width: 60px;">
                                        </td>
                                        <td style="text-align: center;">{{$row ->nama_barang}}</td>
                                        <td style="text-align: center;">{{$row ->keterangan}}</td>
                                        <td style="text-align: center;">{{$row ->jumlah}}</td>
                                        <td style="text-align: center;">{{$row ->kepemilikan}}</td>
                                        <td style="text-align: center;">{{$row ->created_at->format('Y-m-d')}}</td>
                                        <td style="text-align: center;">{{$row ->expired_at->format('Y-m-d')}}</td>
                                        {{-- <td>
                                                <form action="{{route('deletehistory',$row->id)}}" id="delete{{$row->id}}"
                                        method="POST" class="d-block">
                                        @csrf
                                        @method('delete')
                                        <a href="#" data-id={{$row->id}} class="btn btn-danger m-1 delete swal-confrim">
                                            Kembalikan
                                        </a>
                                        </form>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('sweetalert::alert')
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/select.bootstrap4.js"></script>
<script src="{{ asset('js/after.js') }}"></script>
<script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
