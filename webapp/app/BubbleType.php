<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BubbleType extends Model {

    //
    //     "##JUPYTER_PORT##" => null,
    //     "##NTERACT_PORT##" => null,
    //     "##WORKSPACE##" => "freedom",
    //     "##NAME##" => "lefteris",

    //            'command'    => 'docker run --restart unless-stopped -p **JUPYTER_PORT**:8888 -p **NTERACT_PORT**:8889 -v **WORKSPACE**:/opt/notebooks -d  --name **NAME** threeel/jupyter',

    protected $defaults = [
        'jupyter_port' => 8090,
        'nteract_port' => 8091,
        'workspace'    => "workspace",
        'name'         => "fizzy",
    ];

    /**
     * jupyter_port
     * nteract_port
     * workspace
     * name
     * @param $tokens
     * @return mixed
     */
    public function getCommand(array $tokens = []) {

        if (count($tokens) === 3) {

            return $this->replaceTokens($tokens);
        }

        return $this->replaceTokens($this->defaults + $tokens);

    }

    public function commandVariables() {

        return $this->commandTokens()['variables'];

    }

    public function commandKeys() {

        return $this->commandTokens()['keys'];
    }

    public function commandTokens() {

        preg_match_all('/##(.*?)##/s', $this->command, $matches);

        $variables = array_map('strtolower', $matches[1]);
        $keys = array_map('strtoupper', $matches[0]);

        $result = [];

        for ($i = 0; $i <= count($keys) - 1; $i++) {
            $result[$variables[$i]] = $keys[$i];
        }

        return $result;
    }

    public function replaceTokens($tokens) {

        $commandTokens = $this->commandTokens();
        $newTokens = [];
        foreach ($commandTokens as $commandKey => $commandToken) {

            $newTokens["##" . strtoupper($commandKey) . "##"] = array_get($tokens, $commandKey);
        }

        $command = $this->command;
        foreach ($newTokens as $key => $newToken) {
            $command = str_replace($key, $newToken, $command);
        }

        return $command;
    }
}
