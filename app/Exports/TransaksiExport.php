<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaksi::with(['obat', 'dokter', 'pasien'])->get()->map(function ($item) {
            return [
                'nama_pasien'       => $item->id_pasien ?? '-',         // nama pasien
                'alamat'            => $item->alamat,
                'nama_obat'         => $item->Obat->nama_obat ?? '-',      // nama obat
                'harga_obat'        => $item->harga ?? 0,
                'nama_dokter'       => $item->dokter->nama_dokter ?? '-',  // nama dokter
                'harga_konsultasi'  => $item->dokter->harga_konsultasi ?? 0,
                'pemeriksaan'       => $item->pemeriksaan,
                'total'             => $item->total,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Pasien',
            'Alamat',
            'Nama Obat',
            'Harga Obat',
            'Nama Dokter',
            'Harga Konsultasi',
            'Pemeriksaan',
            'Total',
        ];
    }
}
