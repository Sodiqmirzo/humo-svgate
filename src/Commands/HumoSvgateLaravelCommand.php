<?php

namespace HumoSvgate\HumoSvgateLaravel\Commands;

use Illuminate\Console\Command;

class HumoSvgateLaravelCommand extends Command
{
    public $signature = 'humo-svgate-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
