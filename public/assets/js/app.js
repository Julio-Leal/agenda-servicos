document.addEventListener('DOMContentLoaded', function () {

    const links = document.querySelectorAll('.nav-item');

    const conteudo = document.querySelector('#conteudo');

    links.forEach(function (link) {

        link.addEventListener('click', function (event) {

            event.preventDefault();

            const pagina = link.dataset.pagina;

            carregarPagina(pagina);

        });

    });
});