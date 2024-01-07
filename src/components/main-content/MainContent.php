<?php
include '../../config/koneksi.php';

function queryTotal($mysqli, $tableName): string
{
    $data = mysqli_query($mysqli, "SELECT COUNT(*) AS total_data FROM $tableName");
    $result = mysqli_fetch_assoc($data);
    $totalData = $result['total_data'];
    return $totalData;
}
?>

<div class="wrapper">
    <section class="content">
        <!-- Container -->
        <div class="container-fluid">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 ">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Pasien Aktif Card -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card py-2 px-3 shadow border-0">
                        <div class=" d-flex justify-content-between align-items-center">
                            <span class=" text-secondary">Pasien Aktif</span>
                            <span class="info-box-icon bg-info elevation-1 p-2 rounded-lg"><i class="fas fa-solid fa-users" style="color: #ffffff;"></i></i></span>
                        </div>
                        <div class="body">
                            <span class="info-box-number font-weight-bold display-4">
                                <?= queryTotal($mysqli, "pasien"); ?>
                            </span>
                        </div>
                        <div class="footer">
                            <span class="text-secondary">
                                0% - 1 Hari
                        </div>
                    </div>
                </div>

                <!-- Dokter Aktif Card -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card py-2 px-3 shadow border-0">
                        <div class=" d-flex justify-content-between align-items-center">
                            <span class=" text-secondary">Dokter Aktif</span>
                            <span class="info-box-icon bg-danger elevation-1 p-2 rounded-lg"><i class="fas fa-solid fa-stethoscope" style="color: #ffffff;"></i></span>
                        </div>
                        <div class="body">
                            <span class="info-box-number font-weight-bold display-4"><?= queryTotal($mysqli, "dokter"); ?></span>
                        </div>
                        <div class="footer">
                            <span class="text-secondary">
                                0% - 1 Hari
                        </div>
                    </div>
                </div>

                <!-- Obat Card -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card py-2 px-3 shadow border-0">
                        <div class=" d-flex justify-content-between align-items-center">
                            <span class=" text-secondary">Obat</span>
                            <span class="info-box-icon bg-success elevation-1 p-2 rounded-lg"><i class="fas fa-solid fa-tablets"></i></span>
                        </div>
                        <div class="body">
                            <span class="info-box-number font-weight-bold display-4"><?= queryTotal($mysqli, "obat"); ?></span>
                        </div>
                        <div class="footer">
                            <span class="text-secondary">
                                0% - 1 Hari
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Jadwal Pemeriksaan Card -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card py-2 px-3 shadow border-0">
                        <div class=" d-flex justify-content-between align-items-center">
                            <span class=" text-secondary">Jadwal Pemeriksaan</span>
                            <span class="info-box-icon bg-success elevation-1 p-2 rounded-lg"><i class="fas fa-solid fa-clock" style="color: #ffffff"></i></span>
                        </div>
                        <div class="body">
                            <span class="info-box-number font-weight-bold display-4"><?= queryTotal($mysqli, "jadwal_periksa"); ?></span>
                        </div>
                        <div class="footer">
                            <span class="text-secondary">
                                0% - 1 Hari
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>

        <div class="content container-fluid">
            <div class="row">
                <!-- Statistik -->
                <!-- <div class="col-lg-9 col-sm-6 col-md-3">
                        <div class="card shadow border-0">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Online Store Visitors</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">820</span>
                                        <span>Visitors Over Time</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="visitors-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> This Week
                                    </span>

                                    <span>
                                        <i class="fas fa-square text-gray"></i> Last Week
                                    </span>
                                </div>
                            </div>
                    </div>
                </div> -->
                <!-- End Card -->

                <!-- Poliklinik Card -->
                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="card py-2 px-3 shadow border-0">
                        <div class=" d-flex justify-content-between align-items-center">
                            <span class=" text-secondary">Poliklinik</span>
                            <span class="info-box-icon bg-success elevation-1 p-2 rounded-lg"><i class="fas fa-solid fa-hospital" style="color: #ffffff"></i></span>
                        </div>
                        <div class="body">
                            <span class="info-box-number font-weight-bold display-4"><?= queryTotal($mysqli, "poli"); ?></span>
                        </div>
                        <div class="footer">
                            <span class="text-secondary">
                                0% - 1 Hari
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Antrian Card -->
                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="card py-2 px-3 shadow border-0 ">
                        <div class=" d-flex justify-content-between align-items-center">
                            <span class=" text-secondary">Antrian</span>
                            <span class="info-box-icon bg-success elevation-1 p-2 rounded-lg"><i class="fa-regular fa-hourglass-half" style="color: #ffffff;"></i></span>
                        </div>
                        <div class="body">
                            <span class="info-box-number font-weight-bold display-4"><?= queryTotal($mysqli, "poli"); ?></span>
                        </div>
                        <div class="footer">
                            <span class="text-secondary">
                                0% - 1 Hari
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
    </section>
</div>