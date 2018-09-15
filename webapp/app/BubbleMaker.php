<?php

namespace App;


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

        $command = $this->type->getCommand(['jupyter_port' => $this->getAvailablePort(),
                                            'nteract_port' => $this->getAvailablePort(),
                                            'name'         => $this->user->getContainerName($this->type->slug),
                                            'workspace'    => $this->user->getWorkSpaceFolder()
        ]);

        // Start Execute the Bubble Type Command
        $create_result = Terminal::command($command)->execute();
//        cb67f20964cca9fc5d45b2764f5812620cef121cacfb382e6b7ab57cfc3ce542

        dd($create_result->getBody()->getContents());
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
}
