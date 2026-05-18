<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\PortfolioProject;

class PortfolioDashboardController extends Controller
{
    public function index()
    {
        $totalProjects = PortfolioProject::count();

        $activeProjects = PortfolioProject::where('is_active', true)->count();

        $hiddenProjects = PortfolioProject::where('is_active', false)->count();

        $totalMessages = ContactMessage::where('is_hidden', false)->count();

        $unreadMessages = ContactMessage::where('is_hidden', false)
            ->where('is_read', false)
            ->count();

        $hiddenMessages = ContactMessage::where('is_hidden', true)->count();

        $latestMessages = ContactMessage::where('is_hidden', false)
            ->latest()
            ->take(8)
            ->get();

        return view('admin.portfolio-dashboard', compact(
            'totalProjects',
            'activeProjects',
            'hiddenProjects',
            'totalMessages',
            'unreadMessages',
            'hiddenMessages',
            'latestMessages'
        ));
    }
}