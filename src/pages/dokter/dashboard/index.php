<?php
include '../../../config/koneksi.php';

function queryTotal($mysqli, $tableName): string
{
    $data = mysqli_query($mysqli, "SELECT COUNT(*) AS total_data FROM $tableName");
    $result = mysqli_fetch_assoc($data);
    $totalData = $result['total_data'];
    return $totalData;
}
?>

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