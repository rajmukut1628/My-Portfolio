<x-app-layout>
    <div class="mx-auto max-w-4xl p-6">
        <h1 class="mb-6 text-3xl font-black">Edit Portfolio Project</h1>

        <form method="POST"
      action="..."
      enctype="multipart/form-data"
      class="space-y-5 rounded-2xl bg-white p-6 shadow"></form>
        @csrf
            @method('PUT')

            @include('admin.portfolio-projects.form')

            <button class="rounded-xl bg-indigo-600 px-6 py-3 font-bold text-white">
                Update Project
            </button>
        </form>
    </div>
</x-app-layout>