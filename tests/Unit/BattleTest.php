<?php

namespace Tests\Unit;

use App\Army;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BattleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_create_armys()
    {

        $data1 = [
            'name' =>"Army1",
            'number_of_soliders' => 50,
            'number_of_generals' => 5,
        ];

        $data2 = [
            'name' =>"Army2",
            'number_of_soliders' => 48,
            'number_of_generals' => 5,
        ];

        $army1 = new Army($data1);
        $army1->save();

        $army2 = new Army($data2);
        $army2->save();

        $this->assertEquals($data1['name'], $army1->name);
        $this->assertEquals($data2['name'], $army2->name);

    }
}
