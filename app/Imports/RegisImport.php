<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


use App\Models\Registrasi;
use App\Models\AhliWaris;
use App\Models\Makam;




class RegisImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) 
        {
           $ahliwaris = AhliWaris::create(
                [
                    'nama' => $row['nama'],
                    'tempat_lahir1' => $row['tempat_lahir1'],
                    'tanggal_lahir1' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir1']),
                    'jenis_kelamin1' => $row['jenis_kelamin1'],
                    'nik1' => $row['nik1'],
                    'agama1' => $row['agama1'],
                    'pekerjaan1' => $row['pekerjaan1'],
                    'alamat1' => $row['alamat1'],
            ]);  
            $registrasi = Registrasi::create(
                [
                    'kode_registrasi' => rand(0000,9999),
                    'ahliwaris_id' => $ahliwaris->id,
                    'hubungan' => $row['hubungan'],
                    'nama_meninggal' => $row['nama_meninggal'],
                    'tempat_lahir2' => $row['tempat_lahir2'],
                    'tanggal_lahir2' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir2']),
                    'jenis_kelamin2' => $row['jenis_kelamin2'],
                    'nik2' => $row['nik2'],
                    'agama2' => $row['agama2'],
                    'pekerjaan2' => $row['pekerjaan2'],
                    'alamat2' => $row['nama_jalan'].$row['rt'].$row['rw'].$row['desa']
            ]);  
            $makam = Makam::create(
                [
                    'registrasi_id' => $registrasi->id,
                    'waktu_meninggal' => $row['waktu_meninggal'],
                    'tanggal_meninggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_meninggal']),
                    'tempat_meninggal' => $row['tempat_meninggal'],
                    'tanggal_dimakamkan' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_dimakamkan']),
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
