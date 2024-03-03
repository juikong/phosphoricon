<?php

namespace Juiko\PhosphorIcon\Console;

use Juiko\PhosphorIcon\PhosphorIconConsole;

use Illuminate\Console\Command;

class PhosphorIconImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phosphor-icon:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Phosphor Icon data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $phosphorIconConsole = new PhosphorIconConsole();
        $phosphorIconConsole->import();

        $this->info('Phosphor Icons processed successfully.');
    }
}
