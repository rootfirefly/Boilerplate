<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina UI - Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex items-center justify-center relative overflow-hidden">
    
    <!-- Elementos de fundo para efeito Glassmorphism -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-[20%] right-[-10%] w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

    <main class="relative z-10 w-full max-w-md p-8 glass-card rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/60">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-indigo-600 rounded-2xl mx-auto flex items-center justify-center mb-4 shadow-lg shadow-indigo-200">
                <i data-lucide="zap" class="text-white w-6 h-6"></i>
            </div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Acesso Antecipado</h1>
            <p class="text-sm text-slate-500 mt-2">Registe-se para aceder ao sistema.</p>
        </div>

        <form id="leadForm" class="space-y-4">
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1 ml-1">Nome Completo</label>
                <div class="relative">
                    <i data-lucide="user" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                    <input type="text" id="nome" required class="w-full pl-10 pr-4 py-3 bg-white/50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder-slate-400 text-sm" placeholder="O seu nome">
                </div>
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1 ml-1">WhatsApp</label>
                <div class="relative">
                    <i data-lucide="phone" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-slate-400"></i>
                    <input type="tel" id="whatsapp" required class="w-full pl-10 pr-4 py-3 bg-white/50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder-slate-400 text-sm" placeholder="(00) 00000-0000">
                </div>
            </div>
            <button type="submit" class="w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-sm font-medium transition-colors flex items-center justify-center gap-2 shadow-md">
                <span>Garantir Acesso</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
        </form>
        
        <div id="mensagem" class="mt-4 text-center text-sm hidden"></div>
    </main>

    <script src="js/app.js"></script>
</body>
</html>
