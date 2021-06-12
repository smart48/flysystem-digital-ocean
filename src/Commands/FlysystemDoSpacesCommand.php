<?php

namespace Smart48\FlysystemDoSpaces\Commands;

use Illuminate\Console\Command;

class FlysystemDoSpacesCommand extends Command
{
    public $signature = 'flysystem-do-spaces';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
