<?php

namespace Ravols\ElasticInsight\Commands;

use Illuminate\Console\Command;

class ElasticInsightCommand extends Command
{
    public $signature = 'elastic-insight';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
