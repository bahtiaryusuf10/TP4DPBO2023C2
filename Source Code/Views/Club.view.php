<?php

class ClubView
{
  public function render($data)
  {
    $no = 1;
    $dataClub = null;
    foreach ($data as $val) {
      list($id, $name, $est) = $val;
      $dataClub .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $est . "</td>
                        <td>
                          <a href='index-club.php?update_id=" . $id . "' class='btn btn-warning'>Update</a>
                          <a href='index-club.php?delete_id=" . $id . "' class='btn btn-danger'>Delete</a>
                        </td>
                      </tr>";
    }

    $tpl = new Template("Templates/club.html");

    $tpl->replace("DATA_CLUB", $dataClub);
    $tpl->write();
  }

  public function renderFormCreate()
  {
    $tpl = new Template("Templates/form-club.html");

    $tpl->replace("TYPE_FORM", "Add Club");
    $tpl->replace("TYPE_BUTTON", "Add");
    $tpl->write();
  }

  public function renderFormUpdate($data)
  {
    foreach ($data as $row) {
      $id_club = $row[0];
      $name_club = $row[1];
      $est = $row[2];
    }

    $tpl = new Template("Templates/form-club.html");

    $tpl->replace("ID_CLUB", $id_club);
    $tpl->replace("DATA_CLUB", $name_club);
    $tpl->replace("DATA_EST", $est);
    $tpl->replace("TYPE_FORM", "Update Club");
    $tpl->replace("TYPE_BUTTON", "Update");
    $tpl->write();
  }
}
