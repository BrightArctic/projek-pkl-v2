<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Peminjam;
use Alert;
use PDF;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\IsEmpty;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Intervention\Image\Facades\Image;




class BarangController extends Controller
{


    public function index(){
        $data = Barang::paginate(9999999999);
        // dd($data);
        return view('Barang.barang',compact('data'));
    }

    public function excel()
	{
		return Excel::download(new BarangExport, 'DATA-BARANG.xlsx');
	}

    public function exportPDF() {
        $data = Barang::all();
        $pdf = PDF::loadView('pdf', ['data' => $data]);
        return $pdf->stream('barang.pdf');
    }
    public function cetakpdf() {
        $data = Barang::all();
        $pdf = PDF::loadView('pdf1', ['data' => $data]);
        return $pdf->stream('barang.pdf1');
    }

    public function tambahbarang(){
        $data = Barang::all();
        return view('Barang.tambahbarang' , compact('data'));
    }

    public function store(Request $request)
{
    try {
        // Validate the request
        $this->validate($request, [
            'nama_barang' => 'required',
            'stock' => 'required',
            'anggaran' => 'required',
            'serialnumber' => 'required',
            'lokasi' => 'required',
            'gedung' => 'required',
            'image_file' => 'nullable|image|max:2048',
        ]);

        // Generate barcode value
        $barcode = $this->generateUniqueCode();

        // Handle image upload and add watermark
        if ($request->hasFile('image_file')) {
            // Load the existing watermark image
            $watermarkPath = public_path('poli.png');
            $watermark = Image::make($watermarkPath);

            // Load the uploaded image
$image = Image::make($request->file('image_file')->getRealPath());

// Resize the image to 1200x1200 keeping the aspect ratio
$image->resize(1200, 1200, function ($constraint) {
    $constraint->aspectRatio();
});

// Get the dimensions of the resized image
$imageWidth = $image->width();
$imageHeight = $image->height();

// Add the existing watermark image to the resized image
$image->insert($watermark, 'bottom-right', 10, 10);

// Calculate the center coordinates for the text
$textWidth = 479; // Width of the edited image
$textHeight = 479; // Height of the edited image
$textX = $imageWidth - $textWidth - 40; // Adjust the value (20) as needed for spacing
$textY = $imageHeight - $textHeight - 70; // Adjust the value (20) as needed for spacing


$image->text('UPATIK', $textX, $textY + $textHeight, function($font) {
    $font->file(public_path('MoonkidsPersonalUseExtbd-gxPZ3.ttf')); // Specify the font path using public_path() helper
    $font->size(95); // Slightly larger font size for the outline text
    $font->color('#000000'); // Black color for the outline text
    $font->align('center');
    $font->valign('bottom');
});

// Draw the text with a smaller font size and white color for the inside
$image->text('UPATIK', $textX, $textY + $textHeight, function($font) {
    $font->file(public_path('MoonkidsPersonalUseExtbd-gxPZ3.ttf')); // Specify the font path using public_path() helper
    $font->size(90); // Smaller font size for the inside text
    $font->color('#ffffff'); // White color for the inside text
    $font->align('center');
    $font->valign('bottom');
});



// Convert the image to base64 string
$imageData = $image->encode('data-url');

// Upload the image to Cloudinary
$uploadResult = Cloudinary::upload($imageData, ['folder' => 'your-folder-name']);
$imageUrl = $uploadResult->getSecurePath();

        }

        // Create new Barang instance and save to the database
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->stock = $request->stock;
        $barang->anggaran = $request->anggaran;
        $barang->serialnumber = $request->serialnumber;
        $barang->scan = $barcode;
        $barang->image = $imageUrl ?? null; // Assign the image URL or null
        $barang->lokasi = $request->lokasi;
        $barang->gedung = $request->gedung;
        $barang->save();

        return redirect()->route('barang')->with('toast_success', 'Data Berhasil Disimpan!');
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error storing barang: ' . $e->getMessage());
        // Handle the error gracefully (e.g., display an error message to the user)
        return redirect()->back()->with('toast_error', 'Error storing barang. Please try again later.');
    }
}




    public function tampilanbarang($id) {
        $data=DB::table('barangs')->where('id', $id)->find($id);
        return view('Barang.edit', ['data'=>$data]);
    }

    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'nama_barang' => 'required',
        'stock' => 'required',
        'anggaran' => 'required',
        'serialnumber' => 'required',
        'lokasi' => 'required', // Add validation for 'lokasi'
        'gedung' => 'required', // Add validation for 'gedung'
    ]);

    // Find the Barang record by ID
    $barang = Barang::findOrFail($id);

    // Update the Barang record with the request data
    $barang->nama_barang = $request->input('nama_barang');
    $barang->stock = $request->input('stock');
    $barang->anggaran = $request->input('anggaran');
    $barang->serialnumber = $request->input('serialnumber');
    $barang->lokasi = $request->input('lokasi');
    $barang->gedung = $request->input('gedung');

    // Save the updated record
    $barang->save();

    // Redirect back to the index page with a success message
    return redirect()->route('barang')->with('toast_success', 'Data Barang berhasil diperbarui!');
}
    public function destroy($id){
    $data = Barang::find($id);
    $data->delete();
    return redirect()->route('barang')->with('toast_success', 'Data Berhasil Di Hapus!');;
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Barang::where("scan", "=", $code)->first());
        return $code;
    }

    public function generateIdCode()
    {
        do {
            $code = random_int(1000, 9999);
        } while (Barang::where("serialnumber", "=", $code)->first());
        return $code;
    }

    public static function generateSerialNumber(int $id)
        {
            $start = 0; // 0 = A, 702 or 703 = AAA, adjust accordingly
            $letters_value = $start + (ceil($id / 999) - 1);
            $numbers = ($id % 999 === 0) ? 999 : $id % 999;

            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $base = strlen($characters);
            $letters = '';

            // while there are still positive integers to divide
            while ($letters_value) {
                $current = $letters_value % $base;
                $letters = $characters[$current] . $letters;
                $letters_value = floor($letters_value / $base);
            }

        return $letters.'-'.sprintf('%03d', $numbers);
        }
}

