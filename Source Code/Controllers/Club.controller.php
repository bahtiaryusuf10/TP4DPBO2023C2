<?php
include_once("Connection.php");
include_once("Models/Club.class.php");
include_once("Views/CLub.view.php");

class ClubController
{
    private $club;

    function __construct()
    {
        $this->club = new Club(Connection::$db_hostname, Connection::$db_username, Connection::$db_password, Connection::$db_name);
    }

    public function index()
    {
        $this->club->open();
        $this->club->getClub();

        $data = array();

        while ($row = $this->club->getResult()) {
            array_push($data, $row);
        }
        $this->club->close();

        $view = new ClubView($data);
        $view->render($data);
    }

    function showFormCreate()
    {
        $view = new ClubView();
        $view->renderFormCreate();
    }

    function create($data)
    {
        $this->club->open();
        $this->club->addClubData($data);
        $this->club->close();

        header("location:index-club.php");
    }

    function showFormUpdate($id)
    {
        $this->club->open();
        $this->club->getClubById($id);

        $data = array();

        while ($row = $this->club->getResult()) {
            array_push($data, $row);
        }
        $this->club->close();

        $view = new ClubView();
        $view->renderFormUpdate($data);
    }

    function update($data)
    {
        $this->club->open();
        $this->club->updateClubData($data);
        $this->club->close();

        header("location:index-club.php");
    }

    function delete($id)
    {
        $this->club->open();
        $this->club->deleteClubData($id);
        $this->club->close();

        header("location:index-club.php");
    }
}
