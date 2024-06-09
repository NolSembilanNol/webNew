<?php include('./partials/upper_html.php') ?>

<div class="content">
    <!-- card -->
    <div class="container mt-5">
        <div class="row">
            <?php if($userData['capacity'] == 'admin') {?>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Jumlah User</div>
                    <div class="card-body">
                        <h5 class="card-title" id="user-count">0</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Jumlah Fasilitator</div>
                    <div class="card-body">
                        <h5 class="card-title" id="fasilitator-count">0</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Jumlah Faskes</div>
                    <div class="card-body">
                        <h5 class="card-title" id="faskes-count">0</h5>
                    </div>
                </div>
            </div>
            <?php } else {?>
                <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Jumlah Faskes</div>
                    <div class="card-body">
                        <h5 class="card-title" id="faskes-count">0</h5>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php include('./partials/lower_html.php') ?>
