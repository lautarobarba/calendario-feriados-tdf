<div class="wrap">
    <h1 id="add-new-feriado">Agregar un nuevo feriado</h1>

    <p>Crea un nuevo feriado y lo agregar al calendario anual.</p>

    <div id="ajax-response"></div>

    <form method="post" name="createferiado" id="createferiado" class="validate" novalidate="novalidate">
        <!-- <input name="action" type="hidden" value="createferiado" /> -->
        <!-- TODO: Falta revisar seguridad -->

        <table class="form-table" role="presentation">
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="feriado_title">Nombre del feriado <span class="description">(requerido)</span></label>
                </th>
                <td>
                    <input name="feriado_title" type="text" id="feriado_title" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="100" />
                </td>
            </tr>

            <tr class="form-field form-required">
                <th scope="row">
                    <label for="feriado_date">Fecha del feriado <span class="description">(requerido)</span></label>
                </th>
                <td>
                    <input name="feriado_date" type="date" id="feriado_date" value="" aria-required="true" autocapitalize="none" autocorrect="off" autocomplete="off" maxlength="100" />
                </td>
            </tr>

            <tr>
                <th scope="row">Selecciones las ciudades válidas para este feriado</th>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="valido_ushuaia" id="valido_ushuaia" value="1" checked='checked' />
                    <label for="valido_ushuaia">Ushuaia</label>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="checkbox" name="valido_tolhuin" id="valido_tolhuin" value="1" checked='checked' />
                    <label for="valido_tolhuin">Tolhuin</label>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="checkbox" name="valido_rio_grande" id="valido_rio_grande" value="1" checked='checked' />
                    <label for="valido_rio_grande">Río Grande</label>
                </td>
            </tr>

            <tr>
                <th scope="row">Tipo de feriado</th>
                <td>
                    <select name="feriado_tipo" id="feriado_tipo">
                        <option value="nacional" selected="selected">Feriado nacional</option>
                        <option value="provincial">Feriado provincial</option>
                        <option value="local">Feriado local</option>
                    </select>
                </td>
            </tr>
        </table>

        <p class="submit">
            <input type="submit" name="createferiado" id="createferiadosub" class="button button-primary" value="Agregar un nuevo feriado" />
        </p>
    </form>

    <button id="test-button">Test ajax call</button>
</div>