<div>
    <label class="mb-2 block font-bold">Title</label>
    <input
        type="text"
        name="title"
        value="{{ old('title', $portfolioProject->title ?? '') }}"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
        required
    >
</div>

<div>
    <label class="mb-2 block font-bold">Type</label>
    <input
        type="text"
        name="type"
        value="{{ old('type', $portfolioProject->type ?? '') }}"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
        placeholder="Medical Platform, AI Project, etc."
    >
</div>

<div>
    <label class="mb-2 block font-bold">Description</label>
    <textarea
        name="description"
        rows="5"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
        required
    >{{ old('description', $portfolioProject->description ?? '') }}</textarea>
</div>
<div>
    <label class="mb-2 block font-bold">Project Image</label>

    <input
        type="file"
        name="image"
        accept="image/*"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
    >

    @if (!empty($portfolioProject->image))
        <img
            src="{{ asset('storage/' . $portfolioProject->image) }}"
            class="mt-4 h-40 w-full rounded-2xl object-cover"
            alt="Project Image"
        >
    @endif
</div>
<div>
    <label class="mb-2 block font-bold">Tech Stack (comma separated)</label>
    <input
        type="text"
        name="tech_stack"
        value="{{ old('tech_stack', isset($portfolioProject) ? implode(', ', $portfolioProject->tech_stack ?? []) : '') }}"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
        placeholder="Laravel, PHP, MySQL, Tailwind CSS"
    >
</div>

<div>
    <label class="mb-2 block font-bold">GitHub Link</label>
    <input
        type="url"
        name="github_link"
        value="{{ old('github_link', $portfolioProject->github_link ?? '') }}"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
    >
</div>

<div>
    <label class="mb-2 block font-bold">Live Demo Link</label>
    <input
        type="url"
        name="live_link"
        value="{{ old('live_link', $portfolioProject->live_link ?? '') }}"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
    >
</div>

<div>
    <label class="mb-2 block font-bold">Sort Order</label>
    <input
        type="number"
        name="sort_order"
        value="{{ old('sort_order', $portfolioProject->sort_order ?? 0) }}"
        class="w-full rounded-xl border border-slate-300 px-4 py-3"
    >
</div>

<div class="flex items-center gap-3">
    <input
        type="checkbox"
        id="is_active"
        name="is_active"
        value="1"
        @checked(old('is_active', $portfolioProject->is_active ?? true))
    >
    <label for="is_active" class="font-bold">
        Show this project on portfolio website
    </label>
</div>

@if ($errors->any())
    <div class="rounded-xl bg-red-100 p-4 text-red-700">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif