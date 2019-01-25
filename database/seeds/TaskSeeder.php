<?php

use Illuminate\Database\Seeder;

use FileInviteExam\Task;
use Faker\Generator as Faker;

class TaskSeeder extends Seeder
{
    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        while ($i++ < 10)
        {
            $item = $this->faker->sentence;
            Task::createTask(
                $item,
                $this->faker->date,
                rand(0, 1)
            );
        }
    }
}
