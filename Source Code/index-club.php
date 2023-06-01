<?php
include_once("Models/Template.class.php");
include_once("Models/DB.class.php");
include_once("Controllers/Club.controller.php");

$club = new ClubController();

if (isset($_GET['create'])) {
  $club->showFormCreate();
} else if (isset($_POST['Add'])) {
  //memanggil create
  $club->create($_POST);
} else if (!empty($_GET['delete_id'])) {
  //memanggil add
  $id = $_GET['delete_id'];
  $club->delete($id);
} else if (!empty($_GET['update_id'])) {
  //memanggil add
  $id = $_GET['update_id'];
  $club->showFormUpdate($id);
} else if (isset($_POST['Update'])) {
  $club->update($_POST);
} else {
  $club->index();
}
