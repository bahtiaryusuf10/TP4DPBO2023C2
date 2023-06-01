<?php

class Club extends DB
{
    function getClub()
    {
        $query = "SELECT * FROM clubs";

        return $this->execute($query);
    }

    function getClubById($id)
    {
        $query = "SELECT * FROM clubs WHERE id = '$id'";

        return $this->execute($query);
    }

    function addClubData($data)
    {
        $name_club = $data['name'];
        $est = $data['established'];

        $query = "INSERT INTO clubs VALUES ('', '$name_club', '$est')";

        return $this->execute($query);
    }

    function deleteClubData($id)
    {

        $query = "DELETE FROM clubs WHERE id = '$id'";

        return $this->execute($query);
    }

    function updateClubData($data)
    {
        $id = $data['id'];
        $name_club = $data['name'];
        $est = $data['established'];

        $query = "UPDATE clubs SET name = '$name_club', established = '$est' WHERE id = '$id'";

        return $this->execute($query);
    }
}
