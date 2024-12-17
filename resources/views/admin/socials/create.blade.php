@section('titre','Ajouter un Lien Social')
<x-app-layout>
    <div class="container mx-auto px-4 py-8 shadow">
        <div class="max-w-2xl mx-auto rounded-xl p-6 text-white bg-gray-600   shadow-xl overflow-hidden sm:rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Ajouter un réseau social</h2>

    <form action="{{ route('admin.socials.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2" for="name">
                Nom
            </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
            @error('name')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold mb-2" for="url">
                URL
            </label>
            <input type="url" name="url" id="url" value="{{ old('url') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
            @error('url')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ajouter
            </button>
        </div>
    </form>
</div>
</div>
</x-app-layout>