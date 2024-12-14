@section('titre','Les Posts')
<x-app-layout>

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Articles</h1>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Nouvel article
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Titre</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Catégorie</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Type</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Status</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Actions</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left">Suivre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $post->titre }}</td>
                        <td class="px-6 py-4 border-b">{{ $post->categorie->name }}</td>
                        <td class="px-6 py-4 border-b">{{ $post->type->id }}</td>
                        <td class="px-6 py-4 border-b">
                            <span class="px-2 py-1 rounded {{ $post->status ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ $post->status ? 'Publié' : 'Brouillon' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 border-b">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:text-blue-900">
                                    Ajouter des sections
                                </a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:text-blue-900">
                                    Modifier
                                </a>
                                
                                  

                                
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('admin.posts.show', $post) }}" class="text-blue-400 hover:text-blue-900">
                                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
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

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
</x-app-layout>
