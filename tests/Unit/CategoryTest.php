<?php

namespace Tests\Unit;

use App\Http\Controllers\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    protected $name;
    protected $description;
    public function setUp() :void
    {
        parent::setUp();
        $this->name = "Nhat";
        $this->description = "Thao";

    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testStore()
    {
        $a = new Category();
        $b = $a->store($this->name, $this->description);
        $this->assertEquals($b, "Nhat_Thao");
    }
}
