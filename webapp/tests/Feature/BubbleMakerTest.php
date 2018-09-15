<?php

namespace Tests\Feature;

use App\BubbleMaker;
use App\BubbleType;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BubbleMakerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBubbleMaker()
    {
        $user = User::first();
        $type = BubbleType::first();
        $bubble = new BubbleMaker($type,$user);

        $bubble->make();
        $this->assertTrue(true);
    }
}
