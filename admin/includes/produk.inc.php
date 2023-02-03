<?php
class Produk {
    private $conn;
	private $table_produk = 'produk';

    public $id_produk;
    public $nama;
    public $mesin;
    public $harga;
    public $foto;
    public $keterangan;
	public $youtube;
	public $status;

	public function __construct($db) {
		$this->conn = $db;
	}

	function insert() {
        $query = "INSERT INTO {$this->table_produk} 
		(id_produk, nama, mesin, harga, foto, keterangan, youtube, status) 
		VALUES(:id_produk, :nama, :mesin, :harga, :foto, :keterangan, :youtube, :status)";

        $stmt = $this->conn->prepare($query);
        // produk
        $stmt->bindParam(':id_produk', $this->id_produk);
		$stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':mesin', $this->mesin);
        $stmt->bindParam(':harga', $this->harga);
        $stmt->bindParam(':foto', $this->foto);
        $stmt->bindParam(':keterangan', $this->keterangan);
		$stmt->bindParam(':youtube', $this->youtube);
		$stmt->bindParam(':status', $this->status);

		if ($stmt->execute()) {
            // var_dump($stmt);
			return true;
		} else {
			return false;
		}
	}
	
	function getNewID() {
		$query = "SELECT MAX(id_produk) AS code FROM {$this->table_produk}";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) {
			return $this->genCode($row["code"], '');
		} else {
			return $this->genCode($nomor_terakhir, '');
		}
	}

	function genCode($latest, $key, $chars = 0) {
		$new = intval(substr($latest, strlen($key))) + 1;
		$numb = str_pad($new, $chars, "0", STR_PAD_LEFT);
		return $key . $numb;
	}

    function readAll() {
		$query = "SELECT * FROM {$this->table_produk} ORDER BY id_produk ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function readAllOn() {
		$query = "SELECT * FROM {$this->table_produk} WHERE status='on' ORDER BY id_produk ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function readOne() {
		$query = "SELECT * FROM {$this->table_produk} WHERE id_produk=:id_produk LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id_produk', $this->id_produk);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id_produk = $row['id_produk'];
        $this->nama = $row['nama'];
		$this->mesin = $row['mesin'];
		$this->harga = $row['harga'];
        $this->foto = $row['foto'];
        $this->keterangan = $row['keterangan'];
		$this->youtube = $row['youtube'];
		$this->status = $row['status'];
	}

	function update() {
		$query = "UPDATE {$this->table_produk}
			SET
                id_produk = :id_produk,
				nama = :nama,
				mesin = :mesin,
                harga = :harga,
                foto = :foto,
                keterangan = :keterangan,
				youtube = :youtube,
				status = :status
			WHERE
				id_produk = :id_produk";
        $stmt = $this->conn->prepare($query);

		$stmt->bindParam(':id_produk', $this->id_produk);
		$stmt->bindParam(':nama', $this->nama);
		$stmt->bindParam(':mesin', $this->mesin);
        $stmt->bindParam(':harga', $this->harga);
        $stmt->bindParam(':foto', $this->foto);
        $stmt->bindParam(':keterangan', $this->keterangan);
		$stmt->bindParam(':youtube', $this->youtube);
		$stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id_produk', $this->id_produk);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

    function delete() {
		$query = "DELETE FROM {$this->table_produk} WHERE id_produk = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_produk);
		if ($result = $stmt->execute()) {
			return true;
		} else {
			return false;
		}
    }

}
