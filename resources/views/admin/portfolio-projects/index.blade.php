<x-app-layout>
    <div class="min-h-screen bg-slate-950 p-6 text-white">
        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 p-4 font-bold text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-8 rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl">
            <p class="text-sm font-black uppercase tracking-[0.35em] text-cyan-300">
                Project Studio
            </p>

            <div class="mt-4 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <h1 class="text-4xl font-black md:text-5xl">
                        Portfolio Projects
                    </h1>
                    <p class="mt-3 text-slate-300">
                        Add, edit, hide, delete and organize your premium portfolio projects.
                    </p>
                </div>

                <a href="{{ route('admin.portfolio-projects.create') }}"
                   class="rounded-2xl bg-gradient-to-r from-cyan-400 to-fuchsia-500 px-6 py-3 font-black text-white shadow-2xl shadow-cyan-500/20 transition hover:scale-105">
                    Add Project
                </a>
            </div>
        </div>

        <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/10 shadow-2xl backdrop-blur-xl">
            <div class="grid grid-cols-12 border-b border-white/10 bg-white/5 px-6 py-4 text-sm font-black uppercase tracking-wider text-slate-300">
                <div class="col-span-4">Project</div>
                <div class="col-span-2">Type</div>
                <div class="col-span-2">Status</div>
                <div class="col-span-1">Order</div>
                <div class="col-span-3 text-right">Action</div>
            </div>

            @forelse ($projects as $project)
                <div class="grid grid-cols-12 items-center gap-4 border-b border-white/10 px-6 py-5 transition hover:bg-white/5">
                    <div class="col-span-4 flex items-center gap-4">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                 class="h-16 w-16 rounded-2xl object-cover ring-2 ring-cyan-300/20"
                                 alt="{{ $project->title }}">
                        @else
                            <div class="grid h-16 w-16 place-items-center rounded-2xl bg-gradient-to-br from-cyan-400 to-fuchsia-500 font-black">
                                {{ strtoupper(substr($project->title, 0, 1)) }}
                            </div>
                        @endif

                        <div>
                            <h3 class="font-black text-white">{{ $project->title }}</h3>
                            <p class="mt-1 line-clamp-1 text-sm text-slate-400">
                                {{ $project->description }}
                            </p>
                        </div>
                    </div>

                    <div class="col-span-2 text-sm font-bold text-slate-300">
                        {{ $project->type ?? 'Portfolio Project' }}
                    </div>

                    <div class="col-span-2">
                        @if ($project->is_active)
                            <span class="rounded-full bg-emerald-400/15 px-3 py-1 text-xs font-black text-emerald-200">
                                Active
                            </span>
                        @else
                            <span class="rounded-full bg-rose-400/15 px-3 py-1 text-xs font-black text-rose-200">
                                Hidden
                            </span>
                        @endif
                    </div>

                    <div class="col-span-1 font-black text-slate-300">
                        {{ $project->sort_order }}
                    </div>

                    <div class="col-span-3 flex justify-end gap-2">
                        <a href="{{ route('admin.portfolio-projects.edit', $project) }}"
                           class="rounded-xl bg-cyan-500/15 px-4 py-2 text-sm font-black text-cyan-200 transition hover:bg-cyan-500/25">
                            Edit
                        </a>

                        <form action="{{ route('admin.portfolio-projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete this project permanently?')"
                                    class="rounded-xl bg-red-500/15 px-4 py-2 text-sm font-black text-red-200 transition hover:bg-red-500/25">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-10 text-center">
                    <h3 class="text-2xl font-black">No projects added yet.</h3>
                    <p class="mt-3 text-slate-400">Click Add Project to create your first portfolio project.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    </div>
</x-app-layout>