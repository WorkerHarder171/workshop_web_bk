<?php
session_start();
$dokter_id = $_SESSION['id'];
$nama_dokter = $_SESSION['username'];
?>

<!-- Modal Tambah Data Obat -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data obat disini -->
                <form action="./jadwal/TambahJadwal.php" method="post">
                    <div class="form-group">
                        <label for="nama_dokter">Dokter</label>
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?php echo $nama_dokter ?>" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select class="form-control" id="hari" name="hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tambah Obat -->

<!-- Table Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 ">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Jadwal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end Table Header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- card -->
                <div class="card">

                    <!-- card header -->
                    <div class="card-header">
                        <h3 class="card-title">List Jadwal</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#addModal">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <!-- end card header -->
                    <!-- card body -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Poliklinik</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT JADWAL_PERIKSA.id, JADWAL_PERIKSA.hari, JADWAL_PERIKSA.jam_mulai, JADWAL_PERIKSA.jam_selesai ,POLI.nama_poli
                                FROM jadwal_periksa as JADWAL_PERIKSA
                                JOIN dokter as DOKTER ON JADWAL_PERIKSA.id_dokter =DOKTER.id
                                JOIN poli as POLI ON DOKTER.id_poli = POLI.id
                                WHERE DOKTER.id= $dokter_id";
                                $no = 1;
                                $result = mysqli_query($mysqli, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nama_poli']; ?></td>
                                        <td><?php echo $row['hari'] ?></td>
                                        <td><?php echo $row['jam_mulai'] ?></td>
                                        <td><?php echo $row['jam_selesai'] ?></td>
                                        <td class='d-flex align-items-center justify-content-center'>
                                            <button type='button' class='btn btn-sm btn-warning edit-btn mx-1' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>'>Edit</button>
                                            <a href='../dokter/jadwal/HapusJadwal.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-danger mx-1' onclick='return confirm("Anda yakin ingin hapus?");'>Hapus</a>
                                            <!-- Modal Edit Obat  -->
                                            <div class='modal fade' id='myModal<?php echo $row['id']; ?>' tabindex="-1" role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <!-- Modal content-->
                                                    <div class='modal-content'>
                                                        <div class='modal-header bg-primary'>
                                                            <h5 class='modal-title' id='editModalLabel'>Edit Jadwal</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <!-- Form edit data obat disini -->
                                                            <form action='./jadwal/EditJadwal.php' method='post' class="text-left">
                                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="nama_dokter">Dokter</label>
                                                                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?php echo $nama_dokter ?>" disabled required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="hari">Hari</label>

                                                                    <select class="form-control" id="hari" name="hari" required>
                                                                        <option value="Senin" <?php if ($row['hari'] == 'Senin') echo 'selected'; ?>>Senin</option>
                                                                        <option value="Selasa" <?php if ($row['hari'] == 'Selasa') echo 'selected'; ?>>Selasa</option>
                                                                        <option value="Rabu" <?php if ($row['hari'] == 'Rabu') echo 'selected'; ?>>Rabu</option>
                                                                        <option value="Kamis" <?php if ($row['hari'] == 'Kamis') echo 'selected'; ?>>Kamis</option>
                                                                        <option value="Jumat" <?php if ($row['hari'] == 'Jumat') echo 'selected'; ?>>Jumat</option>
                                                                        <option value="Sabtu" <?php if ($row['hari'] == 'Sabtu') echo 'selected'; ?>>Sabtu</option>
                                                                        <option value="Minggu" <?php if ($row['hari'] == 'Minggu') echo 'selected'; ?>>Minggu</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jam_mulai">Jam Mulai</label>
                                                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?php echo $row['jam_mulai'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jam_selesai">Jam Selesai</label>
                                                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?php echo $row['jam_selesai'] ?>" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                            <!-- end Modal Edit Obat -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                mysqli_close($mysqli);
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- end Card Body -->
                </div>
                <!-- end card  -->
            </div>
        </div>
    </div>
</div>