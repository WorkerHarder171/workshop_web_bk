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
                    <th>Tanggal Periksa</th>
                    <th>Keluhan</th>
                    <th>No Antrian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT PERIKSA.id, PERIKSA.id_daftar_poli, PASIEN.nama_pasien as nama_pasien, PERIKSA.tgl_periksa, PERIKSA.catatan, PERIKSA.biaya_periksa, DAFTAR_POLI.keluhan, DAFTAR_POLI.no_antrian, JADWAL_PERIKSA.id_dokter, DOKTER.nama_dokter, POLI.nama_poli, JADWAL_PERIKSA.jam_mulai, JADWAL_PERIKSA.jam_selesai,JADWAL_PERIKSA.hari
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
                            <td><?php echo $row['hari']; ?></td>
                            <td><?php echo $row['tgl_periksa'] ? $row['tgl_periksa'] : "Belum periksa"; ?></td>
                            <td><?php echo $row['keluhan'] ?></td>
                            <td><?php echo $row['no_antrian'] ?></td>

                            <td class='d-flex align-items-center justify-content-center'>
                                <?php
                                if ($row['tgl_periksa'] == null) {
                                ?>
                                    <button type='button' class='btn btn-sm btn-primary edit-btn mx-1' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>'>Periksa</button>
                                <?php
                                } else {
                                ?>
                                    <button type='button' class='btn btn-sm btn-primary edit-btn mx-1' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>'>Detail</button>
                                <?php
                                }
                                ?>
                                <!-- Modal Edit Obat  -->
                                <?php
                                if ($row['tgl_periksa'] == null) {
                                ?>
                                    <div class='modal fade' id='myModal<?php echo $row['id']; ?>' tabindex="-1" role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <!-- Modal content-->
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='editModalLabel'>Detail Periksa</h5>
                                                    <button type='button text-white' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form action='./periksa-pasien/UpdatePeriksa.php' class="text-left" method='post'>
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <div class='form-group'>
                                                            <label for='nama_pasien'>Nama Pasien</label>
                                                            <input type='text' class='form-control' id='nama_pasien' name='nama_pasien' value='<?php echo $row["nama_pasien"]; ?>' disabled required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='tgl_periksa'>Tanggal Periksa</label>
                                                            <input type="datetime-local" class="form-control" id="tgl_periksa" name="tgl_periksa" required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='keluhan'>Keluhan</label>
                                                            <input type="text" class="form-control" name="keluhan" id="keluhan" value="<?php echo $row['keluhan']; ?>" disabled />
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='no_antrian'>No Antrian</label>
                                                            <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="<?php echo $row['no_antrian']; ?>" disabled />
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='catatan'>catatan</label>
                                                            <input type="text" class="form-control" id="catatan" name="catatan" required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='obat'>Obat</label>
                                                               <select class="js-example-basic-multiple form-control" name="obat">
                                                                <?php
                                                                $queryObat = "SELECT * FROM obat";
                                                                $resultObat = mysqli_query($mysqli, $queryObat);

                                                                while ($obat = mysqli_fetch_assoc($resultObat)) {
                                                                ?>
                                                                    <option value="<?= $obat['id']; ?>|<?= $obat['harga'] ?>">
                                                                        <?= $obat['nama_obat']; ?> - <?= $obat['kemasan']; ?> - Rp.<?= $obat['harga']; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select> 
                                                        </div>
                                                        <button type='submit' class='btn btn-primary' name='update'>Periksa</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Modal Edit Obat -->
                                <?php
                                } else {
                                ?>
                                    <div class='modal fade' id='myModal<?php echo $row['id']; ?>' tabindex="-1" role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <!-- Modal content-->
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='editModalLabel'>Detail Periksa</h5>
                                                    <button type='button text-white' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form action='./periksa-pasien/UpdatePeriksa.php' class="text-left" method='post'>
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <div class='form-group'>
                                                            <label for='nama_pasien'>Nama Pasien</label>
                                                            <input type='text' class='form-control' id='nama_pasien' name='nama_pasien' value='<?php echo $row["nama_pasien"]; ?>' disabled required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='tgl_periksa'>Tanggal Periksa</label>
                                                            <input type="datetime-local" class="form-control" id="tgl_periksa" name="tgl_periksa" value='<?php echo $row["tgl_periksa"]; ?>' disabled required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='keluhan'>Keluhan</label>
                                                            <input type="text" class="form-control" name="keluhan" id="keluhan" value="<?php echo $row['keluhan']; ?>" disabled />
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='no_antrian'>No Antrian</label>
                                                            <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="<?php echo $row['no_antrian']; ?>" disabled />
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='catatan'>catatan</label>
                                                            <input type="text" class="form-control" id="catatan" name="catatan" value='<?php echo $row["catatan"]; ?>' disabled required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='obat'>Obat</label>
                                                               <select class="js-example-basic-multiple form-control" name="obat" disabled>
                                                                <?php
                                                                $queryObat = "SELECT * FROM obat";
                                                                $resultObat = mysqli_query($mysqli, $queryObat);
                                                                while ($obat = mysqli_fetch_assoc($resultObat)) {
                                                                ?>
                                                                    <?php
                                                                    $selected = ($obats['id'] == $row['id_obat']) ? 'selected' : '';
                                                                    ?>
                                                                    <option value="<?= $obat['id']; ?>|<?= $obat['harga'] ?>">
                                                                        <?= $obat['nama_obat']; ?> - <?= $obat['kemasan']; ?> - Rp.<?= $obat['harga']; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select> 
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Modal Edit Obat -->
                                <?php
                                }
                                ?>
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