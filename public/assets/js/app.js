document.addEventListener('DOMContentLoaded', function () {

    const conteudo = document.querySelector('#conteudo');

    document.addEventListener('click', function (event) {
        const acao = event.target.closest('[data-acao]');

        if (acao && acao.dataset.acao === 'excluir-cliente') {

            const id = acao.dataset.id;

            const confirmar = confirm(
                'Tem certeza que deseja excluir este cliente?'
            );

            if (!confirmar) {
                return;
            }

            fetch(
                'index.php?pagina=clientes&acao=delete&id=' + id
            )
                .then(function (response) {

                    if (!response.ok) {
                        throw new Error('Erro ao excluir cliente.');
                    }

                    return response.text();
                })
                .then(function () {

                    carregarPagina('clientes');
                })
                .catch(function (erro) {

                    console.error(erro);

                    alert('Não foi possível excluir o cliente.');
                });

            return;
        }

        const elemento = event.target.closest('[data-pagina]');

        if (!elemento) {
            return;
        }

        event.preventDefault();

        const pagina = elemento.dataset.pagina;
        const id = elemento.dataset.id;

        carregarPagina(pagina, id);
    });

    function carregarPagina(pagina, id = null) {

        let url = 'index.php?pagina=' + pagina;

        if (id) {
            url += '&id=' + id;
        }

        fetch(url)
            .then(function (response) {

                if (!response.ok) {
                    throw new Error('Erro ao carregar a página.');
                }

                return response.text();
            })
            .then(function (html) {

                conteudo.innerHTML = html;

                atualizarMenuAtivo(pagina);
            })
            .catch(function (erro) {

                console.error(erro);

                conteudo.innerHTML = `
                    <div class="content-card">
                        <div class="empty-state">
                            <h3>Erro ao carregar a página</h3>
                            <p>
                                Não foi possível carregar o conteúdo.
                            </p>
                        </div>
                    </div>
                `;
            });
    }

    function atualizarMenuAtivo(pagina) {

        const links = document.querySelectorAll('.nav-item');

        links.forEach(function (link) {
            link.classList.remove('nav-item--active');
        });

        const linkAtivo = document.querySelector(
            '.nav-item[data-pagina="' + pagina + '"]'
        );

        if (linkAtivo) {
            linkAtivo.classList.add('nav-item--active');
        }
    }

    
    document.addEventListener('submit', async function (event) {

        const formulario = event.target.closest(
            '#form-cliente, #form-servico, #form-profissional, #form-usuario'
        );

        if (!formulario) {
            return;
        }

        event.preventDefault();
        //temp para teste:
        //console.log('Formulário interceptado:', formulario.id); VALIDADO
        //temp para teste:

        const dados = new FormData(formulario);

        try {

            const response = await fetch(formulario.action, {
                method: 'POST',
                body: dados
            });

            const resultado = await response.json();

            if (!response.ok || !resultado.sucesso) {

                const erros = resultado.erros || [
                    resultado.mensagem || 'Não foi possível salvar os dados.'
                ];

                alert(erros.join('\n'));
                return;
            }

            // Após o sucesso, retorna para a listagem.
            const paginaRetorno = formulario.dataset.paginaRetorno;

            carregarPagina(paginaRetorno);

        } catch (erro) {

            console.error('Erro ao enviar formulário:', erro);

            alert('Não foi possível processar a solicitação.');
        }
    });
});