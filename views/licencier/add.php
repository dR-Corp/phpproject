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
                <a href="licencier">
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
                    <form method="post" action="create-licencier" role="form">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nomLicencier">Nom du Licencier</label>
                                <input type="text" class="form-control" id="nomLicencier" name="nomLicencier" >
                            </div>

                            <div class="form-group">
                                <label for="prenomLicencier">Prénom du Licencier</label>
                                <input type="text" class="form-control" id="prenomLicencier" name="prenomLicencier" >
                            </div>


                            <div class="form-group">
                                <label for="nomc">Nom du Contact</label>
                                <input type="text" class="form-control" id="nomc" name="nomc" >
                            </div>


                            <div class="form-group">
                                <label for="prenomc">Prénom du Contact</label>
                                <input type="text" class="form-control" id="prenomc" name="prenomc" >
                            </div>


                            <div class="form-group">
                                <label for="email">Email du Contact</label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>


                            <div class="form-group">
                                <label for="tel">Téléphone du Contact</label>
                                <input type="text" class="form-control" id="tel" name="tel" >
                            </div>                            
                            
                            <div class="form-group">
                                <label>Catégorie</label>
                                <select class="custom-select" name="categorieCodeRaccourci">
                                    <?php foreach ($categories as $categorie): ?>
                                        <option value="<?php echo $categorie->getCodeRaccourci(); ?>">
                                            <?php echo $categorie->getNom(); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button type="submit" name="addLicencier" class="btn btn-primary">Ajouter</button>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->