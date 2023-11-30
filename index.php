<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Daftar Login</title>
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
            display: flex;
            align-items: center; /* Center vertically */
        }

        h1 img {
            margin-right: 10px; /* Adjust the margin as needed */
        }

        table {
            margin-top: 20px;
        }

        th, td {
            text-align: center;
        }

        .btn-primary {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1><img src="./icon/keranjang.png" alt="Keranjang" style="width: 30px;"> Data Belanja</h1>
                <hr style="height: 1px;color: black;background-color: black;">
            </div>
        </div>
      <div class="row">
        <div class="col-md-12"><a href="add.php" class="btn btn-primary">Tambahkan</a>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
 
                include 'model.php';
                $model = new Model();
                $rows = $model->fetch();
                $i = 1;
                if(!empty($rows)){
                  foreach($rows as $row){ 
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['Nama']; ?></td>
                <td><?php echo $row['Produk']; ?></td>
                <td><?php echo $row['Jumlah']; ?></td>
                <td><?php echo "Rp " . number_format($row['Harga'], 3, '.', '.'); ?></td>
                <td>
                  <a href="read.php?id=<?php echo $row['id']; ?>" class="badge badge-info">Lihat</a>
                  <a href="delete.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Hapus</a>
                  <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
                </td>
              </tr>
 
              <?php
                }
              }else{
                echo "Tidak Ada Data";
            }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</body>