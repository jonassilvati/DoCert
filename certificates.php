<?php
    //list the models of certificates
require_once(__DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$certificados = AdoModeloCertificado::getModelosCertificado();
?>

<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-2 col-md-offset-10">
        <!-- <button id="btn_novo_modelo" class="btn btn-success btn-center"><i class="fa fa-plus"> Novo Modelo</i></button> -->
        <button type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#new-modelo"><i class="fa fa-plus"> Novo Modelo</i></button>
    </div>
</div>

<div class="col-md-12">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>Código</td>
                <td>Nome</td>
                <td>Opções</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($certificados as $modelo) {
                ?>
                <tr>
                    <td><?php echo $modelo['id']; ?></td>
                    <td><?php echo $modelo['nome']; ?></td>
                    <td>
                        <button onclick='viewModelo("<?php echo $modelo['id']; ?>")'  class='btn btn-warning'><i class='fa fa-eye'></i></button>
                        <button onclick='deleteModelo("<?php echo $modelo['id']; ?>")' class='btn btn-danger' ><i class='fa fa-trash'></i></button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>


    <div id="new-modelo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Cadastrar Novo Modelo</h4>
            </div>

            <div class="row form-novo-modelo" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="col-md-10 col-md-offset-1">
                    <!--falta implementar a opcao de fonte. talvez sera apenas uma fonte-->
                    <form enctype="multipart/form-data" id="form-modelo" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input id="nome" type="text" name="nome" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="campos">Campos</label>
                            <textarea name="campos" id="campos" cols="30" rows="4" class="form-control"></textarea>
                            <small class="form-text text-muted">Campos de informação que seram usados no texto (nome, curso, modalidade, etc)</small>
                        </div>
                        <div class="form-group">
                            <label for="fundo">Imagem de Fundo</label>
                            <input id="fundo" type="file" name="fundo" class="form-control-file" />
                        </div>
                        <div class="form-group">
                            <label for="texto">Texto</label>
                            <textarea name="texto" id="texto" cols="50" rows="10" class="form-control"></textarea>
                            <small class="form-text text-muted">Texto modelo com campos antecedidos de "%"</small>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary pull-right" type="submit" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>






