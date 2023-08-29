<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employes:statusUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Employe Status Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentdate = Carbon::now()->format('Y-m-d');
        $all_employes = Employes::where('status', 1)->get();
        foreach ($all_employes as $employe) {
            $employe_date = Carbon::parse($employe->created_at);
            $month = $employe_date->diffInMonths($currentdate);
            if ($month > 0) {
                Employes::where('id', $employe->id)->update(['status' => 0]);
            }
            Log::info($month);
        }
    }
}
