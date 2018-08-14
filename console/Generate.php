<?php namespace Zoomyboy\Jssor\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Zoomyboy\Jssor\Models\Jssor;

class Generate extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'jssor:generate';

    /**
     * @var string The console command description.
     */
    protected $description = 'Generates image thumbnails for jssor slider';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $jssors = $this->option('id')
            ? Jssor::where('id', $this->option('jssor'))->get()
            : Jssor::get()
        ;

        $i = 0;

        foreach($jssors as $jssor) {
            foreach($jssor->images as $image) {
                $i += $image->generateSizes(
                    ['1920', '1680', '1248', '800', '500', '320'],
                    $jssor->title
                );
            }
        }

        $this->info($i.' Bilder wurden erstellt.');
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['id', null, InputOption::VALUE_OPTIONAL, 'Generate Images only for Jssor with this ID', null]
        ];
    }
}
