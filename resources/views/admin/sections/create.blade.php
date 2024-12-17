@section('titre','Creation de la section')
<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl text-white font-bold mb-6">Ajouter une section à "{{ $post->titre }}"</h1>

        <form id="blogForm" action="{{ route('admin.sections.store', $post) }}" method="POST" enctype="multipart/form-data">
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
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="contenu">
                    Contenu
                </label>
                <input type="hidden" name="contenu" id="contenu" value="{{ old('contenu') }}">
                        
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
