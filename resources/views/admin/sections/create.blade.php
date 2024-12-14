<x-app-layout>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl text-white font-bold mb-6">Ajouter une section à "{{ $post->titre }}"</h1>

        <form action="{{ route('admin.sections.store', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titre">
                    Titre de la section
                </label>
                <input type="text" name="titre" id="titre" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    value="{{ old('titre') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="contenu">
                    Contenu
                </label>
                <textarea name="contenu" id="contenu" rows="10" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    required>{{ old('contenu') }}</textarea>
            </div>

            <div class="mb-4">
                
                

<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image</label>
<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" name="image" id="image" >

            </div>

            <div class="flex items-center justify-between">
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Ajouter la section
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
