<?php
    //carregar modelos de certidicado]
    include_once('vendor/autoload.php');

    $certificados = new AdoModeloCertificado();
    $certificados = $certificados->getModelosCertificado();
 ?>
<div class="col-md-12">
    <form action="#" id="form-cert" enctype="multipart/form-data">
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <select name="modelo" id="modelo" class="form-control">
                <?php
                    foreach ($certificados as $modelo) {
                        echo "<option value='".$modelo['id']."'>".$modelo['nome']."</option>";
                    }
                 ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo de saída</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="individual">Individual</option>
                <option value="lote">Arquivo único</option>
            </select>
        </div>
        <div class="form-group">
            <label for="importacao">Dados para importacao (.csv)</label>
            <input type="file" class="form-control-file" id="importacao" name="importacao"/>
        </div>
        <div class="form-group">
            <input class="btn btn-primary btn-lg pull-right" type="submit" value="Gerar">
        </div>
    </form>
</div>


