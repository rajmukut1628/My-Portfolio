<?php

namespace Database\Seeders;

use App\Models\PortfolioProject;
use Illuminate\Database\Seeder;

class PortfolioProjectSeeder extends Seeder
{
    public function run(): void
    {
        PortfolioProject::insert([
            [
                'title' => 'MedHBook',
                'type' => 'Medical Platform',
                'description' => 'Secure medical application with appointments and encrypted medical documents.',
                'tech_stack' => json_encode(['Laravel', 'PHP', 'MySQL', 'Tailwind CSS']),
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'University Connect',
                'type' => 'University Platform',
                'description' => 'Students and alumni community with jobs, events, mentorship and AI.',
                'tech_stack' => json_encode(['Laravel', 'MySQL', 'Gemini AI']),
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Disease Prediction System',
                'type' => 'AI Health Project',
                'description' => 'Disease prediction and medical report analysis platform.',
                'tech_stack' => json_encode(['Laravel', 'AI API', 'Tailwind CSS']),
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}