<?php

class MemberView
{
  public function render($data)
  {
    $no = 1;
    $dataMember = null;
    foreach ($data['members'] as $val) {
      list($id, $name, $phone, $email, $join_date, $name_club) = $val;
      $dataMember .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $phone . "</td>
                        <td>" . $email . "</td>
                        <td>" . $name_club . "</td>
                        <td>" . $join_date . "</td>
                        <td>
                          <a href='index.php?update_id=" . $id . "' class='btn btn-warning'>Update</a>
                          <a href='index.php?delete_id=" . $id . "' class='btn btn-danger'>Delete</a>
                        </td>
                      </tr>";
    }

    $tpl = new Template("Templates/member.html");

    $tpl->replace("DATA_MEMBER", $dataMember);
    $tpl->write();
  }

  public function renderFormCreate($data)
  {
    $dataClub = null;

    foreach ($data as $val) {
      list($id, $name) = $val;
      $dataClub .= "<option value='" . $id . "'>" . $name . "</option>";
    }

    $tpl = new Template("Templates/form-member.html");

    $tpl->replace("DATA_CLUB", $dataClub);
    $tpl->replace("TYPE_FORM", "Add Member");
    $tpl->replace("TYPE_BUTTON", "Add");
    $tpl->write();
  }

  public function renderFormUpdate($data, $dataClub)
  {
    foreach ($data as $row) {
      $id_member = $row[0];
      $name_member = $row[1];
      $email = $row[2];
      $phone = $row[3];
      $join_date = $row[5];
    }

    $optionClub = null;

    foreach ($dataClub as $club) {
      list($id, $name) = $club;
      $optionClub .= "<option value='" . $id . "'>" . $name . "</option>";
    }

    $tpl = new Template("Templates/form-member.html");

    $tpl->replace("DATA_ID", $id_member);
    $tpl->replace("DATA_NAME", $name_member);
    $tpl->replace("DATA_PHONE", $phone);
    $tpl->replace("DATA_EMAIL", $email);
    $tpl->replace("DATA_JOIN_DATE", $join_date);
    $tpl->replace("DATA_CLUB", $optionClub);
    $tpl->replace("TYPE_FORM", "Update Member");
    $tpl->replace("TYPE_BUTTON", "Update");
    $tpl->write();
  }
}
