
<div id="analisis" class="container bg-white">

    <?php 
    include_once 'analisis_table.php';
    ?>

    <div class="root">
        <div id="loading-chart" class="my-3 h3 fw-bold text-secondary text-center">Loading...</div>
        <div class="canvas-group">
            <h6 class="py-3 border-top border-bottom text-center fw-light mt-1"><i class="bi bi-graph-up-arrow"></i> UNASMAN</h6>
            <div class="row">
                <div class="col-md-10 col-sm-12">

                    <canvas class="my-4 w-100" id="myChart-unasman" width="900" height="380"></canvas>
                </div>
                <div class="col-md-2 col-sm-12">

                    <div id="table-unasman"></div>
                </div>
            </div>
            <h6 class="py-3 border-top border-bottom text-center fw-light mt-1"><i class="bi bi-graph-up-arrow"></i> POLEWALI MANDAR</h6>
            <div class="row">
                <div class="col-md-10 col-sm-12">
                    <canvas class="my-4 w-100" id="myChart-polewali" width="900" height="380"></canvas>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div id="table-polewali"></div>
                </div>
            </div>
            <h6 class="py-3 border-top border-bottom text-center fw-light mt-1"><i class="bi bi-graph-up-arrow"></i> SULAWESI BARANG</h6>
            <div class="row">
                <div class="col-md-10 col-sm-12">
                    <canvas class="my-4 w-100" id="myChart-sulbar" width="900" height="380"></canvas>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div id="table-sulbar"></div>
                </div>
            </div>

        </div>
    </div>

</div>
