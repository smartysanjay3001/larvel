<?php

namespace App\Jobs;

use App\Models\Buy;
use App\Models\Trend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class TrendingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
       $order1=Buy::Select('product_id',DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->get();
      

        $total=$order1->filter(function($val){
            return $val->count >=1;
        });

        Trend::truncate();
        
        foreach($total as $tt){
            Trend::create([
                'product_id'=>$tt->product_id
            ]);

        }
    }
}
