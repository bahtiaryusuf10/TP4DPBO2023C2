<?php
include_once("Models/Template.class.php");
include_once("Models/DB.class.php");
include_once("Controllers/Member.controller.php");

$member = new MemberController();

if (isset($_GET['create'])) {
  $member->showFormCreate();
} else if (isset($_POST['Add'])) {
  //memanggil create
  $member->create($_POST);
} else if (!empty($_GET['delete_id'])) {
  //memanggil add
  $id = $_GET['delete_id'];
  $member->delete($id);
} else if (!empty($_GET['update_id'])) {
  //memanggil add
  $id = $_GET['update_id'];
  $member->showFormUpdate($id);
} else if (isset($_POST['Update'])) {
  $member->update($_POST);
} else {
  $member->index();
}
