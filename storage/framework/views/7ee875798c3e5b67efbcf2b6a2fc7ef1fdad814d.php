

<?php $__env->startSection('title'); ?> SIM-TPU Kab. Cianjur <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> SIM-TPU <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Dashboard <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php echo json_encode($retribusi, 15, 512) ?>
<div class="row">
<div class="col">
    <div id="main" class="e-charts"></div>
</div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script charset="utf-8" src="https://cdn.jsdelivr.net/npm/echarts@5.1.2/dist/echarts.min.js"></script>
<script>
    var chartDom = document.getElementById('main');
    var myChart = echarts.init(chartDom, 'dark');
    var option = {
        tooltip: {
            trigger: 'axis',
            axisPointer: {
            type: 'cross',
            crossStyle: {
                color: '#999'
            }
            }
        },
        toolbox: {
            feature: {
            dataView: { show: true, readOnly: false },
            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
            }
        },
        legend: {
            data: ['Evaporation', 'Precipitation', 'Temperature']
        },
        xAxis: [
            {
            type: 'category',
            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            axisPointer: {
                type: 'shadow'
            }
            }
        ],
        yAxis: [
            {
            type: 'value',
            name: 'Precipitation',
            min: 0,
            max: 250,
            interval: 50,
            axisLabel: {
                formatter: '{value} ml'
            }
            },
            {
            type: 'value',
            name: 'Temperature',
            min: 0,
            max: 25,
            interval: 5,
            axisLabel: {
                formatter: '{value} °C'
            }
            }
        ],
        series: [
            {
            name: 'Evaporation',
            type: 'bar',
            tooltip: {
                valueFormatter: function (value) {
                return value + ' ml';
                }
            },
            data: [
                100,1010,200,300
            ]
            },
            {
            name: 'Precipitation',
            type: 'bar',
            tooltip: {
                valueFormatter: function (value) {
                return value + ' ml';
                }
            },
            data: [
                122,232,252,656
            ]
            },
            {
            name: 'Temperature',
            type: 'line',
            yAxisIndex: 1,
            tooltip: {
                valueFormatter: function (value) {
                return value + ' °C';
                }
            },
            data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
            }
        ]
    };

myChart.setOption(option);

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Repo\simtpu-v2\resources\views/pages/statistik/chart.blade.php ENDPATH**/ ?>