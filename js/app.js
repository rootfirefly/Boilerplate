// Inicializar Ícones Lucide
lucide.createIcons();

document.getElementById('leadForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const botão = e.target.querySelector('button');
    const divMensagem = document.getElementById('mensagem');
    const nome = document.getElementById('nome').value;
    const whatsapp = document.getElementById('whatsapp').value;
    
    // Estado de carregamento
    botão.innerHTML = '<i data-lucide="loader-2" class="w-4 h-4 animate-spin"></i> Processando...';
    lucide.createIcons();
    botão.disabled = true;

    try {
        const resposta = await fetch('api/captura.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nome, whatsapp })
        });

        const dados = await resposta.json();

        divMensagem.classList.remove('hidden', 'text-red-500', 'text-green-500');
        
        if (dados.sucesso) {
            divMensagem.textContent = 'Registo concluído com sucesso!';
            divMensagem.classList.add('text-green-600');
            e.target.reset();
        } else {
            divMensagem.textContent = 'Erro ao registar. Tente novamente.';
            divMensagem.classList.add('text-red-500');
        }
    } catch (erro) {
        divMensagem.classList.remove('hidden');
        divMensagem.textContent = 'Erro de ligação com o servidor.';
        divMensagem.classList.add('text-red-500');
    } finally {
        // Restaurar botão
        botão.innerHTML = '<span>Garantir Acesso</span><i data-lucide="arrow-right" class="w-4 h-4"></i>';
        lucide.createIcons();
        botão.disabled = false;
    }
});
