<?php

interface KontrakPresenterSponsor
{
    // Tampilkan list sponsor
    public function tampilkanSponsor(): string;

    // Tampilkan form (add/edit)
    public function tampilkanFormSponsor($id = null): string;

    // CRUD
    public function tambahSponsor($nama_sponsor, $kategori): void;
    public function ubahSponsor($id, $nama_sponsor, $kategori): void;
    public function hapusSponsor($id): void;
}

?>
