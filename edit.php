<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="icon/shop.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Data Belanja</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            margin-top: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Data Belanja</h1>
                <hr style="height: 1px;color: black;background-color: black;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <?php
                    include 'model.php';
                    $model = new Model();
                    $id = $_REQUEST['id'];
                    $row = $model->edit($id);
 
                    if (isset($_POST['update'])) {
                        if (isset($_POST['Nama']) && isset($_POST['Produk']) && isset($_POST['Jumlah']) && isset($_POST['Harga'])) {
                            if (!empty($_POST['Nama']) && !empty($_POST['Produk']) && !empty($_POST['Jumlah']) && !empty($_POST['Harga'])) {
                                $data['id'] = $id;
                                $data['Nama'] = $_POST['Nama'];
                                $data['Produk'] = $_POST['Produk'];
                                $data['Jumlah'] = $_POST['Jumlah'];
                                $data['Harga'] = $_POST['Harga'];
 
                                $update = $model->update($data);
 
                                if($update){
                                    echo "<script>alert('Data Telah Diubah');</script>";
                                    echo "<script>window.location.href = 'index.php';</script>";
                                }else{
                                    echo "<script>alert('Data Gagal Diubah');</script>";
                                    echo "<script>window.location.href = 'index.php';</script>";
                                }
 
                            } else {
                                echo "<script>alert('Data Kosong');</script>";
                                header("Location: edit.php?id=$id");
                            }
                        }
                    }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" value="<?php echo $row['Nama']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Produk">Produk</label>
                        <input type="text" name="Produk" value="<?php echo $row['Produk']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Jumlah">Jumlah</label>
                        <input type="text" name="Jumlah" value="<?php echo $row['Jumlah']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Harga" class="form-label mt-4">Harga</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="Harga" value="<?php echo $row['Harga']; ?>" aria-label="Amount (to the nearest Rupiah)" class="form-control">
                            <span class="input-group-text">.000</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
