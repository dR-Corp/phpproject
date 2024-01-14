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
                <a href="categorie">
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
                    <form method="post" action="update-categorie-<?= $categorie['codeRaccourci'] ?>" role="form">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="codeRaccourci">Code Raccourci</label>
                                <input type="text" class="form-control" value="<?= $categorie['codeRaccourci'] ?>" id="codeRaccourci" name="codeRaccourci" >
                            </div>

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" value="<?= $categorie['nom'] ?>" id="nom" name="nom" >
                            </div>

                            <button type="submit" name="editCategorie" class="btn btn-primary">Modifier</button>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->