@extends('layouts.app')

@section('title', 'User')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css" />
    <link rel="shortcut icon" href="img/pnj.ico" type="image/x-icon">
    <style>
        .btn-pencil,
        .btn-trash,
        .btn-test-user-pencil {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-pencil i,
        .btn-trash i,
        .btn-test-user-pencil i {
            font-size: 16px;
        }

        .action-container {
            display: flex;
            align-items: center;
        }

        .action-container a {
            margin-left: 5px; /* Adjust the common margin */
        }

        .action-container .btn-trash {
            margin-left: auto; /* Push the trash bin to the left as far as possible */
        }

        .action-container .btn-test-user-pencil {
            margin-right: 5px; /* Adjust the margin specifically for the Test User pencil */
        }

        /* Additional style to ensure correct alignment */
        .action-container .btn-pencil {
            margin-right: 5px; /* Adjust margin for the other pencil */

        }
        .action-container .custom-test-user-pencil {
    margin-right: 5px;


        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data User</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <a href="{{ route('tambahuser') }}" type="button" class="btn btn-primary">Tambah+</a>
                                        <a href="/pdfuser" type="button" class="btn btn-danger">PDF</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">ID</th>
                                                <th scope="col" class="text-center">Name</th>
                                                <th scope="col" class="text-center">Nim</th>
                                                <th scope="col" class="text-center">Email</th>
                                                <th scope="col" class="text-center">Role</th>
                                                <th scope="col" class="text-center">Expired</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($data as $index => $row)
                                                <tr>
                                                    <th scope="row" class="text-center">{{ $index + $data->firstItem() }}</th>
                                                    <td class="text-center">{{ $row->name }}</td>
                                                    <td class="text-center">{{ $row->nim }}</td>
                                                    <td class="text-center">{{ $row->email }}</td>
                                                    <td class="text-center">{{ $row->role }}</td>
                                                    <td class="text-center">{{ $row->expired_at->format('Y-m-d') }}</td>
                                                    <td class="text-center">
                                                        <div class="action-container">
                                                            @if(auth()->user()->id != $row->id)
                                                                <form action="{{ route('deleteuser', $row->id) }}" id="delete{{ $row->id }}" method="POST" class="m-1 delete swal-confirm">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-icon btn-danger btn-trash">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                            <a href="{{ route('tampilanuser', $row->id) }}" class="btn btn-primary m-1 btn-pencil btn-test-user-pencil custom-test-user-pencil">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
