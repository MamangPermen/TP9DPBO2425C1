<?php

include_once(__DIR__ . "/KontrakPresenterSponsor.php");
include_once(__DIR__ . "/../models/TabelSponsor.php");
include_once(__DIR__ . "/../models/Sponsor.php");
include_once(__DIR__ . "/../views/ViewSponsor.php");

class PresenterSponsor implements KontrakPresenterSponsor
{
    private $tabelSponsor;
    private $viewSponsor;
    private $listSponsor = [];

    public function __construct($tabelSponsor, $viewSponsor)
    {
        $this->tabelSponsor = $tabelSponsor;
        $this->viewSponsor  = $viewSponsor;
        $this->initListSponsor();
    }

    // Muat semua sponsor dari database
    private function initListSponsor()
    {
        $data = $this->tabelSponsor->getAllSponsor();

        $this->listSponsor = [];
        foreach ($data as $item) {
            $sponsor = new Sponsor(
                $item['id'],
                $item['nama_sponsor'],
                $item['kategori']
            );
            $this->listSponsor[] = $sponsor;
        }
    }

    // Tampilkan list sponsor
    public function tampilkanSponsor(): string
    {
        return $this->viewSponsor->tampilSponsor($this->listSponsor);
    }

    // Tampilkan form add/edit
    public function tampilkanFormSponsor($id = null): string
    {
        $data = null;

        if ($id !== null) {
            $data = $this->tabelSponsor->getSponsorById($id);
        }

        return $this->viewSponsor->tampilFormSponsor($data);
    }

    // CRUD
    public function tambahSponsor($nama_sponsor, $kategori): void
    {
        $this->tabelSponsor->addSponsor($nama_sponsor, $kategori);
    }

    public function ubahSponsor($id, $nama_sponsor, $kategori): void
    {
        $this->tabelSponsor->updateSponsor($id, $nama_sponsor, $kategori);
    }

    public function hapusSponsor($id): void
    {
        $this->tabelSponsor->deleteSponsor($id);
    }
}

?>
