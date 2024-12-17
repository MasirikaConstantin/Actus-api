@section('titre','Editer une section')

<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Modifier la section</h1>

        <form id="blogForm" action="{{ route('admin.sections.update', [$post, $section]) }}" method="POST" enctype="multipart/form-data">
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
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="contenu">
                    Contenu
                </label>
                <input type="hidden" name="contenu" id="contenu" value="{{ old('contenu', $section->contenu) }}">
                        
                <!-- Editor Container -->
                <div class="mt-3">
                    <div id="editor" class="bg-white rounded-lg min-h-[300px]">
                    </div>
                </div>
                @error("contenu")
                    <div class="p-4 mb-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium">Erreur alert!</span> {{ $message }}.
                    </div>
                @enderror
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

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                        <script>
                            const quill = new Quill('#editor', {
                                theme: 'snow',
                                modules: {
                                    toolbar: [
                                        [{ 'header': [1, 2, 3, false] }],
                                        ['bold', 'italic', 'underline', 'strike'],
                                        [{ 'color': [] }, { 'background': [] }],
                                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                        ['link', 'code-block'],
                                        ['clean']
                                    ]
                                },
                                placeholder: 'Entrer du contenus plus stylé ici ** Obligatoire **'
                            });
                        
                            // Récupérer les anciennes données
                            const oldContent = document.getElementById('contenu').value;
                            if (oldContent) {
                                quill.root.innerHTML = oldContent;
                            }
                        
                            // Méthode 1 : Utilisation d'un formulaire classique
                            document.getElementById('blogForm').onsubmit = function() {
                                // Récupère le contenu HTML de l'éditeur
                                var contenu = quill.root.innerHTML;
                                // Met à jour le champ caché
                                document.getElementById('contenu').value = contenu;
                                return true;
                            };
                        </script>
</x-app-layout>
