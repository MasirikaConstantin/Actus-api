<x-app-layout>
    <div class="py-5 px-6 rounded">
        <style>
            .glass {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            .content-section {
                display: none;
            }
            .content-section.active {
                display: block;
            }
        </style>

        <div class="flex">
            <!-- Sidebar -->
            <aside class="glass w-64 min-h-screen p-4 text-white rounded-lg">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                </div>
                
                <nav>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-600 transition-all" onclick="showSection('posts')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8m-2 12a2 2 0 01-2-2v-1"></path>
                                </svg>
                                Posts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-600 transition-all" onclick="showSection('categories')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Catégories
                            </a>
                        </li>
                        <!-- Autres liens du menu... -->

                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-600 transition-all" onclick="showSection('type')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Types de posts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-600 transition-all" onclick="showSection('liens')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                </svg>
                                Liens sociaux
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-600 transition-all" onclick="showSection('utilisateur')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                Utilisateurs
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8">
                <!-- Section Posts -->
                <div id="posts" class="content-section active">
                    <div class="glass rounded-xl p-6 text-white">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Gestion des Posts</h2>
                            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Nouveau Post
                            </button>
                        </div>
                        <!-- Table des posts... (votre code existant) -->


                         <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-4 py-3 text-left">Titre</th>
                                <th class="px-4 py-3 text-left">Catégorie</th>
                                <th class="px-4 py-3 text-left">Type</th>
                                <th class="px-4 py-3 text-left">Date</th>
                                <th class="px-4 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-700 hover:bg-blue-900/50">
                                <td class="px-4 py-3">Mon premier post</td>
                                <td class="px-4 py-3">Tech</td>
                                <td class="px-4 py-3">Article</td>
                                <td class="px-4 py-3">13/12/2024</td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-400 hover:text-blue-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <button class="text-red-400 hover:text-red-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-end mt-4">
                    <nav class="flex space-x-2">
                        <button class="px-3 py-1 rounded glass hover:bg-blue-600">Précédent</button>
                        <button class="px-3 py-1 rounded bg-blue-600">1</button>
                        <button class="px-3 py-1 rounded glass hover:bg-blue-600">2</button>
                        <button class="px-3 py-1 rounded glass hover:bg-blue-600">3</button>
                        <button class="px-3 py-1 rounded glass hover:bg-blue-600">Suivant</button>
                    </nav>
                </div>


                    </div>
                </div>

                <!-- Section Catégories -->
                <div id="categories" class="content-section">
                    <div class="glass rounded-xl p-6 text-white">
                        @session('success')
       
                            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                <span class="font-medium">Message de success!</span> {{ session('success') }}.
                                </div>
                            </div>

                        @endsession
                        <div class="flex justify-between items-center mb-6">
                            
                            <h2 class="text-2xl font-bold">Gestion des Catégories</h2>
                            <a href="{{ route('admin.newcat') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Nouvelle Catégorie
                            </a>
                        </div>
                        <!-- Table des catégories... -->

                        <div class="">
                            <table class="w-full overflow-x-auto">
                                <thead>
                                    <tr class="border-b border-gray-700">
                                        <th class="px-4 py-3 text-left">Nom</th>
                                        <th class="px-4 py-3 text-left">Description</th>
                                        <th class="px-4 py-3 text-left">Date de création</th>
                                        <th class="px-4 py-3 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $a=0;

                                    @endphp
                                    @foreach($categories as $categorie)
                                    @php
                                        $k=$a++ ."a";
                                    @endphp
                                    <tr class="border-b border-gray-700 hover:bg-blue-900/50">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center mr-3">
                                                    <span class="text-sm font-bold">{{ substr($categorie->name, 0, 3) }}</span>
                                                </div>
                                                {{ $categorie->name }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">{{ Str::limit($categorie->description,70) }}</td>
                                        
                                        <td class="px-4 py-3">{{ $categorie->created_at ? $categorie->created_at->format('d/m/Y'): "N/A" }}</td>
                                        
                                        <td class="px-4 py-3">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.editcat',['categorie'=>$categorie]) }}" class="text-blue-400 hover:text-blue-300">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                 <!-- Remplacer le bouton de suppression par celui-ci -->
                                                

                                                <form id="delete-form-{{ $categorie->id }}" action="{{ route('admin.deletecat', ['categorie' =>$categorie]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="button" onclick="confirmDelete({{ $categorie->id }}, '{{ $categorie->name }}')"  class="text-red-400 hover:text-red-300">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                                
                                                <script>
                                                    function confirmDelete(id, name) {
                                                        const confirmed = confirm(`Êtes-vous sûr de vouloir supprimer ${name} ?`);
                                                        if (confirmed) {
                                                            document.getElementById(`delete-form-${id}`).submit();
                                                        }
                                                    }
                                                </script>
                                                
                                            </div>
                                        </td>
                                    </tr>

                                    
    
                                    @endforeach
                                </tbody>
                            </table>

                           
                            
                        </div>
                
                        <!-- Pagination -->
                        <div class="flex justify-end mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>

                <!-- Ajoutez d'autres sections pour les autres contenus -->

                <div id="liens" class="content-section">
                    <div class="glass rounded-xl p-6 text-white">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Gestion des Liens</h2>
                            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Ajoutez un lien Social
                            </button>
                        </div>
                        <!-- Table des catégories... -->
                    </div>
                </div>


                <div id="utilisateur" class="content-section">
                    <div class="glass rounded-xl p-6 text-white">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Gestion des utilisateurs</h2>
                            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Ajoutez un Utilisateur
                            </button>
                        </div>
                        <!-- Table des catégories... -->

                         <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="px-4 py-3 text-left">Nom</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Rôle</th>
                        <th class="px-4 py-3 text-left">Date d'inscription</th>
                        <th class="px-4 py-3 text-left">Statut</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b border-gray-700 hover:bg-blue-900/50">
                        <td class="px-4 py-3">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center mr-3">
                                    <span class="text-sm font-bold">{{ substr($user->name, 0, 2) }}</span>
                                </div>
                                {{ $user->name }}
                            </div>
                        </td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs 
                                {{ $user->role === 'admin' ? 'bg-purple-500' : 'bg-blue-500' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs 
                                {{ $user->status === 'active' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $user->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <button class="text-blue-400 hover:text-blue-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button class="text-red-400 hover:text-red-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-end mt-4">
            {{ $users->links() }}
        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Cacher toutes les sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Afficher la section sélectionnée
            document.getElementById(sectionId).classList.add('active');
        }
        document.addEventListener('DOMContentLoaded', () => {
    // Vérifier si une ancre est présente dans l'URL
    const hash = window.location.hash;
    if (hash && hash === '#categories') {
        showSection('categories');
    }
});

    </script>
</x-app-layout>