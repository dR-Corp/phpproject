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
                <a href="add-categorie">
                    <button class="btn btn-primary btn-sm btn-block addBtn text-bold"><i class="fas fa-plus mr-2" aria-hidden="true"></i> Ajouter</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        
        <div class="card">
            <!-- <div class="card-header bg-lightblue">
                <h3 class="card-title">Total</h3>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Code Raccourci</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach ($categories as $category) :
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $category->getCodeRaccourci(); ?></td>
                                <td><?= $category->getNom(); ?></td>
                                <td>
                                    <a href="edit-categorie-<?= $category->getCodeRaccourci() ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Modifier</a>
                                    <a href="delete-categorie-<?= $category->getCodeRaccourci() ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>Code Raccourci</th>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
</section>
<!-- /.content -->

<script>

    var datatable = $("#datatable").DataTable({

        "processing": true,
        "deferRender": true,
        "stateSave": false,
        "drawCallback": function (setting, json) {

            console.log("all data are loaded into table");
            
            $('[data-toggl="tooltip"]').tooltip({
                trigger: 'hover'
            });

        },
        "responsive": false,
        "autoWidth": false,
        "language" : {
            "sEmptyTable":     "Aucune donnée disponible dans le tableau",
            "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "Afficher _MENU_ éléments",
            "sLoadingRecords": '<div><i class="fas fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
            "sProcessing":     '<div><i class="fas fa-3x fa-spinner fa-spin"></i><div class="text-bold pt-2">Chargement...</div></div>',
            "sSearch":         "Rechercher :",
            "sZeroRecords":    "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst":    "Premier",
                "sLast":     "Dernier",
                "sNext":     "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    } 
            }
        }
    });

</script>