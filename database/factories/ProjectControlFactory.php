<?php

namespace Database\Factories;

use App\Models\ProjectControl;
use App\Models\Admin;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectControlFactory extends Factory
{
    protected $model = ProjectControl::class;

    public function definition()
    {
        return [
            // We'll override 'project_id' in the seeder so here you can either create a new Project or leave it null.
            'project_id'    => Project::factory(),
            'primary_id'    => $this->faker->numerify('###'),
            'id_seperator'  => $this->faker->randomElement(['-', '&nbsp;', '']),
            'sub_id'        => $this->faker->numerify('##'),
            'applicable'    => $this->faker->boolean,
            'name'          => $this->faker->words(3, true),
            'description'   => $this->faker->sentence,
            'status'        => $this->faker->randomElement(['implemented', 'not implemented']),
            'deadline'      => $this->faker->dateTimeBetween('now', '+1 year'),
            'frequency'     => $this->faker->randomElement(['monthly', 'quarterly', 'annually']),
            // Use a closure to pick an existing Admin record
            'responsible_id'=> function () {
                return Admin::inRandomOrder()->first()->id;
            },
            'approver_id'   => function () {
                return Admin::inRandomOrder()->first()->id;
            },
        ];
    }
}
