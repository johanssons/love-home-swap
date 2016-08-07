<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Dates\Dates as Dates;
use Carbon\Carbon;
use Storage;
use File;
use Response;

class createPayDates extends Command
{
    /**
     * Storage folder path
     *
     * @var string
     */
    protected $outputSrc = '/public/payrolldates/';

    /**
     * Output file format
     *
     * @var string
     */
    protected $outputFormat = '.html';

    /**
     * View source
     *
     * @var string
     */
    protected $view = 'pages.payroll.dates';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "dates:generate {filename=new_dates} {year?}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate pay dates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Dates $dates)
    {
        parent::__construct();
        $this->dates = $dates;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            // Get dates
            $dates = $this->dates->getPayrollDates($this->argument('year'));

            // Check if file exists
            if (!File::exists('storage/app'.$this->outputSrc.$this->argument('filename').$this->outputFormat)) {
                // If file doesn't exist, then create it
                Storage::disk('local')->put($this->outputSrc.$this->argument('filename').$this->outputFormat, view($this->view)->with('dates', $dates));
                $this->info('File '.$this->argument('filename').$this->outputFormat.' has been created!' );
            } else {
                // Show error message if file exists
                $this->error(env('ERROR_MESSAGE_FILE_EXISTS'));
            }
        
        } catch (\Exception $e) {
             $this->error(env('ERROR_MESSAGE'));
        }
    }
}
