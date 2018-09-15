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

        User::query()->create([
            'name'     => 'Lefteris Kameris',
            'email'    => 'lefteris.k@3elalliance.com',
            'password' => bcrypt('freedom')
        ])->createWorkspaceFolder();

        User::query()->create([
            'name'     => 'Angelos Prastitis',
            'email'    => 'prastitisangelos@gmail.com',
            'password' => bcrypt('freedom')
        ])->createWorkspaceFolder();

        User::query()->create([
            'name'     => 'Nikolas Pafitis',
            'email'    => 'npafit01@cs.ucy.ac.cy',
            'password' => bcrypt('freedom')
        ])->createWorkspaceFolder();;

        BubbleType::query()->create([
            'name'       => 'Machine Learning',
            'slug'       => 'machine-learning',
            'command'    => 'docker run --restart unless-stopped -p ##JUPYTER_PORT##:8888 -p ##NTERACT_PORT##:8889 -v ##WORKSPACE##:/opt/notebooks -d  --name ##NAME## threeel/jupyter',
            'entrypoint' => '/opt/conda/bin/jupyter nteract --notebook-dir=/opt/notebooks --ip=\'*\' --port=8889 --no-browser --allow-root',
        ]);

        BubbleType::query()->create([
            'name'       => 'Natural Language Processing',
            'slug'       => 'natural-language-processing',
            'command'    => 'docker run --restart unless-stopped -p ##JUPYTER_PORT##:8888 -p ##NTERACT_PORT##:8889 -v ##WORKSPACE##:/opt/notebooks -d  --name ##NAME## threeel/jupyter',
            'entrypoint' => '',
        ]);

        BubbleType::query()->create([
            'name'       => 'Data Mining',
            'slug'       => 'data-mining',
            'command'    => 'docker run --restart unless-stopped -p ##JUPYTER_PORT##:8888 -p ##NTERACT_PORT##:8889 -v ##WORKSPACE##:/opt/notebooks -d  --name ##NAME## threeel/jupyter',
            'entrypoint' => '',
        ]);

    }
}
