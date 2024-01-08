<?php
session_start();

$dokter_id = $_SESSION['id']
?>
<!-- Table Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 ">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Periksa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Periksa</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end Table Header -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-dark">List Pasien</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Hari</th>
                    <th>Keluhan</th>
                    <th>No Antrian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT PERIKSA.id, PERIKSA.id_daftar_poli, PASIEN.nama_pasien as nama_pasien, PERIKSA.tgl_periksa, PERIKSA.catatan, PERIKSA.biaya_periksa, DAFTAR_POLI.keluhan, DAFTAR_POLI.no_antrian, JADWAL_PERIKSA.id_dokter, DOKTER.nama_dokter, POLI.nama_poli, JADWAL_PERIKSA.jam_mulai, JADWAL_PERIKSA.jam_selesai
                FROM periksa AS PERIKSA
                JOIN daftar_poli AS DAFTAR_POLI ON PERIKSA.id_daftar_poli = DAFTAR_POLI.id
                JOIN pasien AS PASIEN ON DAFTAR_POLI.id_pasien = PASIEN.id
                JOIN jadwal_periksa AS JADWAL_PERIKSA ON DAFTAR_POLI.id_jadwal = JADWAL_PERIKSA.id
                JOIN dokter AS DOKTER ON JADWAL_PERIKSA.id_dokter = DOKTER.id
                JOIN poli AS POLI ON DOKTER.id_poli = POLI.id
                WHERE DOKTER.id = $dokter_id";

                $no = 1;
                $resultPasien = mysqli_query($mysqli, $sql);
                $rowCount = mysqli_num_rows($resultPasien);

                if ($rowCount > 0) {
                    while ($row = mysqli_fetch_assoc($resultPasien)) {
                ?>
                        <tr class="text-center">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nama_pasien']; ?></td>
                            <td><?php echo $row['tgl_periksa'] ? $row['tgl_periksa'] : "Belum periksa"; ?></td>
                            <td><?php echo $row['keluhan'] ?></td>
                            <td><?php echo $row['no_antrian'] ?></td>

                            <td class='d-flex align-items-center justify-content-center'>
                                <button type='button' class='btn btn-sm btn-primary edit-btn mx-1' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>'>Periksa</button>
                                <!-- Modal Edit Obat  -->
                                <div class='modal fade' id='myModal<?php echo $row['id']; ?>' tabindex="-1" role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <!-- Modal content-->
                                        <div class='modal-content'>
                                            <div class='modal-header bg-primary'>
                                                <h5 class='modal-title' id='editModalLabel'>Detail Periksa</h5>
                                                <button type='button text-white' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>
                                                <table class="table table-hover text-nowrap">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left">Nama Poliklinik </td>
                                                            <td>:</td>
                                                            <td class="text-left"><?php echo $row['nama_poli']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Nama Dokter </td>
                                                            <td>:</td>

                                                            <td class="text-left"><?php echo $row['nama_dokter']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Hari </td>
                                                            <td>:</td>

                                                            <td class="text-left"><?php echo $row['tgl_periksa']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Jam Praktek </td>
                                                            <td>:</td>

                                                            <td class="text-left"><?php echo $row['jam_mulai']; ?> <span> - </span>  <?php echo $row['jam_selesai']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">No Antrian</td>
                                                            <td>:</td>

                                                            <td class="text-left"><?php echo $row['nama_poli']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Modal Edit Obat -->
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>