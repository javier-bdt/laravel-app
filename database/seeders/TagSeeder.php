<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory(100)->create();
        // create 100 job_tags        
        Job::all()->each(function ($job) {
            $job->tags()->attach(Tag::all()->random(2));
        });
        // create 3 tags for each of the first 20 jobs
        Job::all()->take(20)->each(function ($job) {
            $job->tags()->attach(Tag::all()->random(3));
        });
    }

}