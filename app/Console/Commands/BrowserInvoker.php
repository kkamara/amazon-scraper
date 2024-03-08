<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class BrowserInvoker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invokes spider(s).';

    protected int $retries = 0;

    protected int $maxRetries = 5;

    protected Carbon $dt;

    public function __construct()
    {
        parent::__construct();
        $this->dt = new Carbon();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://kelvinkamara.com';
        while(true) {
            /**
             * We can also dispatch jobs in parallel (See https://laravel.com/docs/9.x/queues#chains-within-batches)
             */
            $code = $this->call('browser:scrape', ['url' => $url,]);
            if (2 === $code) {
                $seconds = 2 * 60;
                Log::info('Sleeping for '.$seconds.' seconds');
                ++$this->retries;
                if ($this->maxRetries <= $this->retries) {
                    $this->handleMaxRetryLimitReached($url);
                    break;
                }
                sleep($seconds);
            } else {
                $this->retries = 0;
            }
        }

        return 0;
    }

    protected function handleMaxRetryLimitReached(string $url) {
        $msg = 'Hit max retries of '.$this->maxRetries.' for '.$url;
        Log::alert($msg);
        // (new Error([ 'error' => $msg, ]))->save();
    }
}
