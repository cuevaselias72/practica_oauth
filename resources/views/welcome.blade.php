<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica OAuth2 - OIDC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white flex items-center justify-center min-h-screen">
    <div class="bg-slate-800 p-8 rounded-xl shadow-2xl text-center border border-slate-700">
        <h1 class="text-3xl font-bold mb-6">Iniciar Sesión</h1>
        <p class="text-slate-400 mb-8">Selecciona un proveedor para autenticarte mediante OIDC/OAuth2</p>
        
        <div class="flex flex-col gap-4">
            <a href="{{ url('/auth/twitch/redirect') }}" 
               class="bg-[#9146FF] hover:bg-[#772ce8] transition-colors py-3 px-6 rounded-lg font-bold flex items-center justify-center gap-2">
                Entrar con Twitch
            </a>

            <a href="{{ url('/auth/spotify/redirect') }}" 
               class="bg-[#1DB954] hover:bg-[#1ed760] transition-colors py-3 px-6 rounded-lg font-bold flex items-center justify-center gap-2">
                Entrar con Spotify
            </a>
        </div>
    </div>
</body>
</html>