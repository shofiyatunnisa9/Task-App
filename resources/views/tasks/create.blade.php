<x-app-layout>
    <div class="max-w-xl mx-auto mt-6">
        <form method="POST" action="{{ route('tasks.store') }}" class="bg-white p-4 shadow rounded">
            @csrf

            <label>Title</label>
            <input name="title" class="w-full border p-2 rounded mb-3">

            <label>Description</label>
            <textarea name="description" class="w-full border p-2 rounded mb-3"></textarea>

            <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
            <a href="{{ route('tasks.index')}}"
                class="bg-gray-600 text-white px-4 py-2.5 rounded">Cancel
            </a>
        </form>
    </div>
</x-app-layout>