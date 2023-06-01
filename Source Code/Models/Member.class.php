<?php

class Member extends DB
{
    function getMemberJoin()
    {
        $query = "SELECT members.id, members.name, members.email, members.phone, members.join_date, clubs.name FROM members INNER JOIN clubs ON members.id_club = clubs.id ORDER BY members.id ASC";

        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT members.id, members.name, members.email, members.phone, members.id_club, members.join_date, clubs.id, clubs.name, clubs.established FROM members INNER JOIN clubs ON members.id_club = clubs.id WHERE members.id = '$id'";

        return $this->execute($query);
    }

    function addMemberData($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_club = $data['id_club'];
        $join_date = $data['join_date'];

        $query = "INSERT INTO members VALUES ('', '$name', '$email', '$phone', '$id_club', '$join_date')";

        return $this->execute($query);
    }

    function deleteMemberData($id)
    {
        $query = "DELETE FROM members WHERE id = '$id'";

        return $this->execute($query);
    }

    function updateMemberData($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_club = $data['id_club'];
        $join_date = $data['join_date'];

        $query = "UPDATE members SET name = '$name', email = '$email', phone = '$phone', id_club= '$id_club', join_date = '$join_date' WHERE id = '$id'";

        return $this->execute($query);
    }
}
