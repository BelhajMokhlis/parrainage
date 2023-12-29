<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste de Livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <?php
        $livres = array(
            array(
                "titre" => "Titre du Livre 1",
                "auteur" => "Auteur Mehdi",
                "année_publication" => 2023
            ),
            array(
                "titre" => "Titre du Livre 2",
                "auteur" => "Auteur Moukhlis",
                "année_publication" => 2026
            ),
            array(
                "titre" => "Titre du Livre 3",
                "auteur" => "Auteur Iliyas",
                "année_publication" => 2034
            )
        );
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année de publication</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livres as $livre) : ?>
                    <tr>
                        <td><?php echo $livre['titre']; ?></td>
                        <td><?php echo $livre['auteur']; ?></td>
                        <td><?php echo $livre['année_publication']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>