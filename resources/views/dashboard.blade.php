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
            <aside class="glass w-64 min-h-screen p-4 text-gray-900 dark:text-white bg-white dark:bg-gray-800 rounded-lg">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                </div>
                
                <nav>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all" onclick="showSection('posts')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8m-2 12a2 2 0 01-2-2v-1"></path>
                                </svg>
                                Posts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all" onclick="showSection('categories')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Catégories
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all" onclick="showSection('type')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Types de posts
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all" onclick="showSection('socials')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                </svg>
                                Liens sociaux
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all" onclick="showSection('utilisateur')">
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
                    <div class="glass rounded-xl p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Gestion des Posts</h2>
                            <a href="{{ route('admin.posts.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                                Tous les posts
                            </a>
                            <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Nouveau Post
                            </a>
                        </div>
                
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th class="px-4 py-3 text-left">Titre</th>
                                        <th class="px-4 py-3 text-left">Catégorie</th>
                                        <th class="px-4 py-3 text-left">Type</th>
                                        <th class="px-4 py-3 text-left">Etat</th>
                                        <th class="px-4 py-3 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                            <td class="px-6 py-4">{{ $post->titre }}</td>
                                            <td class="px-6 py-4">{{ $post->categorie->name }}</td>
                                            <td class="px-6 py-4">{{ $post->type->id }}</td>
                                            <td class="px-6 py-4">
                                                <span class="px-2 py-1 rounded {{ $post->status ? 'bg-green-200 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-red-200 dark:bg-red-900 text-red-800 dark:text-red-200' }}">
                                                    {{ $post->status ? 'Publié' : 'Brouillon' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.sections.create', $post) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                                        Ajouter des sections
                                                    </a>
                                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                                        Modifier
                                                    </a>
                                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('admin.posts.show', $post) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                
                        <div class="flex justify-end mt-4">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>

                <!-- Section Catégories -->
                <div id="categories" class="content-section">
                    <div class="glass rounded-xl p-6 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                        @session('success')
                            <div class="flex items-center p-4 mb-4 text-sm text-green-800 dark:text-green-400 bg-green-50 dark:bg-gray-800/50 rounded-lg" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Message de success!</span> {{ session('success') }}
                                </div>
                            </div>
                        @endsession
                
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Gestion des Catégories</h2>
                            <a href="{{ route('admin.newcat') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Nouvelle Catégorie
                            </a>
                        </div>
                
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
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
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-full bg-blue-500 dark:bg-blue-600 text-white flex items-center justify-center mr-3">
                                                    <span class="text-sm font-bold">{{ substr($categorie->name, 0, 3) }}</span>
                                                </div>
                                                {{ $categorie->name }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">{!! $categorie->description !!}</td>
                                        <td class="px-4 py-3">{{ $categorie->created_at ? $categorie->created_at->format('d/m/Y'): "N/A" }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.editcat',['categorie'=>$categorie]) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                
                                                <form id="delete-form-{{ $categorie->id }}" action="{{ route('admin.deletecat', ['categorie' =>$categorie]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="confirmDelete({{ $categorie->id }}, '{{ $categorie->name }}')" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                
                        
                    </div>
                </div>
                
                <script>
                    function confirmDelete(id, name) {
                        const confirmed = confirm(`Êtes-vous sûr de vouloir supprimer ${name} ?`);
                        if (confirmed) {
                            document.getElementById(`delete-form-${id}`).submit();
                        }
                    }
                </script>
               
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


                
                        <!-- Table des catégories... -->

                         <!-- Section Utilisateurs -->
                         <div id="utilisateur" class="content-section">
                            <div class="glass rounded-xl p-6 text-white bg-gray-700 dark:bg-gray-800">
                                @session('success')
                                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 bg-green-50 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">Message de succès!</span> {{ session('success') }}.
                                        </div>
                                    </div>
                                @endsession
                        
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200">Gestion des Utilisateurs</h2>
                                </div>
                        
                                <div>
                                    <table class="w-full overflow-x-auto text-gray-900 dark:text-gray-200">
                                        <thead>
                                            <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-700">
                                                <th class="px-4 py-3 text-left">Nom</th>
                                                <th class="px-4 py-3 text-left">Email</th>
                                                <th class="px-4 py-3 text-left">Date d'inscription</th>
                                                <th class="px-4 py-3 text-left">Rôle</th>
                                                <th class="px-4 py-3 text-left">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900/50">
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center">
                                                        <div class="w-8 h-8 rounded-full bg-blue-500 text-white dark:bg-blue-400 flex items-center justify-center mr-3">
                                                            <span class="text-sm font-bold">{{ substr($user->name, 0, 2) }}</span>
                                                        </div>
                                                        {{ $user->name }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3">{{ $user->email }}</td>
                                                <td class="px-4 py-3">{{ $user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}</td>
                                                <td class="px-4 py-3">
                                                    @if($user->role === 0)
                                                        <span class="px-2 py-1 bg-red-500 text-white rounded-full text-xs dark:bg-red-400">Admin</span>
                                                    @else
                                                        <span class="px-2 py-1 bg-blue-500 text-white rounded-full text-xs dark:bg-blue-400">Utilisateur</span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex space-x-2">
                                                        @if(auth()->user()->id !== $user->id)
                                                            <form id="role-form-{{ $user->id }}" action="{{ route('admin.toggleUserRole', ['user' => $user]) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="button" onclick="confirmRoleChange({{ $user->id }}, '{{ $user->name }}', {{ $user->role }})" class="{{ $user->role === 0 ? 'text-red-400 hover:text-red-300' : 'text-blue-400 hover:text-blue-300 dark:hover:text-blue-200' }}">
                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                                    </svg>
                                                                </button>
                                                            </form>
                        
                                                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.deleteUser', ['user' => $user]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')" class="text-red-400 hover:text-red-300 dark:hover:text-red-200">
                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        @endif
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
                        

<div id="socials" class="content-section">
    <div class="glass rounded-xl p-6 text-gray-800 dark:text-white bg-white dark:bg-gray-800 shadow-lg">
        @session('success')
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 dark:text-green-400 rounded-lg bg-green-50 dark:bg-gray-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div>
                    <span class="font-medium">Message de succès!</span> {{ session('success') }}.
                </div>
            </div>
        @endsession

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Gestion des Réseaux Sociaux</h2>
            <a href="{{ route('admin.socials.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                Ajouter un réseau social
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="px-4 py-3 text-left">Nom</th>
                        <th class="px-4 py-3 text-left">URL</th>
                        <th class="px-4 py-3 text-left">Date de création</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($socials as $social)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-4 py-3">{{ $social->name }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ $social->url }}" target="_blank" class="text-blue-500 dark:text-blue-400 hover:text-blue-600 dark:hover:text-blue-300">
                                {{ $social->url }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $social->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.socials.edit', $social) }}" class="text-blue-500 dark:text-blue-400 hover:text-blue-600 dark:hover:text-blue-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('admin.socials.destroy', $social) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce réseau social ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-600 dark:hover:text-red-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-4">
            {{ $socials->links() }}
        </div>
    </div>
</div>


<script>
function confirmRoleChange(id, name, currentRole) {
    const newRole = currentRole === 0 ? 'utilisateur' : 'administrateur';
    const confirmed = confirm(`Voulez-vous vraiment changer le rôle de ${name} en ${newRole} ?`);
    if (confirmed) {
        document.getElementById(`role-form-${id}`).submit();
    }
}

    function confirmDelete(id, name) {
        const confirmed = confirm(`Êtes-vous sûr de vouloir supprimer l'utilisateur ${name} ?`);
        if (confirmed) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>

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


        document.addEventListener('DOMContentLoaded', () => {
            // Vérifier si une ancre est présente dans l'URL
            const hash = window.location.hash;
            if (hash && hash === '#utilisateur') {
                showSection('utilisateur');
            }
        });
        
        document.addEventListener('DOMContentLoaded', () => {
            // Vérifier si une ancre est présente dans l'URL
            const hash = window.location.hash;
            if (hash && hash === '#socials') {
                showSection('socials');
            }
        });
        

    </script>
</x-app-layout>