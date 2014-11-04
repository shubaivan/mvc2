<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 29.10.14
 * Time: 22:07
 */

namespace mvc\Models;

abstract class AbstractFootballTim
{
    public $trainer;
    public $stadium;
    public $captain;

    public function __construct($trainer, $stadium, $captain)
    {
        $this->setTrainer($trainer);
        $this->setStadium($stadium);
        $this->setCaptain($captain);
    }

    abstract public function show();

    /*================Set Values==================*/
    public function setTrainer($trainer)
    {
        $this->trainer = $trainer;
    }
    public function setStadium($stadium)
    {
        $this->stadium = $stadium;
    }
    public function setCaptain($captain)
    {
        $this->captain = $captain;
    }
    /*================Get Values===================*/
    public function getTrainer()
    {
        return $this->trainer;
    }
    public function getStadium()
    {
        return $this->stadium;
    }
    public function getCaptain()
    {
        return $this->captain;
    }

}
