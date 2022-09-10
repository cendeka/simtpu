<?php $__env->startSection('title'); ?>
    SKRD Pemakaman
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            SKRD
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            SKRD Pemakaman
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="container" style="height: 200px;">
        <div class="row">
          <div class="col align-self-start">
            
          </div>
          <div class="col align-self-center">
            
          </div>
          <div class="col">
            <?php echo e($data->registrasi->created_at->format('m')); ?> <br> 
            <?php echo e(date('Y', strtotime($data->registrasi->created_at))); ?> <br>
            <?php echo e($data->registrasi->ahliwaris->nama); ?> <br>
            <?php echo e($data->registrasi->ahliwaris->alamat1); ?> 
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
          <div class="col align-self-start">
            <?php $__currentLoopData = $data->registrasi->retribusi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($item->korek); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="col align-self-center">
            <?php $__currentLoopData = $data->registrasi->retribusi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($item->uraian); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($data->registrasi->makam->nama_tpu); ?> <br>
          </div>
          <div class="col">
            <?php $__currentLoopData = $data->registrasi->retribusi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($item->nominal); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
    </div>
     <div class="container">
        <div class="row">
          <div class="col align-self-start">
           
          </div>
          <div class="col align-self-center">
            
          </div>
          <div class="col">
            <p>Rp<?php echo e(number_format($data->registrasi->retribusi->sum('nominal'), '2', ',', '.')); ?></p>
          </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row text-center" style="height: 100px;">
          <div class="col align-self-center">
            =========   <em><span id="terbilang"></span> Rupiah</em>  ===========
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center" style="height: 100px;">
            <div class="col"></div>
            <div class="col"></div>
          <div class="col align-self-center">
            Maret 2022
          </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center" style="height: 200px;">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col text-center" style="text-align: end">
                EDI MULYADI <br> NIP. 197006082008011004 
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var a = <?php echo e($data->registrasi->retribusi->sum('nominal')); ?>;
        function terbilang(a) {
            var bilangan = ['', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh',
                'Sebelas'
            ];

            // 1 - 11
            if (a < 12) {
                var kalimat = bilangan[a];
            }
            // 12 - 19
            else if (a < 20) {
                var kalimat = bilangan[a - 10] + ' Belas';
            }
            // 20 - 99
            else if (a < 100) {
                var utama = a / 10;
                var depan = parseInt(String(utama).substr(0, 1));
                var belakang = a % 10;
                var kalimat = bilangan[depan] + ' Puluh ' + bilangan[belakang];
            }
            // 100 - 199
            else if (a < 200) {
                var kalimat = 'Seratus ' + terbilang(a - 100);
            }
            // 200 - 999
            else if (a < 1000) {
                var utama = a / 100;
                var depan = parseInt(String(utama).substr(0, 1));
                var belakang = a % 100;
                var kalimat = bilangan[depan] + ' Ratus ' + terbilang(belakang);
            }
            // 1,000 - 1,999
            else if (a < 2000) {
                var kalimat = 'Seribu ' + terbilang(a - 1000);
            }
            // 2,000 - 9,999
            else if (a < 10000) {
                var utama = a / 1000;
                var depan = parseInt(String(utama).substr(0, 1));
                var belakang = a % 1000;
                var kalimat = bilangan[depan] + ' Ribu ' + terbilang(belakang);
            }
            // 10,000 - 99,999
            else if (a < 100000) {
                var utama = a / 100;
                var depan = parseInt(String(utama).substr(0, 2));
                var belakang = a % 1000;
                var kalimat = terbilang(depan) + ' Ribu ' + terbilang(belakang);
            }
            // 100,000 - 999,999
            else if (a < 1000000) {
                var utama = a / 1000;
                var depan = parseInt(String(utama).substr(0, 3));
                var belakang = a % 1000;
                var kalimat = terbilang(depan) + ' Ribu ' + terbilang(belakang);
            }
            // 1,000,000 - 	99,999,999
            else if (a < 100000000) {
                var utama = a / 1000000;
                var depan = parseInt(String(utama).substr(0, 4));
                var belakang = a % 1000000;
                var kalimat = terbilang(depan) + ' Juta ' + terbilang(belakang);
            } else if (a < 1000000000) {
                var utama = a / 1000000;
                var depan = parseInt(String(utama).substr(0, 4));
                var belakang = a % 1000000;
                var kalimat = terbilang(depan) + ' Juta ' + terbilang(belakang);
            } else if (a < 10000000000) {
                var utama = a / 1000000000;
                var depan = parseInt(String(utama).substr(0, 1));
                var belakang = a % 1000000000;
                var kalimat = terbilang(depan) + ' Milyar ' + terbilang(belakang);
            } else if (a < 100000000000) {
                var utama = a / 1000000000;
                var depan = parseInt(String(utama).substr(0, 2));
                var belakang = a % 1000000000;
                var kalimat = terbilang(depan) + ' Milyar ' + terbilang(belakang);
            } else if (a < 1000000000000) {
                var utama = a / 1000000000;
                var depan = parseInt(String(utama).substr(0, 3));
                var belakang = a % 1000000000;
                var kalimat = terbilang(depan) + ' Milyar ' + terbilang(belakang);
            } else if (a < 10000000000000) {
                var utama = a / 10000000000;
                var depan = parseInt(String(utama).substr(0, 1));
                var belakang = a % 10000000000;
                var kalimat = terbilang(depan) + ' Triliun ' + terbilang(belakang);
            } else if (a < 100000000000000) {
                var utama = a / 1000000000000;
                var depan = parseInt(String(utama).substr(0, 2));
                var belakang = a % 1000000000000;
                var kalimat = terbilang(depan) + ' Triliun ' + terbilang(belakang);
            } else if (a < 1000000000000000) {
                var utama = a / 1000000000000;
                var depan = parseInt(String(utama).substr(0, 3));
                var belakang = a % 1000000000000;
                var kalimat = terbilang(depan) + ' Triliun ' + terbilang(belakang);
            } else if (a < 10000000000000000) {
                var utama = a / 1000000000000000;
                var depan = parseInt(String(utama).substr(0, 1));
                var belakang = a % 1000000000000000;
                var kalimat = terbilang(depan) + ' Kuadriliun ' + terbilang(belakang);
            }

            var pisah = kalimat.split(' ');
            var full = [];
            for (var i = 0; i < pisah.length; i++) {
                if (pisah[i] != "") {
                    full.push(pisah[i]);
                }
            }
            return full.join(' ');
        }
                    $(document).ready(function() {
                        $('#terbilang').html(terbilang(a));
                    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/pages/print/retribusi.blade.php ENDPATH**/ ?>