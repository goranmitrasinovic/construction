<?php

use Illuminate\Database\Seeder;
use App\CheckList;
use App\CheckListItem;
use App\CheckListReport;


class CheckListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CheckList::insert([
            'name' => 'Excavation',
        ]);

        CheckList::insert([
            'name' => 'Added Work',
        ]);

        // CheckListReport::insert([
        //     'report_id' => 1,
        //     'checklist_id' => 1,
        // ]);



        CheckListItem::insert([
            ['name' => 'Checked that permit exists for surfaces',
            'checklist_id' => 1],
            ['name' => 'Checked that traffic permits and guidelines have been followed',
            'checklist_id' => 1],
            ['name' => 'Checked that underlying infrastructure maps/guideline have been followed',
            'checklist_id' => 1],
            ['name' => 'Documented workplace deviations before start of work',
            'checklist_id' => 1],
            ['name' => 'The workplace is cleaned and prepared after work',
            'checklist_id' => 1],
            ['name' => 'Has been approved by customers',
            'checklist_id' => 2],
            ['description' => 'Who is the contact person',
            'checklist_id' => 2],
        ]);


    }
}
