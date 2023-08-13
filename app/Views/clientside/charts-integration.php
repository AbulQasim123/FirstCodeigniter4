<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Google charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('visualization', "1", {
        packages: ['corechart']
    });
</script>

<div class="content-area">
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col">
                    <div class="card-title">Graph</div>
                </div>
            </div>
        </div>
        <div class="card-action" style="margin-top: -35px;">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active blue-text" href="#line_chart">Line</a></li>
                        <li class="tab col s3"><a class="blue-text" href="#pie_chart">Pie</a></li>
                        <li class="tab col s3"><a class="blue-text" href="#table_chart">Table</a></li>
                        <li class="tab col s3"><a class="blue-text" href="#bar_chart">Bar</a></li>
                    </ul>
                </div>
                <div id="line_chart" class="col s12">
                    <h5>Line Chart</h5>
                    <div id="line_year_wise"></div>
                </div>
                <div id="pie_chart" class="col s12">
                    <h5>Pie Chart</h5>
                    <div id="pie_year_wise"></div>
                </div>
                <div id="table_chart" class="col s12">
                    <h5>Table Chart</h5>
                    <div id="table_year_wise"></div>
                </div>
                <div id="bar_chart" class="col s12">
                    <h5>Bar Chart</h5>
                    <div id="bar_year_wise"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Line Charts
    google.charts.setOnLoadCallback(lineChart);

    function lineChart() {

        /* Define the chart to be drawn.*/
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Users Count'],
            <?php
            foreach ($year_wise_line as $row) {
                echo "['" . $row->year . "'," . $row->total . "],";
            }
            ?>
        ]);

        var options = {
            title: 'Year Wise Registered Users Of Line Chart',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.LineChart(document.getElementById('line_year_wise'));
        chart.draw(data, options);
    }


    // Bar Charts
    google.charts.setOnLoadCallback(barChart);

    function barChart() {

        /* Define the chart to be drawn.*/
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Users Count'],
            <?php
            foreach ($year_wise_bar as $row) {
                echo "['" . $row->year . "'," . $row->total . "],";
            }
            ?>
        ]);
        var options = {
            title: 'Year wise Registered Users Bar Chart',
            is3D: true,
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.BarChart(document.getElementById('bar_year_wise'));
        chart.draw(data, options);
    }

    // Pie Charts
    google.charts.setOnLoadCallback(yearWiseChart);

    function yearWiseChart() {

        /* Define the chart to be drawn.*/
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Users Count'],
            <?php
            foreach ($year_wise_pie as $row) {
                echo "['" . $row->year . "'," . $row->total . "],";
            }
            ?>
        ]);
        var options = {
            title: 'Year Wise Registered Users Pie Chart',
            is3D: true,
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.PieChart(document.getElementById('pie_year_wise'));
        chart.draw(data, options);
    }
</script>
<?= $this->endSection() ?>