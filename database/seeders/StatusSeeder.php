<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Status_notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'selected',
                'description' => 'this is selected status'
            ],
            [
                'name' => 'notified',
                'description' => 'this is notified status'
            ],
           

        ];

        foreach ($status as $value) {
            Status_notification::create($value);
        }
    }
}
