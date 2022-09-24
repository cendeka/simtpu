<?php

namespace App\Exports;

use App\Models\Registrasi;


use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrasiExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct($tahun, $bulan)
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
        return $this;
    }

    public function query()
    {
        return Registrasi::query()->whereHas('makam', function ($query) {
            $query->whereYear('tanggal_meninggal', $this->tahun)
                  ->whereMonth('tanggal_meninggal', $this->bulan);
        });
    }
    public function headings(): array
    {
        return array_keys($this->query()->first()->toArray());
    }
}
