<x-app-layout>
    <div class="min-h-screen bg-slate-950 p-6 text-white">
        <div class="mb-8 rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl">
            <p class="text-sm font-black uppercase tracking-[0.35em] text-rose-300">
                Hidden Inbox
            </p>

            <div class="mt-4 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <h1 class="text-4xl font-black md:text-5xl">
                        Hidden Contact Messages
                    </h1>
                    <p class="mt-3 text-slate-300">
                        Restore hidden messages or delete them permanently.
                    </p>
                </div>

                <a href="{{ route('admin.portfolio.dashboard') }}"
                   class="rounded-2xl border border-white/10 bg-white/10 px-6 py-3 font-black text-white transition hover:bg-white/15">
                    Back to Dashboard
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 p-4 font-bold text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @forelse ($hiddenMessages as $message)
                <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-6 shadow-2xl backdrop-blur-xl">
                    <div class="flex flex-col justify-between gap-4 lg:flex-row">
                        <div>
                            <h3 class="text-2xl font-black">{{ $message->name }}</h3>
                            <p class="mt-1 text-sm font-bold text-cyan-200">{{ $message->email }}</p>
                            <p class="mt-1 text-xs text-slate-400">
                                Hidden {{ $message->hidden_at?->diffForHumans() ?? 'recently' }}
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <form method="POST" action="{{ route('admin.contact-messages.unhide', $message) }}">
                                @csrf
                                @method('PATCH')

                                <button class="rounded-xl bg-emerald-500/15 px-4 py-2 text-sm font-black text-emerald-200 transition hover:bg-emerald-500/25">
                                    Restore
                                </button>
                            </form>

                            <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete this hidden message permanently?')"
                                        class="rounded-xl bg-red-500/15 px-4 py-2 text-sm font-black text-red-200 transition hover:bg-red-500/25">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5 rounded-2xl border border-white/10 bg-slate-950/60 p-5">
                        <p class="leading-7 text-slate-300">
                            {{ $message->message }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="rounded-[2rem] border border-white/10 bg-white/10 p-8 text-slate-300 shadow-2xl backdrop-blur-xl">
                    No hidden messages found.
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $hiddenMessages->links() }}
        </div>
    </div>
</x-app-layout>