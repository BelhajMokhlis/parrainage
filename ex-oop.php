<?php
class Livre
{
    public $titre;
    protected $auteur;
    private $nbPages;
    public $disponible;

    public function __construct($titre, $auteur, $nbPages, $disponible)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->setNbPages($nbPages);
        $this->disponible = $disponible;
    }

    public function getNbPages()
    {
        return $this->nbPages;
    }

    public function setNbPages($nbPages)
    {
        if ($nbPages >= 0) {
            $this->nbPages = $nbPages;
        } else {
            echo "Le nombre de pages ne peut pas être négatif.";
        }
    }
}

$livre = new Livre("Titre du Livre", "Auteur du Livre", 250, true);

echo "Titre du livre : " . $livre->titre . "<br>";

$livre->setNbPages(-50);

echo "Nombre de pages : " . $livre->getNbPages() . "<br>";
