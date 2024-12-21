<?php

namespace App\Http\Controllers;

use App\Exports\PesertaExport;
use App\Models\Kategori;
use App\Models\Peserta;
use App\Models\RoadRace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    function index() {
        return view('backend.data_peserta',[
            'data_peserta' => Peserta::with(['kategori'])->get()
        ]);
    }
    public function show($id)
    {
        // Ambil data peserta berdasarkan ID
        $peserta = Peserta::with(['roadRace','kategori'])->findOrFail($id);

        // Return ke view detail peserta
        return view('backend.peserta_show', compact('peserta'));
    }

    public function destroy($id)
    {
        // Cari data peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Hapus data peserta
        $peserta->delete();

        notify()->success('Peserta berhasil dihapus.');
        // Redirect ke halaman peserta dengan pesan sukses
        return redirect()->route('peserta.index');
    }
    public function updateStatus(Request $request, $id)
    {
        // Cari peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Update status peserta
        $peserta->status = $request->status;
        $peserta->save();

        // Kembalikan respon berhasil
        notify()->success('Status peserta berhasil diubah.');
        return response()->json(['success' => true, 'message' => '']);
    }

    public function exportPeserta()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $fileName = 'peserta_data_' . $timestamp . '.xlsx';

        return Excel::download(new PesertaExport, $fileName);
    }

    // Show the edit form for a specific participant
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $roadRaces = RoadRace::all();  // To pass the road races to the view
        $kategori = Kategori::all();  // To pass the road races to the view
        return view('backend.peserta_edit', compact('peserta', 'roadRaces','kategori'));
    }

    // Update the participant's data
    public function update(Request $request, $id)
{
    // Find the participant (Peserta) by ID
    $peserta = Peserta::findOrFail($id);

    // Validate the incoming request data
    $validatedData = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nik' => 'required|numeric|digits:16',  // Ensure NIK is numeric and exactly 16 digits
        'golongan_darah' => 'required|string|max:3',
        'jenis_kelamin' => 'required|in:Pria,Wanita',
        'pekerjaan' => 'required|string|max:255',
        'no_tlp' => 'required|numeric|digits_between:10,15',  // Ensure phone number is numeric with a specific length
        'alamat' => 'required|string|max:500',
        'komunitas' => 'required|string|max:255',
        'riwayat_penyakit' => 'required|string|max:255',
        'kontak_darurat' => 'nullable|string|max:255',
        'id_kategori' => 'required|exists:kategori,id', // Ensure category exists
        'size_jersey' => 'required|string|max:10',  // Allow size jersey to be nullable
        'bukti_bayar' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',  // Validate file types and size
        'id_road_race'=> 'required|exists:road_race,id'
    ]);

    // Update the participant's data using the validated data
    $peserta->update($validatedData);

    // If there's a file uploaded for 'bukti_bayar', handle the upload
    if ($request->hasFile('bukti_bayar')) {
        // Ensure we delete the old file if it exists
        if ($peserta->bukti_bayar && Storage::disk('public')->exists($peserta->bukti_bayar)) {
            Storage::disk('public')->delete($peserta->bukti_bayar);
        }

        // Store the new file and update the 'bukti_bayar' field
        $path = $request->file('bukti_bayar')->store('bukti_bayar', 'public');
        $peserta->bukti_bayar = $path;
        $peserta->save();
    }
    notify()->success('Peserta berhasil diperbarui!.');
    // Redirect back to the participants' list page with a success message
    return redirect()->route('peserta.index');
}


}
