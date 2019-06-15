

<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-2 col-md-offset-10">
        <!-- <button id="btn_novo_modelo" class="btn btn-success btn-center"><i class="fa fa-plus"> Novo Modelo</i></button> -->
        <button type="button" class="btn btn-primary btn-success" data-toggle="modal" data-target="#new-user"><i class="fa fa-plus"> Novo Usuário</i></button>
    </div>
</div>

<div class="col-md-12">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Usuário</td>
                <td>E-mail</td>
                <td>Último Acesso</td>
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


    <div id="new-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Cadastrar Novo Úsuario</h4>
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
                            <label for="email">E-mail</label>
                            <input id="email" type="email" name="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="usuario">Úsuario</label>
                            <input id="usuario" type="text" name="usuario" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="nivel">Nível de Acesso</label>
                            <input id="nivel" type="text" name="nivel" class="form-control" />
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