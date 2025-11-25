<?php

include_once("KontrakViewSponsor.php");
include_once("models/Sponsor.php");

class ViewSponsor implements KontrakViewSponsor
{
    public function __construct()
    {
        // konstruktor kosong
    }

    // Tampilkan list sponsor
    public function tampilSponsor($listSponsor): string
    {
        $tbody = '';
        $no = 1;

        foreach ($listSponsor as $sponsor) {
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sponsor->getNamaSponsor()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sponsor->getKategori()) .'</td>';
            $tbody .= '<td class="col-actions">
                    <a href="index.php?menu=sponsor&screen=edit&id='. $sponsor->getId() .'" class="btn btn-edit">Edit</a>
                    <button data-id="'. $sponsor->getId() .'" class="btn btn-delete">Hapus</button>
                </td>';
            $tbody .= '</tr>';

            $no++;
        }

        // load template
        $templatePath = __DIR__ . '/../template/skinSponsor.html';

        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            $template = str_replace('<!-- PHP_ROWS -->', $tbody, $template);
            $template = str_replace('TOTAL_COUNT', count($listSponsor), $template);
            return $template;
        }

        return $tbody; // fallback kalau template hilang
    }

    // Tampilkan form add/edit
    public function tampilFormSponsor($data = null): string
    {
        $template = file_get_contents(__DIR__ . '/../template/formSponsor.html');

        if ($data) {
            // EDIT MODE
            $template = str_replace('value="add" id="sponsor-action"', 'value="edit" id="sponsor-action"', $template);
            $template = str_replace('value="" id="sponsor-id"', 'value="' . htmlspecialchars($data['id']) . '" id="sponsor-id"', $template);

            $template = str_replace(
                'id="nama_sponsor" name="nama_sponsor" type="text" placeholder="Nama Sponsor"',
                'id="nama_sponsor" name="nama_sponsor" type="text" placeholder="Nama Sponsor" value="' . htmlspecialchars($data['nama_sponsor']) . '"',
                $template
            );

            $template = str_replace(
                'id="kategori" name="kategori" type="text" placeholder="Kategori (mis. Minuman)"',
                'id="kategori" name="kategori" type="text" placeholder="Kategori (mis. Minuman)" value="' . htmlspecialchars($data['kategori']) . '"',
                $template
            );
        }

        return $template;
    }
}

?>
