<div class="wrap">
    <h1 class="wp-heading-inline">Calendario de feriados TDF</h1>

    <button class="page-title-action" data-micromodal-trigger="modal-1">open create modal</button>

    <div class="table-container">
        <table id="feriados_table" class="display">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Autor</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Div that handle modal close -->
<!-- <div id="create-feriado-modal" aria-hidden="true">
    <div tabindex="-1" data-micromodal-close>
        <div role="dialog" aria-modal="true" aria-labelledby="create-feriado-modal-title">
            <header>
                <h2 id="create-feriado-modal-title">
                    Modal Title
                </h2>

                <button aria-label="Close modal" data-micromodal-close></button>
            </header>

            <div id="create-feriado-modal-content">
                Modal Content
            </div>
        </div>
    </div>
</div> -->

<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Micromodal
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
                <p>
                    Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                </p>
            </main>
            <footer class="modal__footer">
                <button class="modal__btn modal__btn-primary">Continue</button>
                <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
            </footer>
        </div>
    </div>
</div>