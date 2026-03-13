<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Usuarios OAuth</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-400">Panel de Usuarios Autenticados</h1>
            <a href="/" class="bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-lg text-sm">Volver al Inicio</a>
        </div>

        <div class="bg-slate-800 rounded-xl shadow-xl overflow-hidden border border-slate-700">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-700 text-indigo-200">
                        <th class="p-4">Avatar</th>
                        <th class="p-4">Nombre</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Proveedor</th>
                        <th class="p-4">ID Externo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @foreach($users as $user)
                    <tr class="hover:bg-slate-750 transition-colors">
                        <td class="p-4">
                            <img src="{{ $user->avatar }}" alt="Avatar" class="w-10 h-10 rounded-full border border-slate-600">
                        </td>
                        <td class="p-4 font-medium">{{ $user->name }}</td>
                        <td class="p-4 text-slate-400">{{ $user->email }}</td>
                        <td class="p-4">
                            <span class="px-2 py-1 rounded text-xs font-bold uppercase 
                                {{ $user->provider_name == 'twitch' ? 'bg-purple-900 text-purple-200' : 'bg-green-900 text-green-200' }}">
                                {{ $user->provider_name }}
                            </span>
                        </td>
                        <td class="p-4 text-xs font-mono text-slate-500">{{ $user->provider_id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <p class="mt-4 text-slate-500 text-sm italic">
            * Estos datos fueron obtenidos mediante el flujo de identidad de OpenID Connect.
        </p>
    </div>
</body>
</html>