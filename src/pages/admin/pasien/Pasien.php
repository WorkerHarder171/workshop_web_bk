
<!-- Modal Tambah Data Pasien -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data Pasien disini -->
                <form action="src/pages/admin/pasien/TambahPasien.php" method="post">
                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat_pasien">Alamat</label>
                        <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" required>
                    </div>

                    <div class="form-group">
                        <label for="no_ktp">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>

                    <div class="form-group">
                        <label for="no_rm">No Rekam Medis</label>
                        <input type="text" class="form-control" id="no_rm" name="no_rm" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Modal Tambah Pasien -->

<!-- Table Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 ">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Pasien</li>
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
                        <h3 class="card-title">Data Pasien</h3>
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
            <tr>
                <th>No.</th>
                <th>Nama Pasien</th>
                <th>Alamat Pasien</th>
                <th>No KTP</th>
                <th>No HP</th>
                <th>No Rm</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../../../config/koneksi.php';
            $query = "SELECT * FROM pasien";
            $no = 1;
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_pasien']; ?></td>
                <td><?php echo $row['alamat_pasien'] ?></td>
                <td><?php echo $row['no_ktp']?></td>
                <td><?php echo $row['no_hp']?></td>
                <td><?php echo $row['no_rm']?></td>
                <td class='d-flex align-items-center justify-content-center'>
                    <button type='button' class='btn btn-sm btn-warning edit-btn mx-1' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>'>Edit</button>
                    <a href='src/pages/admin/obat/HapusObat.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-danger mx-1' onclick='return confirm("Anda yakin ingin hapus?");'>Hapus</a>
                  <!-- Modal Edit Obat  -->
            <div class='modal fade' id='myModal<?php echo $row['id']; ?>' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <!-- Modal content-->
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='editModalLabel'>Edit Obat</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                        <form action="src/pages/admin/pasien/UpdatePasien.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?php echo $row['nama_pasien'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat_pasien">Alamat</label>
                                <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" value="<?php echo $row['alamat_pasien'] ?>"  required>
                            </div>

                            <div class="form-group">
                                <label for="no_ktp">No KTP</label>
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo  $row['no_ktp'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="no_rm">No Rekam Medis</label>
                                <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?php echo $row['no_rm'] ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal Edit Pasien -->
                </td>
            </tr>
            <?php }
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