<nav x-data="{ open: false }"
     class="relative z-[999999] border-b border-white/10 bg-slate-950/95 backdrop-blur-2xl shadow-2xl shadow-cyan-500/5">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">

            <div class="flex items-center gap-10">
                <a href="{{ route('admin.portfolio.dashboard') }}" class="flex items-center gap-3">
                    <div class="h-12 w-12 overflow-hidden rounded-2xl ring-2 ring-cyan-300/30 shadow-xl shadow-cyan-500/20">
                        <img src="{{ asset('images/profile.png') }}"
                             alt="Raj Mukut"
                             class="h-full w-full object-cover">
                    </div>

                    <div>
                        <h2 class="text-sm font-black text-white">Raj Mukut</h2>
                        <p class="text-xs font-semibold text-cyan-200">Portfolio Admin</p>
                    </div>
                </a>

                <div class="hidden sm:flex">
                    <a href="{{ route('admin.portfolio.dashboard') }}"
                       class="rounded-full border border-cyan-300/20 bg-cyan-300/10 px-5 py-2 text-sm font-black text-cyan-100 transition hover:bg-cyan-300/15">
                        Portfolio Command Center
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center">
                <div class="relative z-[999999]" x-data="{ profileOpen: false }" @click.outside="profileOpen = false">
                    <button @click="profileOpen = ! profileOpen"
                            type="button"
                            class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-2 text-sm font-bold text-slate-200 transition hover:bg-white/15">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="profileOpen"
                         x-transition
                         class="absolute right-0 top-full z-[9999999] mt-3 w-56 rounded-2xl border border-white/10 bg-slate-900 p-2 shadow-2xl shadow-black/60"
                         style="display: none;">
                        <a href="{{ route('profile.edit') }}"
                           class="block rounded-xl px-4 py-3 text-sm font-bold text-slate-200 transition hover:bg-white/10 hover:text-white">
                            Profile
                        </a>

                        <a href="{{ url('/') }}"
                           class="block rounded-xl px-4 py-3 text-sm font-bold text-slate-200 transition hover:bg-white/10 hover:text-white">
                            View Website
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                    class="block w-full rounded-xl px-4 py-3 text-left text-sm font-bold text-red-300 transition hover:bg-red-500/10 hover:text-red-200">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        type="button"
                        class="inline-flex items-center justify-center rounded-xl border border-white/10 bg-white/10 p-2 text-slate-300 transition hover:bg-white/15">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{ 'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': ! open }"
         class="hidden border-t border-white/10 bg-slate-950 sm:hidden">
        <div class="space-y-1 px-4 pb-3 pt-3">
            <a href="{{ route('admin.portfolio.dashboard') }}"
               class="block rounded-xl px-4 py-3 text-sm font-bold text-cyan-100 transition hover:bg-white/10">
                Portfolio Command Center
            </a>

            <a href="{{ route('profile.edit') }}"
               class="block rounded-xl px-4 py-3 text-sm font-bold text-slate-200 transition hover:bg-white/10">
                Profile
            </a>

            <a href="{{ url('/') }}"
               class="block rounded-xl px-4 py-3 text-sm font-bold text-slate-200 transition hover:bg-white/10">
                View Website
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="block w-full rounded-xl px-4 py-3 text-left text-sm font-bold text-red-300 transition hover:bg-red-500/10">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>