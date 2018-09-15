<?php

use App\BubbleType;
use App\DataBubble;
use App\User;
use Illuminate\Database\Seeder;

class BubbleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DataBubble::query()->truncate();
        BubbleType::query()->truncate();
        User::query()->truncate();


        User::defaults();
        BubbleType::defaults();

    }
}
