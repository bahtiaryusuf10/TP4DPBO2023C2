<?php
include_once("Connection.php");
include_once("Models/Member.class.php");
include_once("Models/Club.class.php");
include_once("Views/Member.view.php");

class MemberController
{
    private $member, $club;

    function __construct()
    {
        $this->member = new Member(Connection::$db_hostname, Connection::$db_username, Connection::$db_password, Connection::$db_name);

        $this->club = new Club(Connection::$db_hostname, Connection::$db_username, Connection::$db_password, Connection::$db_name);
    }

    public function index()
    {
        $this->member->open();
        $this->member->getMemberJoin();

        $data = array(
            'members' => array(),
            'clubs' => array()
        );

        while ($row = $this->member->getResult()) {
            array_push($data['members'], $row);
        }

        $this->member->close();

        $view = new MemberView($data);
        $view->render($data);
    }

    function showFormCreate()
    {
        $this->club->open();
        $this->club->getClub();

        $data = array();

        while ($row = $this->club->getResult()) {
            array_push($data, $row);
        }

        $this->club->close();

        $view = new MemberView($data);
        $view->renderFormCreate($data);
    }

    function create($data)
    {
        $this->member->open();
        $this->member->addMemberData($data);
        $this->member->close();

        header("location:index.php");
    }

    function showFormUpdate($id)
    {
        $this->member->open();
        $this->member->getMemberById($id);

        $data = array();

        while ($row = $this->member->getResult()) {
            array_push($data, $row);
        }

        $this->member->close();

        $this->club->open();
        $this->club->getClub();

        $dataClub = array();

        while ($row = $this->club->getResult()) {
            array_push($dataClub, $row);
        }

        $this->club->close();

        $view = new MemberView($data);
        $view->renderFormUpdate($data, $dataClub);
    }

    function update($data)
    {
        $this->member->open();
        $this->member->updateMemberData($data);
        $this->member->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->member->open();
        $this->member->deleteMemberData($id);
        $this->member->close();

        header("location:index.php");
    }
}
