<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0 text-dark">
                    <?= $titlePage; ?>
                </h1>
            </div>
            <div class="col-sm-2" id="addBtnField">
                <a href="educateur">
                    <button class="btn btn-primary btn-sm btn-block addBtn text-bold"><i class="fas fa-chevron-left mr-2" aria-hidden="true"></i> Retour</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary">
                    
                    <!-- form start -->
                    <form method="post" action="create-educateur" role="form">
                        <div class="card-body">


                            <div class="form-group">
                                <label>Licencié</label>
                                <select class="custom-select" name="licencie">
                                    <?php foreach ($licencies as $licencier): ?>
                                        <option value="<?php echo $licencier->getNumeroLicence(); ?>">
                                            <?php echo $licencier->getNumeroLicence() . ' - ' . $licencier->getNom() . ' ' . $licencier->getPrenom(); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>


                            <div class="form-group">
                                <label for="mdp">Mot de passe</label>
                                <input type="password" class="form-control" id="mdp" name="mdp" >
                            </div>                            

                            <div class="form-group custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="estAdmin" id="estAdmin">
                                <label for="estAdmin" class="custom-control-label">Est administrateur</label>
                            </div>

                            <button type="submit" name="addEducateur" class="btn btn-primary">Ajouter</button>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->