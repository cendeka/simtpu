

<?php $__env->startSection('title'); ?>
    Form Data Registrasi
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Form
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Data Registrasi
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('registrasi.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="regId" name="regId">
                        <input type="hidden" id="awID" name="awID">
                        <input type="hidden" id="makamID" name="makamID">
                        <input type="hidden" id="retriID" name="retriID">
                        <div>
                            <!-- data ahli waris -->
                            <h3>Ahli Waris</h3>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                        <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="error"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Nomor Induk Kependudukan (NIK)</label>
                                        <input type="text" class="form-control" id="nik1" name="nik1"
                                            placeholder="Nomor Induk Kependudukan">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir1" name="tempat_lahir1"
                                            placeholder="Kabupaten/Kota Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir1" name="tanggal_lahir1"
                                            placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Jenis Kelamin</label>
                                        <select name="jenis_kelamin1" id="jenis_kelamin1" class="form-control">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Agama</label>
                                        <input type="text" class="form-control" id="agama1" name="agama1"
                                            placeholder="Agama">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Pekerjan</label>
                                        <input type="text" class="form-control" id="pekerjaan1" name="pekerjaan1"
                                            placeholder="Pekerjaan">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                            placeholder="Nomor Telepon/Handphone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Alamat Lengkap</label>
                                        <textarea id="alamat1" name="alamat1" class="form-control" rows="2" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                            </div>


                            <!-- data orang yang meninggal -->
                            <h3>Orang Yang Meninggal</h3>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Nama</label>
                                        <input type="text" class="form-control" id="nama_meninggal"
                                            name="nama_meninggal" placeholder="Nama Orang yang Meninggal">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Nomor Induk Kependudukan (NIK)</label>
                                        <input type="text" class="form-control" id="nik2" name="nik2"
                                            placeholder="Nomor Induk Kependudukan">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-phoneno-input">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir2"
                                            name="tempat_lahir2" placeholder="Kabupaten/Kota Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir2"
                                            name="tanggal_lahir2" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-email-input">Jenis Kelamin</label>
                                        <select name="jenis_kelamin2" id="jenis_kelamin2" class="form-control">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Agama</label>
                                        <input type="text" class="form-control" id="agama2" name="agama2"
                                            placeholder="Agama">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-lastname-input">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan2" name="pekerjaan2"
                                            placeholder="Pekerjaan">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="verticalnav-firstname-input">Hubungan dengan Ahli Waris</label>
                                        <input type="text" class="form-control" id="hubungan" name="hubungan"
                                            placeholder="Hubungan dengan Ahliwaris">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="verticalnav-address-input">Alamat Lengkap</label>
                                        <textarea id="alamat2" name="alamat2" class="form-control" rows="2" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                            </div>


                            <!-- data makam -->
                            <h3>Data Makam</h3>

                            <div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-namecard-input">Tanggal Meninggal</label>
                                            <input type="datetime-local" class="form-control" id="tanggal_meninggal"
                                                name="tanggal_meninggal" placeholder="Tanggal Meninggal">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="verticalnav-namecard-input">Tanggal Dimakamkan</label>
                                            <input type="datetime-local" class="form-control" id="tanggal_dimakamkan"
                                                name="tanggal_dimakamkan" placeholder="Tanggal Dimakamkan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-cardno-input">Luas Lahan</label>
                                            <input type="text" class="form-control" id="luas_lahan" name="luas_lahan"
                                                placeholder="Luas Lahan Makam">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-card-verification-input">Nama TPU</label>
                                            <input type="text" class="form-control" id="nama_tpu" name="nama_tpu"
                                                placeholder="Nama TPU">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-card-verification-input">Blok TPU</label>
                                            <input type="text" class="form-control" id="blok_tpu" name="blok_tpu"
                                                placeholder="Blok TPU">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="verticalnav-card-verification-input">Nomor TPU</label>
                                            <input type="text" class="form-control" id="nomor_tpu" name="nomor_tpu"
                                                placeholder="Nomor TPU">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="verticalnav-expiration-input">Nama yang Ditumpang</label>
                                            <input type="text" class="form-control" id="nama_ditumpang"
                                                name="nama_ditumpang" placeholder="Nama yang Ditumpang">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- retribusi -->
                            <h3>Retribusi</h3>

                            <div>
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>Kode Rekening</th>
                                        <th>Uraian</th>
                                        <th>Nominal</th>
                                        <th>Opsi</th>
                                    </tr>
                                    <?php if(isset($data->retribusi)): ?>
                                        <?php
                                            $i = 1;
                                        ?>
                                        <?php $__currentLoopData = $data->retribusi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" name="retriID" value="<?php echo e($item->id); ?>">
                                            <tr>
                                                <td><input value="<?php echo e($item->korek); ?>" type="text"
                                                        name="retribusi[0][korek]" placeholder="Kode Rekening"
                                                        class="form-control" /></td>
                                                <td><input value="<?php echo e($item->uraian); ?>" type="text"
                                                        name="retribusi[0][uraian]" placeholder="Uraian"
                                                        class="form-control" /></td>
                                                <td><input value="<?php echo e($item->nominal); ?>" type="text"
                                                        name="retribusi[0][nominal]" placeholder="Nominal"
                                                        class="form-control" /></td>
                                                <td><button type="button" name="add" id="dynamic-ar"
                                                        class="btn btn-outline-primary">Tambah</button></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td><input type="text" name="retribusi[0][korek]"
                                                    placeholder="Kode Rekening" class="form-control" /></td>
                                            <td><input type="text" name="retribusi[0][uraian]" placeholder="Uraian"
                                                    class="form-control" /></td>
                                            <td><input name="retribusi[0][nominal]" id="rp"
                                                    class="form-control" /></td>
                                            <td><button type="button" name="add" id="dynamic-ar"
                                                    class="btn btn-outline-primary">Tambah</button></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                        </div>
                    </form>

                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
        <script>
             var dengan_rupiah = document.getElementById('rp');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
    }
        </script>
        <script>
            <?php if($errors->any()): ?>
                Swal.fire({
                    title: 'Error!',
                    text: '<?php echo e(implode('', $errors->all(':message'))); ?>',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            <?php endif; ?>
            <?php if(session()->has('message')): ?>
                swal.fire({
                    title: 'Simpan Data',
                    text: '<?php echo e(session('message')); ?>',
                    icon: 'success',
                    timer: 3000,
                });
            <?php endif; ?>
        </script>
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function() {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><input type="text" name="retribusi[' + i +
                    '][korek]" placeholder="Kode Rekening" class="form-control" /></td><td><input type="text" name="retribusi[' +
                    i +
                    '][uraian]" placeholder="Uraian" class="form-control" /></td><td><input name="retribusi[' +
                    i +
                    '][nominal]" placeholder="Nominal" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
            });
            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
            });
        </script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: "GET",
                    url: window.location.href,
                    dataType: 'json',
                    success: function(res) {
                        $('#regId').val(res.id);
                        $('#awID').val(res.ahliwaris.id);
                        $('#makamID').val(res.makam.id);

                        $('#nama').val(res.ahliwaris.nama);
                        $('#nik1').val(res.ahliwaris.nik1);
                        $('#tempat_lahir1').val(res.ahliwaris.tempat_lahir1);
                        $('#tanggal_lahir1').val(res.ahliwaris.tanggal_lahir1);
                        $('#jenis_kelamin1').find('option[value="' + res.ahliwaris.jenis_kelamin1 + '"]')
                            .prop('selected', true);
                        $('#agama1').val(res.ahliwaris.agama1);
                        $('#pekerjaan1').val(res.ahliwaris.pekerjaan1);
                        $('#alamat1').val(res.ahliwaris.alamat1);

                        $('#nama_meninggal').val(res.nama_meninggal);
                        $('#nik2').val(res.nik2);
                        $('#tempat_lahir2').val(res.tempat_lahir1);
                        $('#tanggal_lahir2').val(res.tanggal_lahir2);
                        $('#jenis_kelamin2').find('option[value="' + res.jenis_kelamin2 + '"]').prop(
                            'selected', true);
                        $('#agama2').val(res.agama2);
                        $('#pekerjaan2').val(res.pekerjaan2);
                        $('#hubungan').val(res.hubungan);
                        $('#alamat2').val(res.alamat2);

                        $('#tanggal_meninggal').val(res.makam.tanggal_meninggal);
                        $('#tanggal_dimakamkan').val(res.makam.tanggal_dimakamkan);
                        $('#luas_lahan').val(res.makam.luas_lahan);
                        $('#nama_tpu').val(res.makam.nama_tpu);
                        $('#blok_tpu').val(res.makam.blok_tpu);
                        $('#nomor_tpu').val(res.makam.nomor_tpu);
                        $('#nama_ditumpang').val(res.makam.nama_ditumpang);














                    }
                });

            });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\resources\views/pages/registrasi/form.blade.php ENDPATH**/ ?>