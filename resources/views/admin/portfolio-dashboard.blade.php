<x-app-layout>
    <div class="relative z-0 min-h-screen overflow-visible bg-slate-950 p-6 text-white">

        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 p-4 font-bold text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        {{-- Hero Section --}}
        <div class="mb-8 rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl">
            <p class="text-sm font-black uppercase tracking-[0.35em] text-cyan-300">
                Admin Panel
            </p>

            <div class="mt-4 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <h1 class="text-4xl font-black md:text-5xl">
                        Portfolio Dashboard
                    </h1>
                    <p class="mt-3 text-slate-300">
                        Manage your premium portfolio projects, contact messages and analytics.
                    </p>
                </div>

                <a href="{{ url('/') }}"
                   target="_blank"
                   class="rounded-2xl border border-white/10 bg-white/10 px-6 py-3 font-black text-white transition hover:bg-white/15">
                    View Website
                </a>
            </div>
        </div>

        {{-- Statistics --}}
        <div class="grid gap-6 md:grid-cols-5">
            <div class="rounded-[2rem] border border-cyan-300/20 bg-cyan-300/10 p-7 shadow-2xl shadow-cyan-500/10">
                <p class="text-sm font-bold text-cyan-200">Total Projects</p>
                <h2 class="mt-4 text-5xl font-black">{{ $totalProjects }}</h2>
            </div>

            <div class="rounded-[2rem] border border-emerald-300/20 bg-emerald-300/10 p-7 shadow-2xl shadow-emerald-500/10">
                <p class="text-sm font-bold text-emerald-200">Active Projects</p>
                <h2 class="mt-4 text-5xl font-black">{{ $activeProjects }}</h2>
            </div>

            <div class="rounded-[2rem] border border-fuchsia-300/20 bg-fuchsia-300/10 p-7 shadow-2xl shadow-fuchsia-500/10">
                <p class="text-sm font-bold text-fuchsia-200">Hidden Projects</p>
                <h2 class="mt-4 text-5xl font-black">{{ $hiddenProjects }}</h2>
            </div>

            <div class="rounded-[2rem] border border-amber-300/20 bg-amber-300/10 p-7 shadow-2xl shadow-amber-500/10">
                <p class="text-sm font-bold text-amber-200">Unread Messages</p>
                <h2 class="mt-4 text-5xl font-black">{{ $unreadMessages ?? 0 }}</h2>
            </div>

            <div class="rounded-[2rem] border border-rose-300/20 bg-rose-300/10 p-7 shadow-2xl shadow-rose-500/10">
                <p class="text-sm font-bold text-rose-200">Hidden Messages</p>
                <h2 class="mt-4 text-5xl font-black">{{ $hiddenMessages ?? 0 }}</h2>
            </div>
        </div>

        {{-- Action Cards --}}
        <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">

            {{-- Manage Projects --}}
            <a href="{{ route('admin.portfolio-projects.index') }}"
               class="rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl transition hover:-translate-y-1 hover:bg-white/15">
                <p class="text-sm font-black uppercase tracking-[0.25em] text-cyan-300">
                    Projects
                </p>
                <h3 class="mt-4 text-3xl font-black">
                    Manage Projects
                </h3>
                <p class="mt-3 text-slate-300">
                    Add, edit, delete, upload images and control project visibility.
                </p>
            </a>

            {{-- Contact Inbox --}}
            <a href="#contact-messages"
               class="rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl transition hover:-translate-y-1 hover:bg-white/15">
                <p class="text-sm font-black uppercase tracking-[0.25em] text-amber-300">
                    Messages
                </p>
                <h3 class="mt-4 text-3xl font-black">
                    Contact Inbox
                </h3>
                <p class="mt-3 text-slate-300">
                    Read, hide, restore or delete visitor messages.
                </p>
            </a>

            {{-- Hidden Messages --}}
            <a href="{{ route('admin.hidden-contact-messages.index') }}"
               class="rounded-[2rem] border border-rose-300/20 bg-rose-300/10 p-8 shadow-2xl shadow-rose-500/10 transition hover:-translate-y-1 hover:bg-rose-300/15">
                <p class="text-sm font-black uppercase tracking-[0.25em] text-rose-300">
                    Hidden
                </p>
                <h3 class="mt-4 text-3xl font-black">
                    Hidden Messages
                </h3>
                <p class="mt-3 text-slate-300">
                    Restore or permanently delete hidden contact messages.
                </p>
            </a>

            {{-- Status --}}
            <div class="rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl">
                <p class="text-sm font-black uppercase tracking-[0.25em] text-fuchsia-300">
                    Status
                </p>
                <h3 class="mt-4 text-3xl font-black">
                    Portfolio Online
                </h3>
                <p class="mt-3 text-slate-300">
                    Your public portfolio is connected with dynamic project data.
                </p>
            </div>
        </div>

        {{-- Contact Messages Section --}}
        <div id="contact-messages"
             class="mt-8 rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl">

            <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-center">
                <div>
                    <p class="text-sm font-black uppercase tracking-[0.25em] text-amber-300">
                        Contact Messages
                    </p>
                    <h3 class="mt-3 text-3xl font-black">
                        Latest Visitor Messages
                    </h3>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/10 px-5 py-3 text-sm font-bold text-slate-200">
                    Total: {{ $totalMessages ?? 0 }} |
                    Unread: {{ $unreadMessages ?? 0 }} |
                    Hidden: {{ $hiddenMessages ?? 0 }}
                </div>
            </div>
                        <div class="space-y-4">
                @forelse (($latestMessages ?? collect())->filter() as $message)
                    <div class="rounded-[1.5rem] border border-white/10 bg-slate-950/70 p-5 shadow-xl">
                        <div class="flex flex-col justify-between gap-4 lg:flex-row">
                            <div>
                                <div class="flex flex-wrap items-center gap-3">
                                    <h4 class="text-xl font-black text-white">
                                        {{ $message->name }}
                                    </h4>

                                    @if (! $message->is_read)
                                        <span class="rounded-full bg-amber-400/15 px-3 py-1 text-xs font-black text-amber-200">
                                            Unread
                                        </span>
                                    @else
                                        <span class="rounded-full bg-emerald-400/15 px-3 py-1 text-xs font-black text-emerald-200">
                                            Read
                                        </span>
                                    @endif
                                </div>

                                <p class="mt-1 text-sm font-bold text-cyan-200">
                                    {{ $message->email }}
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    {{ $message->created_at?->diffForHumans() }}
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                @if (! $message->is_read)
                                    <form method="POST"
                                          action="{{ route('admin.contact-messages.read', $message) }}">
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="rounded-xl bg-emerald-500/15 px-4 py-2 text-sm font-black text-emerald-200 transition hover:bg-emerald-500/25">
                                            Mark Read
                                        </button>
                                    </form>
                                @endif

                                <form method="POST"
                                      action="{{ route('admin.contact-messages.hide', $message) }}">
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="rounded-xl bg-amber-500/15 px-4 py-2 text-sm font-black text-amber-200 transition hover:bg-amber-500/25">
                                        Hide
                                    </button>
                                </form>

                                <form method="POST"
                                      action="{{ route('admin.contact-messages.destroy', $message) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this message permanently?')"
                                        class="rounded-xl bg-red-500/15 px-4 py-2 text-sm font-black text-red-200 transition hover:bg-red-500/25">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="mt-5 rounded-2xl border border-white/10 bg-white/5 p-5">
                            <p class="leading-7 text-slate-300">
                                {{ $message->message }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl border border-white/10 bg-slate-950/50 p-6 text-slate-400">
                        No contact messages yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>