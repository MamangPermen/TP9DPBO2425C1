<?php
// Load pembalap
include_once("models/DB.php");
include("models/TabelPembalap.php");
include("views/ViewPembalap.php");
include("presenters/PresenterPembalap.php");

// Load Sponsor
include_once("models/TabelSponsor.php");
include_once("views/ViewSponsor.php");
include_once("presenters/PresenterSponsor.php");

// init
$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenter = new PresenterPembalap($tabelPembalap, $viewPembalap);

$tabelSponsor = new TabelSponsor('localhost', 'mvp_db', 'root', '');
$viewSponsor  = new ViewSponsor();
$presenterSponsor = new PresenterSponsor($tabelSponsor, $viewSponsor);

// menu utama
$menu = $_GET['menu'] ?? 'pembalap';

// pembalap
if ($menu === 'pembalap') {

    // Routing based on GET
    if (isset($_GET['screen'])) {

        if ($_GET['screen'] == 'add') {
            echo $presenter->tampilkanFormPembalap();
            exit;
        }

        if ($_GET['screen'] == 'edit' && isset($_GET['id'])) {
            echo $presenter->tampilkanFormPembalap($_GET['id']);
            exit;
        }
    }

    // Routing POST (CRUD)
    if (isset($_POST['action'])) {

        // CREATE
        if ($_POST['action'] === 'add') {
            $presenter->tambahPembalap(
                $_POST['nama'],
                $_POST['tim'],
                $_POST['negara'],
                $_POST['poinMusim'],
                $_POST['jumlahMenang']
            );
        }

        // UPDATE
        else if ($_POST['action'] === 'edit' && isset($_POST['id'])) {
            $presenter->ubahPembalap(
                $_POST['id'],
                $_POST['nama'],
                $_POST['tim'],
                $_POST['negara'],
                $_POST['poinMusim'],
                $_POST['jumlahMenang']
            );
        }

        // DELETE
        else if ($_POST['action'] === 'delete' && isset($_POST['id'])) {
            $presenter->hapusPembalap($_POST['id']);
        }

        header("Location: index.php?menu=pembalap");
        exit;
    }

    // DEFAULT LIST
    echo $presenter->tampilkanPembalap();
    exit;
}

// sponsor
if ($menu === 'sponsor') {

    // GET
    if (isset($_GET['screen'])) {

        if ($_GET['screen'] == 'add') {
            echo $presenterSponsor->tampilkanFormSponsor();
            exit;
        }

        if ($_GET['screen'] == 'edit' && isset($_GET['id'])) {
            echo $presenterSponsor->tampilkanFormSponsor($_GET['id']);
            exit;
        }
    }

    // POST CRUD
    if (isset($_POST['action'])) {

        if ($_POST['action'] === 'add') {
            $presenterSponsor->tambahSponsor(
                $_POST['nama_sponsor'],
                $_POST['kategori']
            );
        }

        else if ($_POST['action'] === 'edit') {
            $presenterSponsor->ubahSponsor(
                $_POST['id'],
                $_POST['nama_sponsor'],
                $_POST['kategori']
            );
        }

        else if ($_POST['action'] === 'delete') {
            $presenterSponsor->hapusSponsor($_POST['id']);
        }

        header("Location: index.php?menu=sponsor");
        exit;
    }

    // DEFAULT LIST
    echo $presenterSponsor->tampilkanSponsor();
    exit;
}

?>