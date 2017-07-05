<?php

/**
 * Created by PhpStorm.
 * User: volke
 * Date: 6/1/2016
 * Time: 11:24 PM
 */
class Student
{
    

    /**
     * Student constructor.
     * @param $group
     */
    public function __construct($group)
    {
        settype($this->group, "string");
        $this->group = '\''.$group.'\'';
    }

    


}