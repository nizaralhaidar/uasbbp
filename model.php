<?php
class BaseModel
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "testingdb";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
    public function setConnection()
    {
        $this->nama = $Nama;
    } 
}

class Model extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['Nama']) && isset($_POST['Produk']) && isset($_POST['Jumlah']) && isset($_POST['Harga'])) {
                if (!empty($_POST['Nama']) && !empty($_POST['Produk']) && !empty($_POST['Jumlah']) && !empty($_POST['Harga'])) {

                    $Nama = $_POST['Nama'];
                    $Produk = $_POST['Produk'];
                    $Jumlah= $_POST['Jumlah'];
                    $Harga = $_POST['Harga'];

                    $conn = $this->getConnection();
                    $query = "INSERT INTO user_tbl (Nama,Produk,Jumlah,Harga) VALUES ('$Nama','$Produk','$Jumlah','$Harga')";
                    if ($sql = $conn->query($query)) {
                        echo "<script>alert('Berhasil Menambahkan');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    } else {
                        echo "<script>alert('Gagal Ulangi Lagi');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }
                } else {
                    echo "<script>alert('Data Kosong');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                }
            }
        }
    }

    public function fetch()
    {
        $data = null;
        $conn = $this->getConnection();

        $query = "SELECT * FROM user_tbl";
        if ($sql = $conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($id)
    {
        $conn = $this->getConnection();
        $query = "DELETE FROM user_tbl WHERE id = '$id'";

        if ($sql = $conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($id)
    {
        $data = null;
        $conn = $this->getConnection();

        $query = "SELECT * FROM user_tbl WHERE id = '$id'";
        if ($sql = $conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function edit($id)
    {
        $data = null;
        $conn = $this->getConnection();

        $query = "SELECT * FROM user_tbl WHERE id = '$id'";
        if ($sql = $conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {
        $conn = $this->getConnection();
        $query = "UPDATE user_tbl SET Nama='$data[Nama]', Produk='$data[Produk]', Jumlah='$data[Jumlah]', Harga='$data[Harga]' WHERE id='$data[id]'";

        if ($sql = $conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
    
}
