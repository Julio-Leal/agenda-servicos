document.addEventListener('DOMContentLoaded', function () {

    const conteudo = document.querySelector('#conteudo');

    document.addEventListener('click', function (event) {

        const elemento = event.target.closest('[data-pagina]');

        if (!elemento) {
            return;
        }

        event.preventDefault();

        const pagina = elemento.dataset.pagina;

        carregarPagina(pagina);
    });

    function carregarPagina(pagina) {

        fetch('index.php?pagina=' + pagina)
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

});