<x-app-layout>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Modifier la section</h1>

        <form action="{{ route('admin.sections.update', [$post, $section]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titre">
                    Titre de la section
                </label>
                <input type="text" name="titre" id="titre" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    value="{{ old('titre', $section->titre) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="contenu">
                    Contenu
                </label>
                <textarea name="contenu" id="contenu" rows="10" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    required>{{ old('contenu', $section->contenu) }}</textarea>
            </div>

            @if($section->image)
                <div class="mb-4">
                    <p class="text-sm font-bold mb-2">Image actuelle :</p>
                    <img src="{{ Storage::url($section->image) }}" alt="Image actuelle" class="max-w-xs">
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Nouvelle image
                </label>
                <input type="file" name="image" id="image" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Mettre à jour la section
                </button>
                <a href="{{ route('admin.posts.edit', $post) }}" 
                    class="text-gray-600 hover:text-gray-800">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
