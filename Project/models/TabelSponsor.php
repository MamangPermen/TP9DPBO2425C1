<?php

include_once("models/DB.php");
include_once("KontrakModelSponsor.php");

class TabelSponsor extends DB implements KontrakModelSponsor
{
    public function __construct($host, $db_name, $username, $password)
    {
        parent::__construct($host, $db_name, $username, $password);
    }

    // method untuk ambil data sponsor
    public function getAllSponsor(): array
    {
        $query = "SELECT * FROM sponsor";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    // method untuk ambil data sponsor berdasarkan ID
    public function getSponsorById($id): ?array
    {
        $query = "SELECT * FROM sponsor WHERE id = :id";
        $params = ['id' => $id];
        $this->executeQuery($query, $params);

        $result = $this->getAllResult();
        return $result[0] ?? null;
    }

    // method untuk menambah sponsor
    public function addSponsor($nama_sponsor, $kategori): void
    {
        $query = "INSERT INTO sponsor (nama_sponsor, kategori)
                  VALUES (:nama_sponsor, :kategori)";

        $params = [
            'nama_sponsor' => $nama_sponsor,
            'kategori' => $kategori
        ];

        $this->executeQuery($query, $params);
    }

    // method untuk mengubah sponsor
    public function updateSponsor($id, $nama_sponsor, $kategori): void
    {
        $query = "UPDATE sponsor 
                  SET nama_sponsor = :nama_sponsor, kategori = :kategori
                  WHERE id = :id";

        $params = [
            'id' => $id,
            'nama_sponsor' => $nama_sponsor,
            'kategori' => $kategori
        ];

        $this->executeQuery($query, $params);
    }

    // method untuk menghapus sponsor
    public function deleteSponsor($id): void
    {
        $query = "DELETE FROM sponsor WHERE id = :id";
        $params = ['id' => $id];

        $this->executeQuery($query, $params);
    }
}

?>
