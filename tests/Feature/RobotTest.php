<?php

namespace Tests\Feature;

use App\Http\Controllers\Robot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use ReflectionClass;
use ReflectionMethod;
use Tests\TestCase;

class RobotTest extends TestCase
{
    public function testGreeting()
    {
        $class = new Robot();
        $rm = new ReflectionClass(get_class($class));
        $method = $rm->getMethod('greeting');
        $method->setAccessible(true);     
        $result = $method->invokeArgs($class, ["Batman","Gotham"]);
        $this->assertSame("Batman Gotham", $result);
    }
}
