<?php
namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesertaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil koleksi data dari model Peserta
     */
    public function collection()
    {
        return Peserta::all([
            'nama_lengkap',
            'nik',
            'jenis_kelamin',
            'golongan_darah',
            'pekerjaan',
            'no_tlp',
            'alamat',
            'komunitas',
            'riwayat_penyakit',
            'kontak_darurat',
            'size_jersey',
            'bukti_bayar',
            'status',
            'id_road_race',
            'created_at'
        ]);
    }

    /**
     * Menentukan header kolom
     */
    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'NIK',
            'Jenis Kelamin',
            'Golongan Darah',
            'Pekerjaan',
            'No Telepon',
            'Alamat',
            'Komunitas',
            'Riwayat Penyakit',
            'Kontak Darurat',
            'Size Jersey',
            'Bukti Bayar',
            'Status',
            'Kategiori Road Race',
            'Tanggal Dibuat',
        ];
    }

    /**
     * Menentukan format tiap baris data
     */
    public function map($peserta): array
    {
        return [
            $peserta->nama_lengkap,
            "'" . (string)$peserta->nik,
            $peserta->jenis_kelamin,
            $peserta->golongan_darah,
            $peserta->pekerjaan,
            "'" . (string)$peserta->no_tlp,
            $peserta->alamat,
            $peserta->komunitas,
            $peserta->riwayat_penyakit,
            "'" . (string)$peserta->kontak_darurat,
            $peserta->size_jersey,
            $peserta->bukti_bayar,
            $peserta->status,
            $peserta->roadRace->nama.'K',
            $peserta->created_at->timezone('Asia/Jayapura')->format('Y-m-d H:i:s'),
        ];
    }
}
