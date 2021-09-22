<?php echo $this->extend('Admin/layout/principal')?>

<?= $this->section('titulo') ?> 
      <?php echo $titulo;?>
<?= $this->endSection() ?>



<?= $this->section('estilos') ?>
    <!-- aqui enviamos para a template principal os estilos-->
<?= $this->endSection() ?>

<?= $this->section('conteudo') ?>
<!-- aqui enviamos para a template principal os conteudo principal-->
<?php foreach ($usuario as $user):?>
    <?php echo $user->nome; ?></br>
    <?php echo $user->email; ?>

    <?php endforeach;?>
  
<?= $this->endSection() ?>

<?= $this->section('rodape') ?>
<!-- aqui enviamos para a template principal os conteudo principal-->

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- aqui enviamos para a template principal os scripts-->
<?= $this->endSection() ?>