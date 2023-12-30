<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste de Voitures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <?php

        class Car
        {
            public $marque;
            public $modèle;
            public $année;

            public function __construct($marque, $modèle, $année)
            {
                $this->marque = $marque;
                $this->modèle = $modèle;
                $this->année = $année;
            }
        }

        $voiture1 = new Car("Toyota", "Corolla", 2020);
        $voiture2 = new Car("BMW", "Série 3", 2019);
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Année</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $voiture1->marque; ?></td>
                    <td><?php echo $voiture1->modèle; ?></td>
                    <td><?php echo $voiture1->année; ?></td>
                </tr>
                <tr>
                    <td><?php echo $voiture2->marque; ?></td>
                    <td><?php echo $voiture2->modèle; ?></td>
                    <td><?php echo $voiture2->année; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>