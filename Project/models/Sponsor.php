<?php

class Sponsor {

    private $id;
    private $nama_sponsor;
    private $kategori;

    public function __construct($id, $nama_sponsor, $kategori)
    {
        $this->id = $id;
        $this->nama_sponsor = $nama_sponsor;
        $this->kategori = $kategori;
    }

    public function getId() {
        return $this->id;
    }

    public function getNamaSponsor() {
        return $this->nama_sponsor;
    }

    public function getKategori() {
        return $this->kategori;
    }

    public function setNamaSponsor($nama_sponsor) {
        $this->nama_sponsor = $nama_sponsor;
    }

    public function setKategori($kategori) {
        $this->kategori = $kategori;
    }
}

?>
