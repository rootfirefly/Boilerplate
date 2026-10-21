lucide.createIcons();

document.getElementById('leadForm').addEventListener('submit', (e) => {
    e.preventDefault();
    
    const form = e.target;
    const header = document.getElementById('headerForm');
    const successState = document.getElementById('successState');
    const botão = form.querySelector('button');
    
    const nome = document.getElementById('nome').value;
    const whatsapp = document.getElementById('whatsapp').value;
    
    // 1. Inicia a animação de carregamento no botão
    botão.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> Processando...';
    lucide.createIcons();
    botão.disabled = true;
    botão.classList.add('opacity-80', 'cursor-not-allowed');

    // 2. Simula o tempo de uma requisição de rede (1.5 segundos)
    setTimeout(() => {
        // Grava no LocalStorage
        const leadsAntigos = JSON.parse(localStorage.getItem('LuminaLeads')) || [];
        leadsAntigos.push({
            nome: nome,
            whatsapp: whatsapp,
            data: new Date().toLocaleString('pt-PT')
        });
        localStorage.setItem('LuminaLeads', JSON.stringify(leadsAntigos));

        // Esconde o formulário e mostra a tela de sucesso com animação
        form.classList.add('hidden');
        header.classList.add('hidden');
        successState.classList.remove('hidden');
        successState.classList.add('flex');
        
    }, 1500);
});

// Botão para resetar o teste e voltar ao formulário
document.getElementById('btnReset').addEventListener('click', () => {
    const form = document.getElementById('leadForm');
    const header = document.getElementById('headerForm');
    const successState = document.getElementById('successState');
    const botão = form.querySelector('button');

    form.reset();
    botão.disabled = false;
    botão.classList.remove('opacity-80', 'cursor-not-allowed');
    botão.innerHTML = '<span>Garantir Acesso</span><i data-lucide="arrow-right" class="w-4 h-4"></i>';
    lucide.createIcons();

    successState.classList.add('hidden');
    successState.classList.remove('flex');
    form.classList.remove('hidden');
    header.classList.remove('hidden');
});
