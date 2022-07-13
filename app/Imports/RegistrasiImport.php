<?php

namespace App\Imports;
use App\Models\Registrasi;
use App\Models\AhiWaris;
use App\Models\Makam;


use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Collection;

class RegistrasiImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)    
    {
        foreach ($rows as $row) 
        {
           AhliWaris::create(
                [
                    'nama' => $row['nama'],
                    'tempat_lahir1' => Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tempat_lahir1'])),
                    'tanggal_lahir1' => $row['tanggal_lahir1'],
                    'jenis_kelamin1' => $row['jenis_kelamin_1'],
                    'nik1' => $row['nik1'],
                    'agama1' => $row['agama1'],
                    'pekerjaan1' => $row['pekerjaan1'],
                    'alamat1' => $row['alamat1'],
            ]);  
            Registrasi::create(
                [
                    'kode_registrasi' => rand(0000,9999),
                    'ahliwaris_id' => $ahliwaris->id,
                    'hubungan' => $row['hubungan'],
                    'nama_meninggal' => $row['nama_meninggal'],
                    'tempat_lahir2' => $row['tempat_lahir2'],
                    'tanggal_lahir2' => $row['tanggal_lahir2'],
                    'jenis_kelamin2' => $row['jenis_kelamin2'],
                    'nik2' => $row['nik2'],
                    'agama2' => $row['agama2'],
                    'pekerjaan2' => $row['pekerjaan2'],
                    'alamat2' => $row['alamat2'],
            ]);  
            Makam::create(
                [
                    'registrasi_id' => $registrasi->id,
                    'tanggal_meninggal' => $row['tanggal_meninggal'],
                    'tanggal_dimakamkan' =>$row['tanggal_dimakamkan'],
                    'luas_lahan' =>$row['luas_lahan'],
                    'nama_tpu' => $row['nama_tpu'],
                    'blok_tpu' =>$row['blok_tpu'],
                    'nomor_tpu' => $row['nomor_tpu'],
                    'nama_ditumpang' => $row['nama_ditumpang'],
                ]
            ); 
        }
    }
}
