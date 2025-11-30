<x-app-layout>
    <div class="max-w-xl mx-auto mt-6">
        <form method="POST" action="{{ route('tasks.update', $task) }}" class="bg-white p-4 shadow rounded">
            @csrf
            @method('PUT')

            <label>Title</label>
            <input name="title" value="{{ $task->title }}" class="w-full border p-2 rounded mb-3">

            <label>Description</label>
            <textarea name="description" class="w-full border p-2 rounded mb-3">{{ $task->description }}</textarea>

            <label class="inline-flex items-center">
                <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }}>
                <span class="ml-2">Completed</span>
            </label>

            <br><br>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('tasks.index')}}"
                class="bg-gray-600 text-white px-4 py-2.5 rounded">Cancel
            </a>
        </form>
    </div>
</x-app-layout>