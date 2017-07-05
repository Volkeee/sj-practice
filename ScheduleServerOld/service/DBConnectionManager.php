<?php

/**
 * Created by PhpStorm.
 * User: volke
 * Date: 27.05.2016
 * Time: 22:39
 */
class DBConnectionManager
{
    private $username = "root";
    private $password = "let2me6have0a4dick9in7his%ass&please*I want&it&?a*&(lot";
    private $ip = "localhost";
    private $db_name = "schedule_db";

    public $connection;

    /**
     * ConnectionManager constructor.
     */
    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=' . $this->ip . ';dbname=' . $this->db_name, $this->username,
                $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->query = new Query();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

class Query
{
    public $insertUser = null;
    public $getUsers = null;
    public $getTeachers = null;
    public $getScheduleForWeek = null;
    public $getSchedule = null;
    public $getAuditories = null;
    public $getSubjects = null;
    public $postGroup = null;
    public $postTeacher = null;
    public $postSubject = null;


    /**
     * Query constructor.
     * @param null $insert
     */
    public function __construct()
    {
        $this->insertUser = "INSERT INTO `schedule_db`.`users` (`id_user`, `email`, `group`, `name`) VALUES (:id_user, :email, :_group, :_name)";
        $this->getUsers = "SELECT * FROM `schedule_db`.`users`";
        $this->getTeachers = "SELECT * FROM `schedule_db`.`teachers`";
        $this->getAllGroups = "SELECT * FROM `schedule_db`.`groups`";
        $this->getScheduleForWeek = "SELECT s.id_schedule,
          s.week_day   AS 'week_day',
          s.LessonID   AS 'inorder',
          s.islabwork AS 'labwork',
          sub.`name`   AS 'subject',
          a.`name`     AS 'auditory',
          g.`name`     AS '_group',
          t.firstname  AS 'tfirstname',
          t.middlename AS 'tmiddlename',
          t.surname    AS 'tsurname'
      FROM schedule_db.schedule s
        INNER JOIN groups g ON s.`group` = g.id_group
        INNER JOIN disciplines sub ON s.discipline = sub.id_disciplines
        INNER JOIN teachers t ON s.teacher = t.id_teacher
        INNER JOIN auditory a ON s.auditory = a.id_auditory
      WHERE (g.`name` = :_group)
            AND (`week` = 0 OR `week` = :ispair OR `week` = :specificweek)
      ORDER BY s.week_day, s.LessonID, s.id_schedule";
        $this->getSchedule = "SELECT s.id_schedule,
s.week AS 'week',
          s.week_day   AS 'week_day',
          s.LessonID   AS 'inorder',
          s.islabwork AS 'labwork',
          sub.`name`   AS 'subject',
          a.`name`     AS 'auditory',
          g.`name`     AS '_group',
          t.firstname  AS 'tfirstname',
          t.middlename AS 'tmiddlename',
          t.surname    AS 'tsurname'
      FROM schedule_db.schedule s
        INNER JOIN groups g ON s.`group` = g.id_group
        INNER JOIN disciplines sub ON s.discipline = sub.id_disciplines
        INNER JOIN teachers t ON s.teacher = t.id_teacher
        INNER JOIN auditory a ON s.auditory = a.id_auditory
      WHERE (g.`name` = :_group)
      ORDER BY s.week_day, s.LessonID, s.id_schedule";
        $this->getWholeSchedule = "SELECT
          s.id_schedule,
          s.week       AS 'week',
          s.week_day   AS 'week_day',
          s.LessonID   AS 'inorder',
          s.islabwork  AS 'labwork',
          sub.`name`   AS 'subject',
          a.`name`     AS 'auditory',
          g.`name`     AS '_group',
          t.firstname  AS 'tfirstname',
          t.middlename AS 'tmiddlename',
          t.surname    AS 'tsurname'
      FROM schedule_db.schedule s
        INNER JOIN groups g ON s.`group` = g.id_group
        INNER JOIN disciplines sub ON s.discipline = sub.id_disciplines
        INNER JOIN teachers t ON s.teacher = t.id_teacher
        INNER JOIN auditory a ON s.auditory = a.id_audience
      ORDER BY s.week_day, s.LessonID";
        $this->getAuditories = "SELECT auditory.id_auditory AS 'id', auditory.name AS 'name' FROM schedule_db.auditory";
        $this->getSubjects = "SELECT * FROM disciplines";
        $this->postGroup = "INSERT INTO `schedule_db`.`groups`
(`name`)
VALUES
  (:groupname);";
        $this->postSubject = "INSERT INTO `schedule_db`.`disciplines`
(`name`)
VALUES
  (:subjectname);";
        $this->postTeacher = "INSERT INTO `schedule_db`.`teachers`
(`surname`, `firstname`, `middlename`)
VALUES
  (:surname, :firstname, :middlename);";
    }


}