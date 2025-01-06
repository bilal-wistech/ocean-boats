<script>
    $(document).ready(function () {
        new ApexCharts(document.querySelector('#revenue-chart'), {
            series: <?php echo json_encode($revenues('value'), 15, 512) ?>,
            colors: <?php echo json_encode($revenues('color'), 15, 512) ?>,
            chart: {height: '250', type: 'donut'},
            chartOptions: {labels: <?php echo json_encode($revenues('label'), 15, 512) ?>},
            plotOptions: {pie: {donut: {size: '71%', polygons: {strokeWidth: 0}}, expandOnClick: true}},
            states: {hover: {filter: {type: 'darken', value: .9}}},
            dataLabels: {enabled: false},
            legend: {show: false},
            tooltip: {enabled: false}
        }).render();

        new ApexCharts(document.querySelector('#sales-report-chart'), {
            series: <?php echo json_encode($salesReport['series'], 15, 512) ?>,
            chart: {height: 350, type: 'area', toolbar: {show: false}},
            dataLabels: {enabled: false},
            stroke: {curve: 'smooth'},
            colors: <?php echo json_encode($salesReport['colors'], 15, 512) ?>,
            xaxis: {
                type: 'datetime',
                categories: <?php echo json_encode($salesReport['dates'], 15, 512) ?>
            },
            tooltip: {x: {format: 'dd/MM/yy'}},
            noData: {
                text: '<?php echo e(trans('core/base::tables.no_data')); ?>',
            }
        }).render()
    })
</script>
<?php /**PATH /home/oceanboats/public_html/platform/plugins/ecommerce/resources/views/reports/widgets/chart-script.blade.php ENDPATH**/ ?>