<x-app-layout>
    <div class="min-h-screen bg-[#f6f8fb] px-4 py-10">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="mb-8 rounded-[28px] bg-gradient-to-r from-slate-950 via-slate-900 to-cyan-950 p-8 text-white shadow-2xl">
                <p class="text-sm text-cyan-300 font-semibold">Portfolio Admin</p>
                <h1 class="text-3xl md:text-4xl font-black mt-2">Add Portfolio Project</h1>
                <p class="text-slate-300 mt-2">
                    Create a premium project showcase for your portfolio website.
                </p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5 text-red-700">
                    <b>Fix these errors:</b>
                    <ul class="mt-2 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.portfolio-projects.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="rounded-[30px] bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl shadow-slate-300/40 p-6 md:p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Title</label>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               required
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500"
                               placeholder="MedHBook - Medical Appointment System">
                    </div>

                    <!-- Type -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Type</label>
                        <input type="text"
                               name="type"
                               value="{{ old('type') }}"
                               required
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500"
                               placeholder="Medical Platform, AI Project">
                    </div>

                    <!-- Tech Stack -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tech Stack</label>
                        <input type="text"
                               name="tech_stack"
                               value="{{ old('tech_stack') }}"
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500"
                               placeholder="Laravel, PHP, MySQL, Tailwind CSS">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                        <textarea name="description"
                                  rows="6"
                                  required
                                  class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500"
                                  placeholder="Write detailed project description...">{{ old('description') }}</textarea>
                    </div>

                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Project Image</label>
                        <div class="rounded-2xl border-2 border-dashed border-cyan-200 bg-cyan-50/50 p-5">
                            <input type="file"
                                   name="image"
                                   accept="image/*"
                                   class="w-full rounded-xl bg-white px-4 py-3 border border-slate-200">
                            <p class="text-xs text-slate-500 mt-2">
                                Recommended: JPG, PNG, or WebP.
                            </p>
                        </div>
                    </div>

                    <!-- GitHub -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">GitHub Link</label>
                        <input type="url"
                               name="github_link"
                               value="{{ old('github_link') }}"
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500"
                               placeholder="https://github.com/...">
                    </div>

                    <!-- Live Demo -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Live Demo Link</label>
                        <input type="url"
                               name="live_demo_link"
                               value="{{ old('live_demo_link') }}"
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500"
                               placeholder="https://your-project.com">
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Sort Order</label>
                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-cyan-500 focus:ring-cyan-500">
                    </div>

                    <!-- Visibility -->
                    <div class="flex items-center gap-3 rounded-2xl bg-slate-50 border border-slate-200 px-4 py-4">
                        <input type="checkbox"
                               name="is_visible"
                               value="1"
                               {{ old('is_visible', 1) ? 'checked' : '' }}
                               class="rounded border-slate-300 text-cyan-600 focus:ring-cyan-500">

                        <span class="text-sm font-bold text-slate-700">
                            Show this project on portfolio website
                        </span>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ route('admin.portfolio-projects.index') }}"
                       class="rounded-2xl px-6 py-3 text-center font-bold bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-2xl px-8 py-3 font-black text-white bg-gradient-to-r from-cyan-500 via-blue-600 to-indigo-600 shadow-xl shadow-cyan-500/30 hover:scale-[1.02] transition">
                        Save Project
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>