<?php
session_start();

$pasien_id = $_SESSION['id'];
$no_rm = $_SESSION['no_rm'];
?>

<div class="d-flex flex-column align-items-center">
    <div class="form-daftar w-100">
        <div class="card border rounded-lg w-100" style="background-color: white; overflow: hidden;">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white">Daftar Poliklinik</h3>
            </div>
            <form action="../pasien/dashboard/TambahPeriksa.php" method="POST" class="py-2 px-3">
                <input type="hidden" value="<?php echo $pasien_id; ?>" name="id_pasien">
                <div class="form-group my-2">
                    <label for="no_rm">Nomor Rekam Medis</label>
                    <input class="w-100 px-4 rounded-lg border form-control" type="text" name="no_rm" id="no_rm" value="<?php echo $no_rm ?>" disabled required>
                </div>
                <div class="form-group my-2">
                    <label for="no_rm">Pilih Poliklinik</label>
                    <select class="form-control" id="poliklinik" name="poliklinik" required>
                        <?php
                        $queryPoli = "SELECT * FROM poli";
                        $resultPoli = mysqli_query($mysqli, $queryPoli);
                        while ($rowPoli = mysqli_fetch_assoc($resultPoli)) {
                            echo "<option value='{$rowPoli['id']}'>{$rowPoli['nama_poli']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group my-2">
                    <label for="no_rm">Pilih Jadwal</label>
                    <select class="form-control" id="jadwal" name="jadwal" required>
                        <?php
                        $queryJadwal = "SELECT jadwal_periksa.id, dokter.nama_dokter AS nama_dokter, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai
                        FROM jadwal_periksa
                        JOIN dokter ON jadwal_periksa.id_dokter = dokter.id";
                        $resultJadwal = mysqli_query($mysqli, $queryJadwal);

                        while ($rowJadwal = mysqli_fetch_assoc($resultJadwal)) {
                            $namaDokter = $rowJadwal['nama_dokter'];
                            $hari = $rowJadwal['hari'];
                            $jamMulai = $rowJadwal['jam_mulai'];
                            $jamSelesai = $rowJadwal['jam_selesai'];
                            echo "<option value='{$rowJadwal['id']}'>{$namaDokter} | {$hari} | {$jamMulai} - {$jamSelesai}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-floating">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control" placeholder="Tuliskan keluhan anda" id="keluhan" name="keluhan" style="height: 100px" required></textarea>
                </div>
                <div class="mt-3 form-group d-flex justify-content-end align-items-center">
                    <button type="submit" class="w-auto px-4 btn btn-block rounded-2 text-white bg-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="riwayat-daftar w-100">
        <div class="card w-100">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white">Riwayat Pendaftaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Poliklinik</th>
                            <th>Dokter</th>
                            <th>Hari</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Antrian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT DAFTAR_POLI.id, DAFTAR_POLI.id_pasien, POLI.nama_poli, DOKTER.nama_dokter, JADWAL_PERIKSA.hari, JADWAL_PERIKSA.jam_mulai, JADWAL_PERIKSA.jam_selesai, DAFTAR_POLI.no_antrian
                        FROM daftar_poli AS DAFTAR_POLI
                        JOIN pasien AS PASIEN ON DAFTAR_POLI.id_pasien = PASIEN.id
                        JOIN jadwal_periksa AS JADWAL_PERIKSA ON DAFTAR_POLI.id_jadwal = JADWAL_PERIKSA.id
                        JOIN dokter AS DOKTER ON JADWAL_PERIKSA.id_dokter = DOKTER.id
                        JOIN poli AS POLI ON DOKTER.id_poli = POLI.id
                        WHERE  DAFTAR_POLI.id_pasien = $pasien_id";
                        $no = 1;
                        $resultPendaftaran = mysqli_query($mysqli, $sql);
                        while ($row = mysqli_fetch_assoc($resultPendaftaran)) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_poli']; ?></td>
                                <td><?php echo $row['nama_dokter'] ?></td>
                                <td><?php echo $row['hari'] ?></td>
                                <td><?php echo $row['jam_mulai'] ?></td>
                                <td><?php echo $row['jam_selesai'] ?></td>
                                <td><?php echo $row['no_antrian'] ?></td>

                                <td class='d-flex align-items-center justify-content-center'>
                                    <button type='button' class='btn btn-sm btn-primary edit-btn mx-1' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>'>
                                        Detail
                                    </button>
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
                                                                <td class="text-left"><?php echo $row['hari']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">Jam Praktek </td>
                                                                <td>:</td>
                                                                <td class="text-left"><?php echo $row['jam_mulai']; ?> <span> - </span> <?php echo $row['jam_selesai']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">No Antrian</td>
                                                                <td>:</td>
                                                                <td class="text-left"><?php echo $row['no_antrian']; ?></td>
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
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>