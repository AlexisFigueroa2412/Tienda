<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california','california');
?>
<div class="container Texto">
    <div class="row">
        <div class="col s12 m6 l6">
            <div class="row">
                <form method="post" id="search-form">
                    <div class="input-field col s8 m10 l10">
                        <i class="material-icons prefix">search</i>
                        <input placeholder="Buscar Categoria por nombre" id="search" type="text" name="search"
                            class="validate" required>
                        <label for="search">Buscar Categoría</label>
                    </div>
                    <div class="input-field col s4 m2 l2">
                        <button type="submit" class="btn col s12 waves-effect black">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="container Texto">
        <div class="row">
            <div id="tbody-rows">
                <div>
                </div>
            </div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate("productos.js",null);
?>