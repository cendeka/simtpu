

<?php $__env->startSection('title'); ?>
    Formulir Registrasi Pemakaman
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Registrasi
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Formulir Registrasi Pemakaman
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php if(is_null($data)): ?>
    Data Tidak Ditemukan
<?php else: ?>
<div class="row align-items-center">
    <div class="col-lg-12">
        <h3 class="text-center">Formulir Penguburan</h3>
        <p class="text-center">Nomor: <?php echo e($data->kode_registrasi); ?></p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table>
            <tbody>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Saya yang bertandatangan di bawah ini</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Nama Ahliwaris</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->ahliwaris->nama); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tempat / Tanggal Lahir</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->ahliwaris->tempat_lahir1); ?>, <?php echo e($data->ahliwaris->tanggal_lahir1); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Jenis Kelamin</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->ahliwaris->jenis_kelamin1); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">NIK</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->ahliwaris->nik1); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Agama</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->ahliwaris->agama1); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Pekerjaan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->ahliwaris->pekerjaan1); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Alamat</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->ahliwaris->alamat1); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Desa/Kelurahan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Hubungan Dengan yang Meninggal</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->hubungan); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Menerangkan Bahwa</td>
                    <td style="width: 23px;">&nbsp;</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Nama yang Meninggal</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->nama_meninggal); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tempat / Tanggal Lahir</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->tempat_lahir2); ?>, <?php echo e($data->tanggal_lahir2); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Jenis Kelamin</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->jenis_kelamin2); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">NIK</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->nik2); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Agama</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->agama2); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Pekerjaan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->pekerjaan2); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Alamat</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->alamat2); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Desa/Kelurahan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Telah Meninggal Pukul</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($time = date('H:i', strtotime($data->tanggal_meninggal))); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tanggal Meninggal</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($time = date('d-m-Y', ($data->tanggal_meninggal))); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Tanggal Dimakamkan</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($time = date('d-m-Y', ($data->tanggal_dimakamkan))); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Luas Lahan Pemakaman</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->luas_lahan); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Lokasi TPU dan Blok</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;"><?php echo e($data->makam->nama_tpu); ?> Blok <?php echo e($data->makam->blok_tpu); ?>-<?php echo e($data->makam->nomor_tpu); ?></td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">
                    Data Rekam Medis dari Rumah Sakit Klinik/Puskesmas/Instansi Terkait
                    </td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">
                        Bersedia Dimakamkan Ditumpang dengan
                        Pemakaman Ahli Waris yang Sama
                    </td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
                <tr style="height: 23px;">
                    <td style="height: 23px;">Nama yang Ditumpang</td>
                    <td style="width: 23px;">:</td>
                    <td style="height: 23px;">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row" style="margin-top: 30px">
    <div class="col-lg-12">
        Dengan ini saya mohon izin untuk melakukan penguburan yang bersangkutan di lokasi pemakaman yang dikelola oleh pemerintah daerah
        dan saya sanggup memenuhi segala peraturan dan perundang-undangan yang berlaku.
    </div>
    <div class="col-lg-12" style="margin-top: 10px">
        Demikian permohonan ini disampaikan untuk mendapat perhatian.
    </div>
</div>
<div class="row" style="margin-top: 15px;">
    <div class="col">   
    </div>
    <div class="col">   
    </div>
    <div class="col align-self-end" >
        Cianjur, ................
    </div>
</div>
<div class="row" style="margin-top: 10px">
<div class="col">
    Juru Pungut Retribusi
    <div style="margin-top: 100px;">
        <strong><u>Wawan Kurniawan</u></strong>
    </div>
    <div>
        NIP.000000000000000
    </div>
</div>
<div class="col">
    Koordinator Pemakaman
    <div style="margin-top: 100px;">
        <strong><u>Dani Hamdani, S.IP.</u></strong>
    </div>
    <div>
        NIP.000000000000000
    </div>
</div>
<div class="col">
    Pemohon/Ahli Waris
    <div style="margin-top: 30px;">
       materai
    </div>
    <div style="margin-top: 45px;">
       <?php echo e($data->ahliwaris->nama); ?>

    </div>
</div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\resources\views/pages/registrasi/formulir.blade.php ENDPATH**/ ?>