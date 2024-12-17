@section('titre','Editer un Lien')

<x-app-layout>
    <div class="container mx-auto px-4 py-8 shadow">
        <div class="max-w-2xl mx-auto rounded-xl p-6 text-white bg-gray-600   shadow-xl overflow-hidden sm:rounded-lg">
   
    <div class="glass rounded-xl p-6 text-gray-800 dark:text-white bg-white dark:bg-gray-800 shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Modifier le réseau social</h2>
    
        <form action="{{ route('admin.socials.update', $social) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="name">
                    Nom
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $social->name) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-white dark:bg-gray-700 text-gray-700 dark:text-white border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50"
                    required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="url">
                    URL
                </label>
                <input type="url" name="url" id="url" value="{{ old('url', $social->url) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 bg-white dark:bg-gray-700 text-gray-700 dark:text-white border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50"
                    required>
                @error('url')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
