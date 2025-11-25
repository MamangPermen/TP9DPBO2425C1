<?php

interface KontrakModelSponsor
{
    // method untuk ambil data sponsor
    public function getAllSponsor(): array;
    public function getSponsorById($id): ?array;

    // method crud sponsor
    public function addSponsor($nama_sponsor, $kategori): void;
    public function updateSponsor($id, $nama_sponsor, $kategori): void;
    public function deleteSponsor($id): void;
}

?>
