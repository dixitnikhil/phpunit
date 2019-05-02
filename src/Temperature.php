<?php
/**
 * Created by PhpStorm.
 * User: rakesh
 * Date: 01/05/19
 * Time: 12:24 PM
 */

namespace HelloPHPUnit;


class Temperature
{
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function average()
    {
        $total = 0;
        for ($i=0; $i<3; $i++) {
            $total += $this->service->readTemp();
        }
        return $total/3;
    }
}