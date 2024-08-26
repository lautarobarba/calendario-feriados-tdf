<div class="wrap">
    <h1 class="wp-heading-inline">Calendario de feriados TDF</h1>

    <button class="page-title-action" data-micromodal-trigger="create-feriado-modal">Agregar nuevo feriado</button>

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

<div class="modal micromodal-slide" id="create-feriado-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="create-feriado-modal-title">
            <header class="modal__header">
                <h2 class="modal__title" id="create-feriado-modal-title">
                    Agregar nuevo feriado
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <form method="post" name="createferiado" id="createferiado" class="validate" novalidate="novalidate">
                <main class="modal__content" id="create-feriado-modal-content">

                    <div class="form__label">
                        <label for="feriado_title">
                            <strong>Nombre del feriado <span class="description">(requerido)</span></strong>
                        </label>
                    </div>
                    <input
                        id="feriado_title"
                        name="feriado_title"
                        type="text"
                        class="form__input"
                        value=""
                        aria-required="true"
                        autocapitalize="none"
                        autocorrect="off"
                        autocomplete="off"
                        maxlength="100" />

                    <div class="form__label">
                        <label for="feriado_date">
                            <strong>Fecha del feriado <span class="description">(requerido)</span></strong>
                        </label>
                    </div>
                    <input
                        id="feriado_date"
                        name="feriado_date"
                        type="date"
                        class="form__input"
                        value=""
                        aria-required="true"
                        autocapitalize="none"
                        autocorrect="off"
                        autocomplete="off"
                        maxlength="100" />

                    <div class="form__label">
                        <label for="feriado_tipo">
                            <strong>Tipo de feriado <span class="description">(requerido)</span></strong>
                        </label>
                    </div>
                    <select name="feriado_tipo[]" id="feriado_tipo" class="form__input">
                        <option value="nacional" selected="selected">Feriado nacional</option>
                        <option value="provincial">Feriado provincial</option>
                        <option value="local">Feriado local</option>
                    </select>

                    <div class="form__label">
                        <label for="feriado_ciudad">
                            <strong>Selecciones las ciudades válidas para este feriado <span class="description">(requerido)</span></strong>
                        </label>
                    </div>
                    <select name="feriado_ciudad[]" id="feriado_ciudad" class="form__input" multiple>
                        <option value="ushuaia" selected="selected">Ushuaia</option>
                        <option value="tolhuin" selected="selected">Tolhuin</option>
                        <option value="rio_grande" selected="selected">Río Grande</option>
                    </select>

                </main>
                <footer class="modal__footer">
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">CANCELAR</button>
                    <button class="modal__btn modal__btn-primary">GUARDAR</button>
                </footer>
            </form>
        </div>
    </div>
</div>