<?php $__env->startSection('title'); ?> SIM-TPU Kab. Cianjur <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> SIM-TPU <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Dashboard <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Retribusi</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>Rp<?php echo e(number_format($retribusi,'2',',','.')); ?><i class="mdi <?php echo e($persentase > 0 ? 'mdi-chevron-up ms-1 text-success' : 'mdi-chevron-down ms-1 text-danger'); ?>"></i></h4>
                            <div class="d-flex">
                                <span class="badge <?php echo e($persentase > 0 ? 'badge-soft-success' : 'badge-soft-danger'); ?> font-size-12"><?php echo e($persentase > 0 ? '+' : ''); ?><?php echo e(number_format($persentase)); ?>% </span> <span class="ms-2 text-truncate">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Herregistrasi</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>Rp0 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                            <div class="d-flex">
                                <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Makam</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4><?php echo e($makam->count()); ?><i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                            <div class="d-flex">
                                <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <h3>Statistik Pemakaman</h3>
    <div class="col-lg-6">
        <select class="form-control" name="tahun" id="tahun">
            <option value="2021" href="javascript:void(0)" onclick="tahun('2021')" selected>2021</option>
            <option value="2020" href="javascript:void(0)" onclick="tahun('2020')">2020</option>
            <option value="2019" href="javascript:void(0)" onclick="tahun('2019')">2019</option>
        </select>
        <canvas id="chart-0"></canvas>
    </div>
    <div class="col-lg-6">
       <?php $__currentLoopData = $tpu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <ul>
            <li> <?php echo e($item->nama_tpu); ?></li>
          </ul>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
<script src="https://www.chartjs.org/samples/2.6.0/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script>
   
var url = '<?php echo e(route('chart')); ?>';
function tahun(tahun) {
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            "tahun": tahun,
        },
        dataType: 'json',
        success: function (res) {
            var options = {
                legend: {
                    display: true,
                    fillStyle: "red",

                    labels: {
                        boxWidth: 0,
                        fontSize: 24,
                        fontColor: "black",
                    }
                },
                scales: {
                    xAxes: [{
                        stacked: false,
                        scaleLabel: {
                            display: true,
                            labelString: 'Bulan'
                        },
                    }],
                    yAxes: [{
                        stacked: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Makam'
                        },
                        ticks: {
                            // Shorthand the millions

                        }
                    }]
                },
                /*end scales */
                plugins: {
                    datalabels: {
                        formatter: Math.round,
                        color: 'black',
                        font: {
                            size: 10
                        }
                    }
                }
            };
            var dataObjects = [res.makam]
            var data = {
                labels: dataObjects[0].label,
                datasets: [{
                    label: [tahun],
                    data: dataObjects[0].data,
                    /* global setting */
                    backgroundColor: [
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',
                        'rgba(0, 255, 96, 0.8)',

                    ],
                    borderWidth: 1
                }]
            };
            var chart = new Chart('chart-0', {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: data,
                options: options
            });
            chart.update();
            console.log(res);
        },
        error: function (res) {

        }
    });
}          
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/simtpuv2/resources/views/index.blade.php ENDPATH**/ ?>