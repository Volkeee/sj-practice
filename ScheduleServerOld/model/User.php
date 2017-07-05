<?php

/**
 * Created by PhpStorm.
 * User: volke
 * Date: 27.05.2016
 * Time: 14:50
 */
class User
{
    private $id_user;
    private $email;
    private $group;
    private $name;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * User constructor.
     * @param $id
     * @param $email
     * @param $group
     * @param $name
     */
    public function __construct($id, $email, $group, $name)
    {
        settype($this->id_user, "string");
        settype($this->email, "string");
        settype($this->group, "string");
        settype($this->name, "string");
        $this->id_user = $id;
        $this->email = $email;
        $this->group = $group;
        $this->name = $name;
    }

    public function toString()
    {
        return $this->id_user . " " . $this->email." ".$this->group." ". $this->name;
    }

}