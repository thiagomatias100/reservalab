<?php echo $this->extend('Admin/layout/principal') ?>

<?= $this->section('titulo') ?>
<?php echo $titulo; ?>
<?= $this->endSection() ?>


<?= $this->section('estilos') ?>
<!-- aqui enviamos para a template principal os estilos-->
<link rel="stylesheet" href="<?php echo site_url('\admin\vendors\auto-complete\jquery-ui.css') ?>" ; />
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
<!-- aqui enviamos para a template principal os conteudo principal-->





<div class="row">

    <div class="col-lg grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">LISTA DE USUÁRIOS</h4>
                <!--busca com auto-complete-->
                <div class="ui-widget">
                    <input id="query"  placeholder="Buscar Usuário" name="query" class="form-control bg-light mb-5">
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>matrícula</th>
                                <th>Ativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuario as $user) : ?>



                                <tr>
                                    <td>
                                       <a href="<?php echo site_url("admin/usuarios/show/$user->id");?>"> <?php echo $user->nome; ?></a>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->matricula; ?></td>
                                    <td> <?php echo ($user->ativo ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>'); ?> </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('rodape') ?>
<!-- aqui enviamos para a template principal os conteudo principal-->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- aqui enviamos para a template principal os scripts-->
<script src="<?php echo site_url('\admin\vendors\auto-complete\jquery-ui.js'); ?>"> </script>


<script>
    $(function() {
        $("#query").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('admin/usuarios/procurar'); ?>",
                    dataType: 'json',
                    data: {
                      term: request.term  
                    },
                        success: function(data){
                                if (data.length<1){
                                    var data = [
                                        {
                                            label: 'Usuario nao encontrado',
                                            value: -1
                                        }
                                    ];
                                }
                                response(data);
                        },

                });//fim ajax
            },

            minLenght: 1,
            select: function (event,ui){
                if (ui.item.value == -1){
                    $(this).val("");
                    return false;
                }else{

                    window.location.href='<?php echo site_url('admin/usuarios/show/');?>'+ui.item.id;
                }
            }

        });


    });
</script>
<?= $this->endSection() ?>