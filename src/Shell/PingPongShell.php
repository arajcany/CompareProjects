<?php

namespace App\Shell;

use Cake\Console\Shell;

/**
 * PingPong shell command.
 */
class PingPongShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out(__("This is the ping pong shell"));
        return 0;
    }

    public function random()
    {
        $rnd = mt_rand(0, 10);
        $this->abort("This is PingPong random", $rnd);
    }

    public function code($code = 0)
    {
        $this->abort("This is PingPong code", $code);
    }
}
