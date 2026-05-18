<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioProjectController extends Controller
{
    public function index()
    {
        $projects = PortfolioProject::query()
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->paginate(10);

        return view('admin.portfolio-projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.portfolio-projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'type'           => ['nullable', 'string', 'max:255'],
            'description'    => ['required', 'string'],
            'tech_stack'     => ['nullable', 'string'],
            'github_link'    => ['nullable', 'url', 'max:255'],
            'live_demo_link' => ['nullable', 'url', 'max:255'],
            'live_link'      => ['nullable', 'url', 'max:255'],
            'sort_order'     => ['nullable', 'integer'],
            'is_visible'     => ['nullable', 'boolean'],
            'is_active'      => ['nullable', 'boolean'],
            'image'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $data['tech_stack'] = $this->formatTechStack($request->input('tech_stack'));

        $data['sort_order'] = $request->input('sort_order', 0);

        $data['is_visible'] = $request->has('is_visible');
        $data['is_active'] = $request->has('is_visible');

        if ($request->filled('live_demo_link')) {
            $data['live_link'] = $request->input('live_demo_link');
        }

        unset($data['live_demo_link']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolio-projects', 'public');
        }

        PortfolioProject::create($data);

        return redirect()
            ->route('admin.portfolio-projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(PortfolioProject $portfolioProject)
    {
        return view('admin.portfolio-projects.edit', compact('portfolioProject'));
    }

    public function update(Request $request, PortfolioProject $portfolioProject)
    {
        $data = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'type'           => ['nullable', 'string', 'max:255'],
            'description'    => ['required', 'string'],
            'tech_stack'     => ['nullable', 'string'],
            'github_link'    => ['nullable', 'url', 'max:255'],
            'live_demo_link' => ['nullable', 'url', 'max:255'],
            'live_link'      => ['nullable', 'url', 'max:255'],
            'sort_order'     => ['nullable', 'integer'],
            'is_visible'     => ['nullable', 'boolean'],
            'is_active'      => ['nullable', 'boolean'],
            'image'          => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $data['tech_stack'] = $this->formatTechStack($request->input('tech_stack'));

        $data['sort_order'] = $request->input('sort_order', 0);

        $data['is_visible'] = $request->has('is_visible');
        $data['is_active'] = $request->has('is_visible');

        if ($request->filled('live_demo_link')) {
            $data['live_link'] = $request->input('live_demo_link');
        }

        unset($data['live_demo_link']);

        if ($request->hasFile('image')) {
            if ($portfolioProject->image) {
                Storage::disk('public')->delete($portfolioProject->image);
            }

            $data['image'] = $request->file('image')->store('portfolio-projects', 'public');
        }

        $portfolioProject->update($data);

        return redirect()
            ->route('admin.portfolio-projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(PortfolioProject $portfolioProject)
    {
        if ($portfolioProject->image) {
            Storage::disk('public')->delete($portfolioProject->image);
        }

        $portfolioProject->delete();

        return back()->with('success', 'Project deleted successfully.');
    }

    private function formatTechStack(?string $techStack): array
    {
        if (!$techStack) {
            return [];
        }

        return collect(explode(',', $techStack))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->toArray();
    }
}