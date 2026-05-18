<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raj Mukut | Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <style>
        * {
            font-family: 'Figtree', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: #020617;
            color: #ffffff;
            overflow-x: hidden;
        }

        .premium-bg {
            background:
                radial-gradient(circle at 12% 18%, rgba(34, 211, 238, .28), transparent 28%),
                radial-gradient(circle at 82% 16%, rgba(217, 70, 239, .24), transparent 30%),
                radial-gradient(circle at 48% 82%, rgba(99, 102, 241, .24), transparent 34%),
                linear-gradient(135deg, #020617 0%, #07111f 45%, #020617 100%);
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(255,255,255,.055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.055) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: radial-gradient(circle at center, black, transparent 72%);
        }

        .glass {
            background: linear-gradient(135deg, rgba(255,255,255,.11), rgba(255,255,255,.045));
            border: 1px solid rgba(255,255,255,.13);
            backdrop-filter: blur(24px);
            box-shadow:
                0 26px 90px rgba(0, 0, 0, .42),
                inset 0 1px 0 rgba(255,255,255,.12);
        }

        .glass-soft {
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.11);
            backdrop-filter: blur(18px);
        }

        .gradient-text {
            background: linear-gradient(90deg, #67e8f9, #a5b4fc, #f0abfc, #67e8f9);
            background-size: 220% 220%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textFlow 5s ease-in-out infinite;
        }

        @keyframes textFlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .live-shadow {
            animation: liveShadow 4.8s ease-in-out infinite;
        }

        @keyframes liveShadow {
            0%, 100% {
                box-shadow:
                    0 0 28px rgba(34, 211, 238, .18),
                    0 0 70px rgba(34, 211, 238, .08);
            }

            50% {
                box-shadow:
                    0 0 42px rgba(217, 70, 239, .28),
                    0 0 100px rgba(217, 70, 239, .12);
            }
        }

        .float-slow {
            animation: floatSlow 6s ease-in-out infinite;
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-14px); }
        }

        .blob-one {
            animation: blobOne 10s ease-in-out infinite;
        }

        .blob-two {
            animation: blobTwo 12s ease-in-out infinite;
        }

        @keyframes blobOne {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(40px, 26px) scale(1.08); }
        }

        @keyframes blobTwo {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-35px, 32px) scale(1.12); }
        }

        .shine {
            position: relative;
            overflow: hidden;
        }

        .shine::before {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 65%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.20), transparent);
            transform: skewX(-18deg);
            animation: shineMove 4.5s ease-in-out infinite;
        }

        @keyframes shineMove {
            0% { left: -120%; }
            45%, 100% { left: 140%; }
        }

        .nav-pill {
            padding: 7px 13px;
            border-radius: 999px;
            transition: .25s ease;
        }

        .nav-pill:hover {
            background: rgba(255,255,255,.10);
            color: #67e8f9;
        }

        .premium-card {
            transition: .35s ease;
        }

        .premium-card:hover {
            transform: translateY(-9px);
            border-color: rgba(103,232,249,.32);
            box-shadow:
                0 28px 80px rgba(0,0,0,.45),
                0 0 50px rgba(34,211,238,.12);
        }

       .light-mode {
    background: #f8fafc !important;
    color: #0f172a !important;
}

.light-mode.premium-bg {
    background:
        radial-gradient(circle at 12% 18%, rgba(34, 211, 238, .18), transparent 30%),
        radial-gradient(circle at 82% 16%, rgba(217, 70, 239, .16), transparent 32%),
        radial-gradient(circle at 48% 82%, rgba(99, 102, 241, .14), transparent 36%),
        linear-gradient(135deg, #ffffff 0%, #f8fafc 42%, #eef2ff 100%) !important;
}

.light-mode nav {
    background: rgba(255, 255, 255, .72) !important;
    border-color: rgba(15, 23, 42, .10) !important;
}

.light-mode .glass {
    background: linear-gradient(135deg, rgba(255,255,255,.88), rgba(248,250,252,.72)) !important;
    border-color: rgba(15, 23, 42, .10) !important;
    color: #0f172a !important;
    box-shadow:
        0 28px 90px rgba(15, 23, 42, .12),
        inset 0 1px 0 rgba(255,255,255,.85) !important;
}

.light-mode .glass-soft {
    background: rgba(255, 255, 255, .72) !important;
    border-color: rgba(15, 23, 42, .10) !important;
    color: #0f172a !important;
    box-shadow: 0 16px 45px rgba(15, 23, 42, .08) !important;
}

.light-mode .bg-slate-950\/80,
.light-mode .bg-slate-950\/70 {
    background: rgba(255, 255, 255, .62) !important;
    color: #0f172a !important;
}

.light-mode .text-white,
.light-mode h1,
.light-mode h2,
.light-mode h3,
.light-mode h4 {
    color: #0f172a !important;
}

.light-mode .text-slate-300,
.light-mode .text-slate-400 {
    color: #475569 !important;
}

.light-mode .bg-white\/5,
.light-mode .bg-white\/10 {
    background: rgba(15, 23, 42, .055) !important;
}

.light-mode .border-white\/10,
.light-mode .border-white\/5 {
    border-color: rgba(15, 23, 42, .10) !important;
}

.light-mode input,
.light-mode textarea {
    background: rgba(255, 255, 255, .75) !important;
    color: #0f172a !important;
    border-color: rgba(15, 23, 42, .14) !important;
}

.light-mode input::placeholder,
.light-mode textarea::placeholder {
    color: #64748b !important;
}

.light-mode .nav-pill:hover {
    background: rgba(15, 23, 42, .06);
    color: #0891b2;
}
    </style>
</head>

<body class="premium-bg">

    <div class="fixed inset-0 -z-10 grid-bg"></div>
    <div class="pointer-events-none fixed -left-24 top-20 -z-10 h-80 w-80 rounded-full bg-cyan-400/20 blur-3xl blob-one"></div>
    <div class="pointer-events-none fixed -right-24 top-28 -z-10 h-96 w-96 rounded-full bg-fuchsia-500/20 blur-3xl blob-two"></div>
    <div class="pointer-events-none fixed bottom-0 left-1/3 -z-10 h-96 w-96 rounded-full bg-indigo-500/20 blur-3xl blob-one"></div>

    <nav class="fixed left-0 right-0 top-0 z-50 border-b border-white/10 bg-slate-950/65 backdrop-blur-2xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-2.5">
            <a href="#home" class="flex items-center gap-2.5">
                <div class="grid h-20 w-20 place-items-center rounded-3xl bg-gradient-to-br from-cyan-300 via-indigo-400 to-fuchsia-400 text-2xl font-black">
    RM
</div>

                <div class="leading-tight">
                    <h1 class="text-base font-black tracking-tight">Raj Mukut</h1>
                    <p class="text-[11px] font-semibold text-slate-400">Full Stack Developer</p>
                </div>
            </a>

            <div class="hidden items-center gap-2 text-sm font-bold text-slate-300 md:flex">
                <a href="#about" class="nav-pill">About</a>
                <a href="#skills" class="nav-pill">Skills</a>
                <a href="#projects" class="nav-pill">Projects</a>
                <a href="#contact" class="nav-pill">Contact</a>
            </div>

            <div class="flex items-center gap-2">
                <button id="themeToggle"
                        type="button"
                        class="rounded-full border border-white/10 bg-white/10 px-3.5 py-2 text-xs font-black text-white backdrop-blur transition hover:bg-white/15">
                    Light
                </button>
                @auth
    @if (in_array(strtolower(auth()->user()->email), [
        'rajmukut791@gmail.com',
        'rajmukut1628@gmail.com',
    ]))
        <a href="{{ route('admin.portfolio.dashboard') }}"
           class="rounded-full border border-white/10 bg-white/10 px-3 py-2 text-xs font-black text-white/70 backdrop-blur transition hover:bg-white/15 hover:text-white"
           title="Private Admin Dashboard">
            ⚙
        </a>
    @endif
@endauth
                <a href="#contact"
                   class="rounded-full bg-white px-4 py-2 text-xs font-black text-slate-950 transition hover:scale-105">
                    Hire Me
                </a>
            </div>
        </div>
    </nav>
        <main id="home" class="mx-auto max-w-7xl px-6 pt-24">

        <section class="grid min-h-[86vh] items-center gap-14 py-14 lg:grid-cols-2">

            <div>
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-cyan-300/20 bg-cyan-300/10 px-4 py-2 text-sm font-black text-cyan-200 shine">
                    ✦ Portfolio
                </div>

                <h1 class="max-w-4xl text-5xl font-black leading-tight tracking-tight md:text-7xl">
                    I build
                    <span class="gradient-text">modern web applications</span>
                    with premium experience.
                </h1>

                <p class="mt-4 text-2xl font-black text-cyan-200">
                    <span id="typingText"></span>
                </p>

                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-300">
                    I am Raj Mukut, a passionate Full Stack Web Developer from Bangladesh.
                    I create responsive, secure, animated, and professional web applications
                    using Laravel, PHP, MySQL, Tailwind CSS, React, JavaScript, and AI integration.
                </p>

                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="#projects"
                       class="shine rounded-2xl bg-gradient-to-r from-cyan-400 to-fuchsia-500 px-7 py-4 font-black text-white shadow-2xl shadow-cyan-500/20 transition hover:scale-105">
                        View My Projects
                    </a>

                    <a href="#contact"
                       class="rounded-2xl border border-white/10 bg-white/10 px-7 py-4 font-black text-white backdrop-blur transition hover:bg-white/15">
                        Contact Me
                    </a>

                    <a href="{{ asset('cv/raj-mukut-cv.pdf') }}"
                       download
                       class="rounded-2xl border border-white/10 bg-white/10 px-7 py-4 font-black text-white backdrop-blur transition hover:bg-white/15">
                        Download CV
                    </a>
                </div>

                <div class="mt-6 flex flex-wrap gap-4">
                    <a href="https://github.com/your-username"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="rounded-2xl bg-white/10 px-5 py-3 font-bold text-white backdrop-blur transition hover:-translate-y-1 hover:bg-white/15">
                        GitHub
                    </a>

                    <a href="https://www.linkedin.com/in/your-linkedin-username"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="rounded-2xl bg-white/10 px-5 py-3 font-bold text-white backdrop-blur transition hover:-translate-y-1 hover:bg-white/15">
                        LinkedIn
                    </a>
                </div>
            </div>

            <div class="relative float-slow">
                <div class="absolute -inset-5 rounded-[2.5rem] bg-gradient-to-r from-cyan-400/30 to-fuchsia-500/30 blur-3xl"></div>

                <div class="relative glass live-shadow rounded-[2.5rem] p-6">
                    <div class="rounded-[2rem] bg-slate-950/80 p-7">
                        <div class="mb-7 flex items-center gap-4">
                            <div class="h-40 w-40 overflow-hidden rounded-3xl ring-4 ring-cyan-300/30 shadow-2xl shadow-cyan-500/30 animate-pulse">
    <img
        src="{{ asset('images/profile.png') }}"
        alt="Raj Mukut"
        class="h-full w-full object-cover"
    >
</div>

                            <div>
                                <h2 class="text-3xl font-black">Raj Mukut</h2>
                                <p class="text-slate-400">Developer • Designer • Builder</p>
                            </div>
                        </div>

                        <div class="space-y-4 text-slate-300">
                            <div class="glass-soft rounded-2xl p-4">
                                <p class="text-sm text-slate-400">Main Focus</p>
                                <h3 class="text-lg font-black">Full Stack Web Development</h3>
                            </div>

                            <div class="glass-soft rounded-2xl p-4">
                                <p class="text-sm text-slate-400">Special Area</p>
                                <h3 class="text-lg font-black">Dashboard & AI Features</h3>
                            </div>

                            <div class="glass-soft rounded-2xl p-4">
                                <p class="text-sm text-slate-400">Location</p>
                                <h3 class="text-lg font-black">Bangladesh</h3>
                            </div>
                        </div>

                        <div class="mt-7 grid grid-cols-3 gap-3 text-center">
                            <div class="glass-soft rounded-2xl p-4">
                                <h4 class="counter text-2xl font-black" data-target="3">0</h4>
                                <p class="text-xs text-slate-400">Projects</p>
                            </div>

                            <div class="glass-soft rounded-2xl p-4">
                                <h4 class="counter text-2xl font-black" data-target="10">0</h4>
                                <p class="text-xs text-slate-400">Skills</p>
                            </div>

                            <div class="glass-soft rounded-2xl p-4">
                                <h4 class="counter text-2xl font-black" data-target="100">0</h4>
                                <p class="text-xs text-slate-400">Passion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
                <section id="about" class="py-24">
            <div class="glass live-shadow rounded-[2.5rem] p-8 md:p-12 premium-card">
                <p class="text-sm font-black uppercase tracking-[0.35em] text-cyan-300">
                    About Me
                </p>

                <h2 class="mt-4 text-4xl font-black md:text-5xl">
                    Turning ideas into real digital products.
                </h2>

                <p class="mt-6 max-w-4xl text-lg leading-8 text-slate-300">
                    I am a dedicated Full Stack Web Developer with strong experience in
                    Laravel, PHP, MySQL, Tailwind CSS, JavaScript, React, and AI integration.
                    I enjoy building secure systems, role-based dashboards, automation tools,
                    and premium user interfaces that solve real-world problems.
                </p>

                <div class="mt-10 grid gap-6 md:grid-cols-3">
                    <div class="glass-soft rounded-3xl p-6 premium-card">
                        <h3 class="text-xl font-black">Frontend</h3>
                        <p class="mt-3 text-slate-400">
                            Tailwind CSS, JavaScript, React, Responsive Design, Animations
                        </p>
                    </div>

                    <div class="glass-soft rounded-3xl p-6 premium-card">
                        <h3 class="text-xl font-black">Backend</h3>
                        <p class="mt-3 text-slate-400">
                            Laravel, PHP, Authentication, APIs, Role-Based Systems
                        </p>
                    </div>

                    <div class="glass-soft rounded-3xl p-6 premium-card">
                        <h3 class="text-xl font-black">Database & AI</h3>
                        <p class="mt-3 text-slate-400">
                            MySQL, Secure Data Management, AI Integration
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="skills" class="py-24">
            <p class="text-sm font-black uppercase tracking-[0.35em] text-fuchsia-300">
                Skills
            </p>

            <h2 class="mt-4 text-4xl font-black md:text-5xl">
                Technologies I Work With
            </h2>

            @php
                $skills = [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'Tailwind CSS',
                    'JavaScript',
                    'React',
                    'Git',
                    'GitHub',
                    'REST API',
                    'Gemini AI',
                    'HTML5',
                    'CSS3',
                ];
            @endphp

            <div class="mt-10 flex flex-wrap gap-4">
                @foreach ($skills as $skill)
                    <span class="glass-soft rounded-full px-6 py-3 font-bold text-slate-200 transition hover:-translate-y-1 hover:border-cyan-300/30">
                        {{ $skill }}
                    </span>
                @endforeach
            </div>
        </section>

        <section id="projects" class="py-24">
            <p class="text-sm font-black uppercase tracking-[0.35em] text-cyan-300">
                Featured Projects
            </p>

            <h2 class="mt-4 text-4xl font-black md:text-5xl">
                Projects I Built
            </h2>

            <div class="mt-12 grid gap-8 lg:grid-cols-3">
                @forelse (($projects ?? collect())->filter() as $project)
                    @if($projects->count())
    <div class="group rounded-[32px] border border-white/10 bg-white/[0.08] backdrop-blur-2xl p-6 shadow-2xl shadow-cyan-500/10 hover:scale-[1.02] transition-all duration-500">
        @foreach($projects as $project)
            <div class="rounded-3xl border border-white/10 bg-white/10 backdrop-blur-xl p-5 shadow-2xl">
              @if($project->image)
    <img src="{{ asset('storage/' . $project->image) }}"
         alt="{{ $project->title }}"
         class="w-full h-64 object-cover rounded-3xl mb-6 shadow-xl">
@endif

                <p class="text-cyan-300 text-sm font-bold">
                    {{ $project->type }}
                </p>

                <h3 class="text-3xl font-black text-white mt-3 leading-tight">
    {{ $project->title }}
</h3>

               <p class="text-slate-300 mt-4 leading-8">
    {{ Str::limit($project->description, 180) }}
</p>

                @if(is_array($project->tech_stack))
                    <div class="flex flex-wrap gap-2 mt-4">
                        @foreach($project->tech_stack as $tech)
                            <span class="px-3 py-1 rounded-full bg-cyan-400/10 text-cyan-200 text-xs font-bold">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <div class="flex gap-3 mt-5">
                    @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank"
                           class="px-4 py-2 rounded-xl bg-white/10 text-white font-bold">
                            GitHub
                        </a>
                    @endif

                    @if($project->live_link)
                        <a href="{{ $project->live_link }}" target="_blank"
                           class="px-4 py-2 rounded-xl bg-cyan-500 text-white font-bold">
                            Live Demo
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="rounded-[28px] border border-white/15 bg-white/10 p-8">
        <h3 class="text-2xl font-black text-white">No projects added yet.</h3>
        <p class="text-slate-300 mt-2">Projects will appear here after admin adds them.</p>
    </div>
@endif
                @empty
                    <div class="glass rounded-[2rem] p-7 lg:col-span-3">
                        <h3 class="text-2xl font-black">No projects added yet.</h3>
                        <p class="mt-3 text-slate-300">
                            Projects will appear here after admin adds them.
                        </p>
                    </div>
                @endforelse
            </div>
        </section>

        <section id="contact" class="py-24">
            <div class="glass live-shadow grid gap-10 rounded-[2.5rem] p-8 md:grid-cols-2 md:p-12">
                <div>
                    <p class="text-sm font-black uppercase tracking-[0.35em] text-fuchsia-300">
                        Contact
                    </p>

                    <h2 class="mt-4 text-4xl font-black md:text-5xl">
                        Let’s work together.
                    </h2>

                    <p class="mt-6 text-lg leading-8 text-slate-300">
                        If you have a project idea, website plan, or collaboration opportunity,
                        feel free to contact me.
                    </p>

                    <div class="mt-8 space-y-4 text-slate-300">
                        <p class="glass-soft rounded-2xl p-4">Email: rajmukut791.com</p>
                        <p class="glass-soft rounded-2xl p-4">Phone: +880 1770498791</p>
                        <p class="glass-soft rounded-2xl p-4">Location: Sylhet,Bangladesh</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="rounded-2xl border border-emerald-400/20 bg-emerald-400/10 p-4 text-emerald-200 md:col-span-2">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('portfolio.contact') }}" class="rounded-[2rem] bg-slate-950/70 p-6">
                    @csrf

                    <div class="grid gap-4">
                        <input name="name" type="text" value="{{ old('name') }}" placeholder="Your Name"
                               class="rounded-2xl border border-white/10 bg-white/5 px-5 py-4 text-white outline-none placeholder:text-slate-500 focus:border-cyan-300">

                        <input name="email" type="email" value="{{ old('email') }}" placeholder="Your Email"
                               class="rounded-2xl border border-white/10 bg-white/5 px-5 py-4 text-white outline-none placeholder:text-slate-500 focus:border-cyan-300">

                        <textarea name="message" rows="5" placeholder="Your Message"
                                  class="rounded-2xl border border-white/10 bg-white/5 px-5 py-4 text-white outline-none placeholder:text-slate-500 focus:border-cyan-300">{{ old('message') }}</textarea>

                        @if ($errors->any())
                            <div class="rounded-2xl border border-red-400/20 bg-red-400/10 p-4 text-sm text-red-200">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <button type="submit"
                                class="shine rounded-2xl bg-gradient-to-r from-cyan-400 to-fuchsia-500 px-6 py-4 font-black text-white shadow-2xl shadow-cyan-500/20 transition hover:scale-[1.02]">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <footer class="border-t border-white/10 px-6 py-10 text-center text-sm text-slate-400">
        <div class="mb-5 flex justify-center gap-4">
            <a href="https://github.com/your-username" target="_blank" rel="noopener noreferrer"
               class="rounded-full bg-white/5 px-4 py-3 transition hover:bg-white/10">
                GitHub
            </a>

            <a href="https://www.linkedin.com/in/your-linkedin-username" target="_blank" rel="noopener noreferrer"
               class="rounded-full bg-white/5 px-4 py-3 transition hover:bg-white/10">
                LinkedIn
            </a>
        </div>

        <p>© {{ date('Y') }} Raj Mukut. All rights reserved.</p>
    </footer>

    <script>
        const typingText = document.getElementById('typingText');
        const words = [
            'Full Stack Web Developer',
            'Premium UI Designer',
            'AI Feature Builder'
        ];

        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeEffect() {
            if (!typingText) return;

            const currentWord = words[wordIndex];
            typingText.textContent = currentWord.substring(0, charIndex);

            if (!isDeleting && charIndex < currentWord.length) {
                charIndex++;
                setTimeout(typeEffect, 90);
            } else if (isDeleting && charIndex > 0) {
                charIndex--;
                setTimeout(typeEffect, 45);
            } else {
                isDeleting = !isDeleting;

                if (!isDeleting) {
                    wordIndex = (wordIndex + 1) % words.length;
                }

                setTimeout(typeEffect, 900);
            }
        }

        typeEffect();

        document.querySelectorAll('.counter').forEach(counter => {
            const target = Number(counter.dataset.target);
            let count = 0;
            const speed = Math.max(1, Math.floor(target / 60));

            const updateCounter = () => {
                count += speed;

                if (count >= target) {
                    counter.textContent = target + '+';
                } else {
                    counter.textContent = count;
                    requestAnimationFrame(updateCounter);
                }
            };

            updateCounter();
        });

        const themeToggle = document.getElementById('themeToggle');

        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                document.body.classList.toggle('light-mode');

                themeToggle.textContent = document.body.classList.contains('light-mode')
                    ? 'Dark'
                    : 'Light';
            });
        }
    </script>

</body>
</html>