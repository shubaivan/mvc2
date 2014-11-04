<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 29.10.14
 * Time: 22:39
 */

namespace mvc\Models;

class RealMadrid extends AbstractFootballTim implements LCInterface
{
    public function __construct($trainer, $stadium, $captain)
    {
        parent::__construct($trainer, $stadium, $captain);
    }
    public function show()
    {
        return sprintf('trainer %s stadium in %s captain %s',$this->getTrainer(), $this->getStadium(), $this->getCaptain());
    }
    public function LC()
    {
        return "Chempion";
    }

}
