<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Login | Raj Mukut</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
</head>

<body class="min-h-screen overflow-hidden bg-slate-950 text-white">
    <div class="fixed inset-0 -z-10 bg-[radial-gradient(circle_at_15%_20%,rgba(34,211,238,.25),transparent_30%),radial-gradient(circle_at_85%_15%,rgba(217,70,239,.22),transparent_32%),linear-gradient(135deg,#020617,#07111f,#020617)]"></div>

    <main class="flex min-h-screen items-center justify-center px-6 py-10">
        <section class="grid w-full max-w-5xl overflow-hidden rounded-[2rem] border border-white/10 bg-white/10 shadow-2xl backdrop-blur-2xl md:grid-cols-2">

            <div class="hidden bg-gradient-to-br from-cyan-400/20 via-indigo-500/15 to-fuchsia-500/20 p-10 md:flex md:flex-col md:justify-between">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="grid h-11 w-11 place-items-center rounded-2xl bg-gradient-to-br from-cyan-400 to-fuchsia-500 font-black">
                        RM
                    </div>
                    <div>
                        <h1 class="font-black">Raj Mukut</h1>
                        <p class="text-xs text-slate-300">Private Portfolio Admin</p>
                    </div>
                </a>

                <div>
                    <p class="mb-3 text-sm font-black uppercase tracking-[0.3em] text-cyan-200">Secure Access</p>
                    <h2 class="text-5xl font-black leading-tight">
                        Manage your portfolio with confidence.
                    </h2>
                    <p class="mt-5 leading-8 text-slate-300">
                        This login area is private. Only authorized access should be used for managing projects and dashboard content.
                    </p>
                </div>
            </div>

            <div class="p-8 md:p-12">
                <div class="mb-8 text-center md:text-left">
                    <div class="mx-auto mb-5 grid h-16 w-16 place-items-center rounded-3xl bg-gradient-to-br from-cyan-400 via-indigo-500 to-fuchsia-500 text-2xl font-black shadow-2xl shadow-cyan-500/20 md:mx-0">
                        RM
                    </div>

                    <h2 class="text-4xl font-black">Welcome Back</h2>
                    <p class="mt-3 text-slate-400">Sign in to your private admin dashboard.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                @if ($errors->any())
                    <div class="mb-5 rounded-2xl border border-red-400/20 bg-red-400/10 p-4 text-sm text-red-200">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-300">Email Address</label>
                        <input name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="w-full rounded-2xl border border-white/10 bg-white px-5 py-4 font-semibold text-slate-950 outline-none transition focus:border-cyan-300 focus:ring-4 focus:ring-cyan-300/20">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-300">Password</label>
                        <input name="password" type="password" required
                            class="w-full rounded-2xl border border-white/10 bg-white px-5 py-4 font-semibold text-slate-950 outline-none transition focus:border-cyan-300 focus:ring-4 focus:ring-cyan-300/20">
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <label class="flex items-center gap-3 text-sm text-slate-400">
                            <input type="checkbox" name="remember" class="rounded border-white/20">
                            Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-bold text-cyan-300 hover:text-cyan-200">
                                Forgot?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full rounded-2xl bg-gradient-to-r from-cyan-400 to-fuchsia-500 px-6 py-4 font-black text-white shadow-2xl shadow-cyan-500/20 transition hover:scale-[1.02]">
                        Sign In
                    </button>
                </form>

                <p class="mt-8 text-center text-xs text-slate-500">
                    © {{ date('Y') }} Raj Mukut Portfolio
                </p>
            </div>
        </section>
    </main>
</body>
</html>