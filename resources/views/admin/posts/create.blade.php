<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Nouvel article</h1>
    
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="titre">
                        Titre
                    </label>
                    <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('titre') }}" required>
                    @error("titre")
                          <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                          </div>
                          @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="introduction">
                        Introduction
                    </label>
                    <textarea name="introduction" id="introduction" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('introduction') }}</textarea>
                    @error("introduction")
                          <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                          </div>
                          @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="contenu">
                        Contenu
                    </label>
                    <textarea name="contenu" id="contenu" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('contenu') }}</textarea>
                    @error("contenu")
                          <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                          </div>
                          @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="image">
                        Image
                    </label>
                    <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline">
                    @error("image")
                          <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                          </div>
                          @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="temps">
                        Temps de lecture (en minutes)
                    </label>
                    <input type="number" name="temps" id="temps" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('temps') }}" required>
                    @error("temps")
                          <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Erreur alert!</span> {{ $message }}.
                          </div>
                          @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="type_id">
                        Type
                    </label>
                    <select name="type_id" id="type_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->id }}</option>
                        @endforeach
                    </select>
                    @error("type_id")
                    <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                      <span class="font-medium">Erreur alert!</span> {{ $message }}.
                    </div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="categorie_id">
                        Catégorie
                    </label>
                    <select name="categorie_id" id="categorie_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    @error("categorie_id")
                    <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                      <span class="font-medium">Erreur alert!</span> {{ $message }}.
                    </div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="status" value="1" class="form-checkbox dark:bg-gray-800 dark:border-gray-600" {{ old('status') ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700 dark:text-gray-300">Publier immédiatement</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Créer l'article
                    </button>
                    <a href="{{ route('admin.posts.index') }}" class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
    
</x-app-layout>
