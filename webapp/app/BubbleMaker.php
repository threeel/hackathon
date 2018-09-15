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

        $command = $this->type->getCommand(['jupyter_port' => $this->getAvailablePort(),
                                            'nteract_port' => $this->getAvailablePort(),
                                            'name'         => $this->user->id,
                                            'workspace'    => $this->user->getWorkSpaceFolder()
        ]);

        // Start Execute the Bubble Type Command
        $result = Terminal::command($command)->execute();


        dd($result);
        // Run Entrypoint
        // Parse Docker Output
        // Get URLs
    }

    public function extractVariables() {


    }

    /**
     *
     * // TODO Check the Server For available Port from 8000 and Above
     */
    public function getAvailablePort() {

        return rand(8090, 9000);
    }
}
