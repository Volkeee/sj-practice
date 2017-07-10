<?php

/**
 * Created by PhpStorm.
 * User: volkeee
 * Date: 7/5/17
 * Time: 7:45 PM
 */
class Tittle
{
    private $id;
    private $name;
    private $developer_id;
    private $publisher_id;
    private $director;
    private $producer;
    private $designer;
    private $writer;
    private $composer;
    private $series;
    private $engine;
    private $platforms_id;
    private $release_date_id;
    private $modes;

    //<editor-fold desc="Setters&getters">
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return mixed
     */
    public function getDeveloperid()
    {
        return $this->developer_id;
    }

    /**
     * @param mixed $developer_id
     */
    public function setDeveloperid($developer_id)
    {
        $this->developer_id = $developer_id;
    }

    /**
     * @return mixed
     */
    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    /**
     * @param mixed $publisher_id
     */
    public function setPublisherId($publisher_id)
    {
        $this->publisher_id = $publisher_id;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return mixed
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * @param mixed $producer
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;
    }

    /**
     * @return mixed
     */
    public function getDesigner()
    {
        return $this->designer;
    }

    /**
     * @param mixed $designer
     */
    public function setDesigner($designer)
    {
        $this->designer = $designer;
    }

    /**
     * @return mixed
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * @param mixed $writer
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;
    }

    /**
     * @return mixed
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * @param mixed $composer
     */
    public function setComposer($composer)
    {
        $this->composer = $composer;
    }

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param mixed $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @param mixed $engine
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getPlatformsid()
    {
        return $this->platforms_id;
    }

    /**
     * @param mixed $platforms_id
     */
    public function setPlatformsid($platforms_id)
    {
        $this->platforms_id = $platforms_id;
    }

    /**
     * @return mixed
     */
    public function getReleaseDateId()
    {
        return $this->release_date_id;
    }

    /**
     * @param mixed $release_date_id
     */
    public function setReleaseDateId($release_date_id)
    {
        $this->release_date_id = $release_date_id;
    }

    /**
     * @return mixed
     */
    public function getModes()
    {
        return $this->modes;
    }

    /**
     * @param mixed $modes
     */
    public function setModes($modes)
    {
        $this->modes = $modes;
    }
    //</editor-fold>

    public function toJSON() {


        return $jsonObject;
    }
}