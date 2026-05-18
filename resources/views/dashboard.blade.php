<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl backdrop-blur-xl">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <p class="text-sm font-black uppercase tracking-[0.25em] text-cyan-300">
                Messages
            </p>
            <h3 class="mt-3 text-3xl font-black">Latest Contact Messages</h3>
        </div>

        <div class="rounded-2xl bg-white/10 px-5 py-3 text-sm font-bold">
            Total: {{ $totalMessages }} | Unread: {{ $unreadMessages }}
        </div>
    </div>

    <div class="space-y-4">
        @forelse ($latestMessages as $message)
            <div class="rounded-2xl border border-white/10 bg-slate-950/50 p-5">
                <div class="flex flex-wrap justify-between gap-3">
                    <div>
                        <h4 class="font-black">{{ $message->name }}</h4>
                        <p class="text-sm text-cyan-200">{{ $message->email }}</p>
                    </div>

                    <p class="text-xs text-slate-400">
                        {{ $message->created_at->diffForHumans() }}
                    </p>
                </div>

                <p class="mt-4 leading-7 text-slate-300">
                    {{ $message->message }}
                </p>
            </div>
        @empty
            <p class="text-slate-400">No contact messages yet.</p>
        @endforelse
    </div>
</div>
</x-app-layout>
