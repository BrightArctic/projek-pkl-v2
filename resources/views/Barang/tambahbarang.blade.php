<!-- tambahbarang.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Barang')

@push('style')
<link rel="shortcut icon" href="img/pnj.ico" type="image/x-icon">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Barang</h1>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('insertbarang') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="image">Foto</label>
                                        <div id="camera" class="img-fluid"></div>
                                        <br/>
                                        <input type="button" class="btn btn-sm btn-primary" value="Take Snapshot" onClick="takeSnapshot()" id="snapshotBtn">
                                        <input type="hidden" name="image_webcam" class="image-tag">
                                        <div id="results">Your captured image will appear here...</div>

                                        <!-- Single file input field -->
                                        <div class="mb-3">
                                            <label for="image_file" id="image_file_label">Atau Masukan Foto</label>
                                            <input type="file" class="form-control-file" name="image_file" id="fileInput" onchange="handleFileInput()">
                                        </div>

                                        @error('image')
                                            <div class="alert alert-danger" role="alert">
                                                Data Harus diisi!
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <div id="exampleInputEmail1">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input type="text" id="nama_barang" name="nama_barang" class="form-control">
                                            </div>
                                            @error('nama_barang')
                                                is-invalid
                                            @enderror
                                            <id="" aria-describedby="emailHelp" value="{{ old('nama_barang') }}">
                                            @error('nama_barang')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputEmail1" class="form-label">Stock</label>
                                            <input type="number" name="stock" pattern="^[1-9][0-9]*$" class="form-control
                                            @error('stock')
                                                is-invalid
                                            @enderror" id="" aria-describedby="emailHelp" value="{{ old('stock') }}">
                                            @error('stock')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tahun Anggaran</label>
                                        <input type="text" name="anggaran" class="form-control
                                        @error('anggaran')
                                            is-invalid
                                        @enderror" id="" aria-describedby="emailHelp" value="{{ old('anggaran') }}">
                                        @error('anggaran')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Barcode</label>
                                        <input type="text" style="font-family: 'Libre Barcode 39';font-size: 30px;" name="scan" class="form-control
                                        @error('scan')
                                            is-invalid
                                        @enderror" id="barcode" aria-describedby="emailHelp" value="{{ old('scan') }}" onload="generateBarcodeNumber()">
                                        @error('scan')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Serial Number</label>
                                        <input type="text" name="serialnumber" class="form-control
                                        @error('serialnumber')
                                            is-invalid
                                        @enderror" id="serialnumber" aria-describedby="emailHelp" value="{{ old('serialnumber') }}">
                                        @error('serialnumber')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ old('lokasi') }}">
                                        @error('lokasi')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="gedung" class="form-label">Gedung</label>
                                        <select class="form-select" name="gedung" id="gedung">
                                            <option value="">Pilih Gedung</option>
                                            <option value="teknik Mesin">Teknik Mesin</option>
                                            <option value="Teknik Sipil">Teknik Sipil</option>
                                            <option value="workshop teknik elektronika">Workshop Teknik Elektronika</option>
                                            <option value="teknik elektro">Teknik Elektro</option>
                                            <option value="gedung serba guna">Gedung Serba Guna</option>
                                            <option value="akuntansi">Akuntansi</option>
                                            <option value="workshop teknik telekomunikasi">Workshop Teknik Telekomunikasi</option>
                                            <option value="administrasi bisnis">Administrasi Bisnis</option>
                                            <option value="workshop teknik listrik">Workshop Teknik Listrik</option>
                                            <option value="administrasi jurusan">Administrasi Jurusan</option>
                                            <option value="workshop teknik konversi energi">Workshop Teknik Konversi Energi</option>
                                            <option value="perpustakaan">Perpustakaan</option>
                                            <option value="workshop teknik mesin">Workshop Teknik Mesin</option>
                                            <option value="workshop las">Workshop Las</option>
                                            <option value="workshop teknik sipil">Workshop Teknik Sipil</option>
                                            <option value="PUT">PUT</option>
                                            <option value="laboratorium teknik sipil">Laboratorium Teknik Sipil</option>
                                            <option value="administrasi pusat">Administrasi Pusat</option>
                                            <option value="loker1">Loker 1</option>
                                            <option value="loker2">Loker 2</option>
                                            <option value="bank mini">Bank Mini</option>
                                            <option value="pusat kegiatan mahasiswa">Pusat Kegiatan Mahasiswa</option>
                                            <option value="generator set">Generator Set</option>
                                            <option value="pompa air">Pompa Air</option>
                                            <option value="kantin">Kantin</option>
                                            <option value="workshop alat berat">Workshop Alat Berat</option>
                                            <option value="teknik grafika dan penerbitan">Teknik Grafika dan Penerbitan</option>
                                            <option value="workshop teknik listrik">Workshop Teknik Listrik</option>
                                            <option value="kearsipan">Kearsipan</option>
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

                                    <button class="btn btn-primary" id="toastr-2" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/webcamjs"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type='text/javascript'>
    // Function to generate a random barcode number
    function generateBarcodeNumber() {
        // Generate a random barcode number or use a specific logic to generate it
        var barcodeNumber = Math.floor(Math.random() * 1000000);

        // Set the generated barcode number as the value of the barcode input field
        document.getElementById('barcode').value = barcodeNumber;
    }

    Webcam.set({
        width: 350,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#camera');

    function previewFile(file) {
    var preview = document.getElementById('results');
    var reader = new FileReader();

    reader.onloadend = function() {
        var img = new Image();
        img.src = reader.result;

        img.onload = function() {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');

            var MAX_WIDTH = 350;
            var MAX_HEIGHT = 250;
            var width = img.width;
            var height = img.height;

            if (width > height) {
                if (width > MAX_WIDTH) {
                    height *= MAX_WIDTH / width;
                    width = MAX_WIDTH;
                }
            } else {
                if (height > MAX_HEIGHT) {
                    width *= MAX_HEIGHT / height;
                    height = MAX_HEIGHT;
                }
            }

            canvas.width = width;
            canvas.height = height;
            ctx.drawImage(img, 0, 0, width, height);

            var dataURL = canvas.toDataURL('image/jpeg');
            preview.innerHTML = '<img src="' + dataURL + '" class="img-fluid mt-4"/>';

            // Remove the div#camera.img-fluid element
            var cameraElement = document.getElementById('camera');
            if (cameraElement) {
                cameraElement.remove();
            }
        };
    };

    if (file) {
        reader.readAsDataURL(file);
        // Hide the text
        document.getElementById('fileInputWrapper').getElementsByTagName('label')[0].style.display = 'none';
        // Hide the camera
        document.getElementById('camera').style.display = 'none';
        // Hide the "Take Snapshot" button
        document.getElementById('snapshotBtn').style.display = 'none';
    } else {
        preview.innerHTML = 'Your captured image will appear here...';
    }
}



    function handleFileInput() {
        var file = document.getElementById('fileInput').files[0];
        // Close the webcam
        Webcam.reset();
        // Hide the "Take Snapshot" button
        document.getElementById('snapshotBtn').style.display = 'none';
        // Show the submit button
        document.getElementById('toastr-2').style.display = 'block';
        // Call previewFile() to show the selected file preview
        previewFile(file);
    }

    function takeSnapshot() {
    Webcam.snap(function(data_uri) {
        console.log("Image captured:", data_uri); // Debugging: Log the captured image data

        // Update the value of the hidden input field with the base64-encoded image data
        $(".image-tag").val(data_uri);

        // Display the captured image preview
        $("#results").html('<img src="' + data_uri + '" class="img-fluid mt-4"/>');

        // Hide the "Atau Masukan Foto" label
        document.getElementById('image_file_label').style.display = 'none';

        // Hide the file input field
        document.getElementById('fileInput').style.display = 'none';

        // Show the submit button
        document.getElementById('toastr-2').style.display = 'block';
    });
}


</script>
@endsection
</body>
</html>

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('js/modules-toastr.js') }}"></script>
@endpush
