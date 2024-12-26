<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

</head>
<body>
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
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>
</html>