@extends('layouts.master')

@section('title') SIM-TPU Kab. Cianjur @endsection
@section('css')
<style>

</style>
@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') SIM-TPU @endslot
        @slot('title') Dashboard @endslot
    @endcomponent
<p>Jumlah Retribusi: {{$retribusi}}</p>
<p>Jumlah Registrasi Pemakaman: {{$registrasi->count()}}</p>
<p>Jumlah Makam: {{$makam->count()}}</p>
<p>Jumlah Registrasi tahun 2021: {{$subTahun1}}</p>
<p>Jumlah Registrasi tahun 2020: {{$subTahun2}}</p>
<p>Jumlah Registrasi tahun 2019: {{$subTahun3}}</p>
<div class="row">
    <div class="col">
        <select name="tahun" id="tahun">
            <option value="" selected>Pilih Tahun</option>
            <option value="2020" href="javascript:void(0)" onclick="tahun('2020')">2020</option>
            <option value="2019" href="javascript:void(0)" onclick="tahun('2019')">2019</option>
        </select>
      </div>
      <canvas id="chart-0"></canvas>
</div>
@endsection
@section('script')
<script src="https://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
<script src="https://www.chartjs.org/samples/2.6.0/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script>
   
var url = '{{ route('chart') }}';
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
                            labelString: 'Juta'
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
            var dataObjects = [res]
            var data = {
                labels: dataObjects[0].label,
                datasets: [{
                    label: [tahun],
                    data: dataObjects[0].data,
                    /* global setting */
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
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
@endsection
