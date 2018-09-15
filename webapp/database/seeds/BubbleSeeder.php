<?php

use App\BubbleType;
use App\DataBubble;
use App\User;
use Illuminate\Database\Seeder;

class BubbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        DataBubble::query()->truncate();
        BubbleType::query()->truncate();

    }
}
