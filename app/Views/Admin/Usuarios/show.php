<?php echo $this->extend('Admin/layout/principal') ?>

<?= $this->section('titulo') ?>
<?php echo $titulo; ?>
<?= $this->endSection() ?>



<?= $this->section('estilos') ?>
<!-- aqui enviamos para a template principal os estilos-->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
<!-- aqui enviamos para a template principal os conteudo principal-->
<div class="col-lg grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="card-header bg-primary pb-0 pt-4">
                <h4 class="card-title">DETALHES DO USUÁRIOS</h4>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded">


                <p class="card-text">
                    <span class="font-weight-bold">Nome:</span>
                    <?php echo $usuario->nome; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">E-mail:</span>
                    <?php echo $usuario->email; ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Ativo:</span>
                    <?php echo ($usuario->ativo ? "Sim" : "Não"); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Perfil:</span>
                    <?php echo ($usuario->is_usuario ? "Admin" : "Professoar"); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Cadastrado em:</span>
                    <?php echo $usuario->criado_em->humanize(); ?>
                </p>
                <p class="card-text">
                    <span class="font-weight-bold">Atualizado em:</span>
                    <?php echo $usuario->atualizado_em->humanize(); ?>
                </p>
                <a href="<?php echo site_url("admin/usuarios/editar/$usuario->id");?>" class=" btn btn-primary btn-sm ">EDITAR</a>
                <a href="<?php echo site_url("admin/usuarios/excluir/$usuario->id");?>" class=" btn btn-danger btn-sm ">EXCLUIR</a>
                <a href="<?php echo site_url("admin/usuarios/");?>" class=" btn btn-light btn-sm ">VOLTAR</a>
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
<?= $this->endSection() ?>