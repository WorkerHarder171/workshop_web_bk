<div class="d-flex">
    <div class="col-4">
        <div class="card border rounded-lg" style="background-color: white; overflow: hidden;">
            <div class="card-header" style="background-color: #48829E;">
                <h3 class="card-title text-white">Daftar Poliklinik</h3>
            </div>
            <form action="daftarPeriksa/tambahPeriksa.php" method="POST" class="py-2 px-3">
                <div class="form-group my-2">
                    <label for="no_rm">Nomor Rekam Medis</label>
                    <input class="w-100 px-4 rounded-lg border page-link" type="text" name="no_rm" id="no_rm" placeholder="202312-001" disabled required>
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
                        $queryJadwal = "SELECT jadwal_periksa.id, dokter.nama AS nama_dokter, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai
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
                    <textarea class="form-control" placeholder="Tuliskan keluhan anda" id="keluhan" name="keluhan" style="height: 100px"></textarea>
                </div>
                <div class="mt-3 form-group d-flex justify-content-end align-items-center">
                    <button style="background-color: #48829E;" type="submit" class="w-auto px-4 btn btn-block rounded-2 text-white">Daftar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-8">
        <div class="card">
            <div class="card-header" style="background-color: #48829E;">
                <h3 class="card-title text-white">Riwayat Pendaftaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
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
                    </tbody>
                    <script>
                    </script>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>