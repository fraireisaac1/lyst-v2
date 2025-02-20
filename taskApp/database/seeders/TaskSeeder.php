<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'task_name' => 'Vaccuming With One Hand',
            'task_location' => 'Living Room',
            'time_complexity' => 1, // (1 => ~10 min, 2 => ~30 min, etc.)
            'materials_required' => 'Vaccumm',
            'deadline' => '2025-02-20 10:00:00',
            'priority' => 1, // (1 => low, 2 => medium, 3 => high)
            'category' => 'chores'
        ]);
        Task::create([
            'task_name' => 'Washing Dishes',
            'task_location' => 'Kithen',
            'time_complexity' => 1, // (1 => ~10 min, 2 => ~30 min, etc.)
            'materials_required' => 'Soap, Sponge',
            'deadline' => '2025-02-20 11:00:00',
            'priority' => 2, // (1 => low, 2 => medium, 3 => high)
            'category' => 'chores'
        ]);
        Task::create([
            'task_name' => 'Mowing the Lawn',
            'task_location' => 'Front Yard',
            'time_complexity' => 2, // (1 => ~10 min, 2 => ~30 min, etc.)
            'materials_required' => 'Lawn Mower, Trash Bags',
            'deadline' => '2025-02-20 14:30:00',
            'priority' => 2, // (1 => low, 2 => medium, 3 => high)
            'category' => 'chores'
        ]);
        Task::create([
            'task_name' => 'Cleaning your Room',
            'task_location' => 'Your Bedroom',
            'time_complexity' => 3, // (1 => ~10 min, 2 => ~30 min, etc.)
            'materials_required' => 'Trash Bags, Boxes, Hamper',
            'deadline' => '2025-02-20 12:30:00',
            'priority' => 3, // (1 => low, 2 => medium, 3 => high)
            'category' => 'chores'
        ]);
        Task::create([
            'task_name' => 'Getting Coffe for your Boss',
            'task_location' => 'At your Office',
            'time_complexity' => 1, // (1 => ~10 min, 2 => ~30 min, etc.)
            'materials_required' => 'Coffe, Water, Coffe Machine',
            'deadline' => '2025-02-20 07:30:00',
            'priority' => 3, // (1 => low, 2 => medium, 3 => high)
            'category' => 'work'
        ]);
    }
}
