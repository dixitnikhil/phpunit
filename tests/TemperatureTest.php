<?php
/**
 * Created by PhpStorm.
 * User: rakesh
 * Date: 01/05/19
 * Time: 12:25 PM
 */

namespace tests\HelloPHPUnit;
use HelloPHPUnit\Temperature;
use \Mockery;

class TemperatureTest extends Base
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testGetsAverageTemperatureFromThreeServiceReadings()
    {
        $service = Mockery::mock('service');
        $service->shouldReceive('readTemp')
            ->times(3)
            ->andReturn(10, 12, 14);

        $temperature = new Temperature($service);

        $this->assertEquals(12, $temperature->average());
    }
}