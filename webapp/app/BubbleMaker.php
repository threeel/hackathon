<?php

namespace App;

use Terminal;

class BubbleMaker {

    /**
     * @var BubbleType
     */
    private $type;

    /**
     * @var User
     */
    private $user;

    public function __construct(BubbleType $type, User $user) {

        $this->type = $type;
        $this->user = $user;
    }

    public function make() {

        // Replace tokens and Get Command

        $current_jupyter_port = $this->getAvailablePort();
        $current_nteract_port = $this->getAvailablePort();
        $container_name = $this->user->getContainerName($this->type->slug);
        $working_folder = $this->user->getWorkSpaceFolder();

        $command = $this->type->getCommand(['jupyter_port' => $current_jupyter_port,
                                            'nteract_port' => $current_nteract_port,
                                            'name'         => $container_name,
                                            'workspace'    => $working_folder
        ]);

        // Start Execute the Bubble Type Command

        $create_result = Terminal::command($command)->execute();

        $container_id = $create_result->getBody()->getContents()[0];
        // Execute the $type->entrypoint
        $nteract_command = $this->type->entrypoint;

        $start_nteract = "docker exec ${container_id} ${nteract_command}";
        $nteract_result = Terminal::command($start_nteract);

        $response = $nteract_result->getBody()->getContents();

        return DataBubble::query()->create([
            'user_id'          => $this->user->id,
            'name'             => $container_name,
            'bubble_type_slug' => $this->type->slug,
            'container'        => $container_id,
            'jupyter_url'      => env('APP_URL') . ":" . $current_jupyter_port . '/?token=freedom',
            'nteract_url'      => env('APP_URL') . ":" . $current_nteract_port . '/?token=freedom',
            'jupyter_port'     => $current_jupyter_port,
            'nteract_port'     => $current_nteract_port,
        ]);

        // Run Entrypoint
        // Parse Docker Output
        // Get URLs
    }

    /**
     *
     * // TODO Check the Server For available Port from 8000 and Above
     */
    public function getAvailablePort() {

        return rand(8090, 10000);
    }

    public static function test() {

        $user = User::first();
        $type = BubbleType::first();
        $bubble = new BubbleMaker($type, $user);

        $bubble->make();
    }
}
