<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
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
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatibus accusantium dolorem mollitia alias, quae voluptatum maiores dignissimos accusamus. Aliquid fugiat soluta aliquam eveniet placeat corrupti error deserunt? Vitae rem sed sapiente at porro, enim excepturi hic voluptatem quam a officiis incidunt quia illo officia ipsa placeat libero? Minus nulla et laudantium vero autem corporis.
                    </p>
                </div>
                <div id="pie_chart" class="col s12">
                    <h5>Pie Chart</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatibus accusantium dolorem mollitia alias, quae voluptatum maiores dignissimos accusamus. Aliquid fugiat soluta aliquam eveniet placeat corrupti error deserunt? Vitae rem sed sapiente at porro, enim excepturi hic voluptatem quam a officiis incidunt quia illo officia ipsa placeat libero? Minus nulla et laudantium vero autem corporis.
                    </p>
                </div>
                <div id="table_chart" class="col s12">
                    <h5>Table Chart</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatibus accusantium dolorem mollitia alias, quae voluptatum maiores dignissimos accusamus. Aliquid fugiat soluta aliquam eveniet placeat corrupti error deserunt? Vitae rem sed sapiente at porro, enim excepturi hic voluptatem quam a officiis incidunt quia illo officia ipsa placeat libero? Minus nulla et laudantium vero autem corporis.
                    </p>
                </div>
                <div id="bar_chart" class="col s12">
                    <h5>Bar Chart</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatibus accusantium dolorem mollitia alias, quae voluptatum maiores dignissimos accusamus. Aliquid fugiat soluta aliquam eveniet placeat corrupti error deserunt? Vitae rem sed sapiente at porro, enim excepturi hic voluptatem quam a officiis incidunt quia illo officia ipsa placeat libero? Minus nulla et laudantium vero autem corporis.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>