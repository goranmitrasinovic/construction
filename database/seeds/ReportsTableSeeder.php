<?php

use Illuminate\Database\Seeder;
use App\Report;
use App\WorkItem;


class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = factory(App\Report::class,5)->create()->each(function ($report){
            factory(WorkItem::class, 3)->create(['report_id'=>$report->id]);
        });
    }
}
