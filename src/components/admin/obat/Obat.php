
<!-- Modal Tambah Data Obat -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data obat disini -->
                <form action="src/components/admin/obat/TambahObat.php" method="post">
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
                    </div>
                    <div class="form-group">
                        <label for="kemasan">Kemasan</label>
                        <input type="text" class="form-control" id="kemasan" name="kemasan" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
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
                <h1 class="m-0">Manajemen Obat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Obat</li>
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
                        <h3 class="card-title">Data Obat</h3>
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
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Kemasan</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'src/config/koneksi.php';
            $query = "SELECT * FROM obat";
            $no = 1;
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_obat']; ?></td>
                <td><?php echo $row['kemasan'] ?></td>
                <td><?php echo $row['harga']?></td>
                <td class='d-flex align-items-center justify-content-center'>
                    <button type='button' class='btn btn-sm btn-warning edit-btn mx-1' data-toggle='modal' data-target='#myModal<?php echo $row['id']; ?>'>Edit</button>
                    <a href='src/components/admin/obat/HapusObat.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-danger mx-1' onclick='return confirm("Anda yakin ingin hapus?");'>Hapus</a>
                </td>
            </tr>
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
                            <form id='editForm' method='POST' action='src/components/admin/obat/UpdateObat.php'>
                                <div class='form-group'>
                                    <label for='nama_obat'>Nama Obat</label>
                                    <input type='text' class='form-control' id='nama_obat' name='nama_obat' value='<?= $row['nama_obat']; ?>' required>
                                </div>
                                <div class='form-group'>
                                    <label for='kemasan'>Kemasan</label>
                                    <input type='text' class='form-control' id='kemasan' name='kemasan' value='<?= $row['kemasan']; ?>' required>
                                </div>
                                <div class='form-group'>
                                    <label for='harga'>Harga</label>
                                    <input type='text' class='form-control' id='harga' name='harga' value='<?= $row['harga']; ?>' required>
                                </div>
                                <!-- tambahkan input hidden untuk menyimpan nilai id -->
                                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                <button type='submit' class='btn btn-primary' name='update'>Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal Edit Obat -->
            <?php } ?>
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