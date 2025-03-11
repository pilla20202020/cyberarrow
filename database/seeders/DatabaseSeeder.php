<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Project;
use App\Models\ProjectControl;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     // \App\Models\User::factory(10)->create();
    //     $this->call(PermissionSeeder::class);
    //     $this->call(RoleSeeder::class);
    //     $this->call(UsersTableSeeder::class);
    // }

    public function run()
    {
        // Create 10 admin users.
        Admin::factory()->count(10)->create();

        // Create a single project with id = 1.
        $project = Project::factory()->create(['id' => 1]);

        // Create 50 project controls associated with the created project.
        ProjectControl::factory()->count(50)->create([
            'project_id' => $project->id,
        ]);
    }
}
