<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VendorPatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'packages:patch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix known vendor package issues';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Patching affected packages');
        $this->patchSpatieTranslationLoader();
        return;
    }


    // Fix for issue https://github.com/spatie/laravel-translation-loader/discussions/145
    function patchSpatieTranslationLoader()
    {
        $file = 'vendor/spatie/laravel-translation-loader/src/TranslationLoaderManager.php';
        if (file_exists($file)) {
            $this->info('Patching spatie/laravel-translation-loader');

            $lines = file($file);
            $patch = [
                '\DB::connection()->getPdo();'
            ];
            $line = 23;
            array_splice($lines, $line, 0, $patch);
            file_put_contents($file, implode('', $lines));
        }
    }
}
