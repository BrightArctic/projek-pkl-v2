@extends('layouts.app')

@section('title', 'Edit Barang')

@push('style')
<link rel="shortcut icon" href="img/pnj.ico" type="image/x-icon">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Barang</h1>
        </div>
        <div class="row">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form  method="POST" action="/updatebarang/{{$data->id}}">
                                @csrf
                                @method('get')
                                <div class="mb-3">
                                <label for="image">Foto</label>

                                <div class="bungkus" {{ ($data->image) ? "style=display:none" : "style=display:block" }}>
                                    <div class="col-md-6">
                                        <div id="camera"></div>
                                        <br/>
                                        <input type=button class="btn btn-sm btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                                        <input type="hidden" name="image" class="image-tag">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image_file" id="image_file_label">Atau Masukan Foto via Perangkat anda </label>
                                        <input type="file" class="form-control-file" name="image_file" id="fileInput" onchange="handleFileInput()">
                                    </div>

                                    <div class="col-md-6">
                                        <div id="results" style="margin-top: 30px;">Your captured image will appear here...</div>
                                    </div>
                                </div>

                                <div class="bungkus2" {{ ($data->image) ? "style=display:block" : "style=display:none" }}>
                                    <img src="{{ $data->image }}" style="width: 25vw;">
                                </div>

                                <button class="btn btn-warning mt-2 tombol-foto" type="button">Ubah Foto</button>
                                <button class="btn btn-secondary mt-2 tombol-foto-batal" type="button" style="display: none;">Batal</button>

                                @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        Data Harus diisi!
                                    </div>
                                @enderror

                            </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang" value="{{$data->nama_barang}}" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Stock</label>
                                    <input type="text" name="stock" value="{{$data->stock}}" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Anggaran</label>
                                    <input type="text" name="anggaran" value="{{$data->anggaran}}" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Barcode</label>
                                    <input type="text" name="scan" value="{{$data->scan}}" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Serial Number</label>
                                    <input type="text" name="serialnumber" value="{{$data->serialnumber}}" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>

<div class="mb-3">
    <label for="lokasi" class="form-label">Lokasi</label>
    <input type="text" name="lokasi" value="{{ $data->lokasi }}" class="form-control" id="lokasi" aria-describedby="lokasiHelp">
    <!-- Add any validation messages for 'lokasi' if needed -->
</div>

<div class="mb-3">
    <label for="gedung" class="form-label">Gedung</label>
    <select class="form-select" name="gedung" id="gedung">
        <option value="">Pilih Gedung</option>
        <option value="workshop teknik elektronika" {{ $data->gedung == 'workshop teknik elektronika' ? 'selected' : '' }}>Workshop Teknik Elektronika</option>
        <option value="teknik elektro" {{ $data->gedung == 'teknik elektro' ? 'selected' : '' }}>Teknik Elektro</option>
        <option value="gedung serba guna" {{ $data->gedung == 'gedung serba guna' ? 'selected' : '' }}>Gedung Serba Guna</option>
        <option value="akuntansi" {{ $data->gedung == 'akuntansi' ? 'selected' : '' }}>Akuntansi</option>
        <option value="workshop teknik telekomunikasi" {{ $data->gedung == 'workshop teknik telekomunikasi' ? 'selected' : '' }}>Workshop Teknik Telekomunikasi</option>
        <option value="administrasi bisnis" {{ $data->gedung == 'administrasi bisnis' ? 'selected' : '' }}>Administrasi Bisnis</option>
        <option value="workshop teknik listrik" {{ $data->gedung == 'workshop teknik listrik' ? 'selected' : '' }}>Workshop Teknik Listrik</option>
        <option value="administrasi jurusan" {{ $data->gedung == 'administrasi jurusan' ? 'selected' : '' }}>Administrasi Jurusan</option>
        <option value="workshop teknik konversi energi" {{ $data->gedung == 'workshop teknik konversi energi' ? 'selected' : '' }}>Workshop Teknik Konversi Energi</option>
        <option value="perpustakaan" {{ $data->gedung == 'perpustakaan' ? 'selected' : '' }}>Perpustakaan</option>
        <option value="workshop teknik mesin" {{ $data->gedung == 'workshop teknik mesin' ? 'selected' : '' }}>Workshop Teknik Mesin</option>
        <option value="workshop las" {{ $data->gedung == 'workshop las' ? 'selected' : '' }}>Workshop Las</option>
        <option value="workshop teknik sipil" {{ $data->gedung == 'workshop teknik sipil' ? 'selected' : '' }}>Workshop Teknik Sipil</option>
        <option value="PUT" {{ $data->gedung == 'PUT' ? 'selected' : '' }}>PUT</option>
        <option value="laboratorium teknik sipil" {{ $data->gedung == 'laboratorium teknik sipil' ? 'selected' : '' }}>Laboratorium Teknik Sipil</option>
        <option value="administrasi pusat" {{ $data->gedung == 'administrasi pusat' ? 'selected' : '' }}>Administrasi Pusat</option>
        <option value="loker1" {{ $data->gedung == 'loker1' ? 'selected' : '' }}>Loker 1</option>
        <option value="loker2" {{ $data->gedung == 'loker2' ? 'selected' : '' }}>Loker 2</option>
        <option value="bank mini" {{ $data->gedung == 'bank mini' ? 'selected' : '' }}>Bank Mini</option>
        <option value="pusat kegiatan mahasiswa" {{ $data->gedung == 'pusat kegiatan mahasiswa' ? 'selected' : '' }}>Pusat Kegiatan Mahasiswa</option>
        <option value="generator set" {{ $data->gedung == 'generator set' ? 'selected' : '' }}>Generator Set</option>
        <option value="pompa air" {{ $data->gedung == 'pompa air' ? 'selected' : '' }}>Pompa Air</option>
        <option value="kantin" {{ $data->gedung == 'kantin' ? 'selected' : '' }}>Kantin</option>
        <option value="workshop alat berat" {{ $data->gedung == 'workshop alat berat' ? 'selected' : '' }}>Workshop Alat Berat</option>
        <option value="teknik grafika dan penerbitan" {{ $data->gedung == 'teknik grafika dan penerbitan' ? 'selected' : '' }}>Teknik Grafika dan Penerbitan</option>
        <option value="workshop teknik listrik" {{ $data->gedung == 'workshop teknik listrik' ? 'selected' : '' }}>Workshop Teknik Listrik</option>
        <option value="kearsipan" {{ $data->gedung == 'kearsipan' ? 'selected' : '' }}>Kearsipan</option>
    </select>
    @error('gedung')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>



                                <div class="row">
                                    <div class="col mb-lg-2 mb-1">
                                        <label for="exampleFormControlSelect1" class="form-label">Kepemilikan</label>
                                        <select class="form-select @error('level') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="kepemilikan">
                                            {{-- <option selected value="{{ $user->role }}">{{ $user->role }}</option> --}}
                                            <option value="milik negara">Milik Negara</option>
                                            <option value="milik pnj">Milik PNJ</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script type='text/javascript'>
    Webcam.set({
            width: 350,
            height: 250,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#camera');
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'" class="img-fluid mt-4"/>';
            } );
        }
</script>

<script>
    const tombolFoto = document.querySelector('.tombol-foto');;
    const tombolFotoBatal = document.querySelector('.tombol-foto-batal');
    const bungkus = document.querySelector('.bungkus');
    const bungkus2 = document.querySelector('.bungkus2');
    const results = document.querySelector('#results');
    const imageTag = document.querySelector('.image-tag');

    tombolFoto.addEventListener('click', function(){
        tombolFotoBatal.style.display = 'block';
        tombolFoto.style.display = 'none';
        bungkus.style.display = 'block';
        bungkus2.style.display = 'none';
    })

    tombolFotoBatal.addEventListener('click', function(){
        bungkus.style.display = 'none';
        bungkus2.style.display = 'block';
        tombolFoto.style.display = 'block';
        tombolFotoBatal.style.display = 'none';
        results.innerHTML = 'Your captured image will appear here...';
        imageTag.value = "";
    })


</script>
@endsection
