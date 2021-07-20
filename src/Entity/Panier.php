<?php
//sharemycode/zud

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Panier
{

    private $lignePaniers;

    public function __construct(){
        $this->lignePaniers = new ArrayCollection();

    }

    public function getLignePaniers(): ?Collection
    {
        return $this->lignePaniers;
    }

    public function setLignePaniers(Collection $lignePaniers): self
    {
        $this->lignePaniers = $lignePaniers;

        return $this;
    }

    public function addLignePanier(LignePanier $lignePanier): self
    {
        //vérifier si produit deja présent dans panier
        foreach ($this->lignePaniers as $ligne) {
            if($ligne->getProduit()->getId() == $lignePanier->getProduit()->getId())
            {
                //si, oui
                    // on modifier lignepanier en ajoutant la nouvelle quantité 
                //si, non
                    // on l'ajoute dans panier
                $qte = $lignePanier->getQuantite()+$ligne->getQuantite();
                $ligne->setQuantite($qte); 
                return $this;
            }
        }
        $this->lignePaniers[] = $lignePanier;
        return $this;
    }

    public function updateLignePanier($idProduit, $quantite): self
    {
        foreach ($this->lignePaniers as $ligne) {
            if($ligne->getProduit()->getId() == $idProduit)
            {
                $ligne->setQuantite($quantite); 
                return $this;
            }
        }
        return $this;
    }

    public function removeLignePanier($idProduit): self
    {
        $this->lignePaniers = $this->lignePaniers->filter(function($ligne) use ($idProduit){//utilise fonction filter [fonction de ArrayCollection] qui prend un argument une autre fonction
        //fonction interne par défaut ne voit pas les varibale globale, on utilise le mot clé USE pour voir variable de la fonction externe.
            return $ligne->getProduit()->getId() != $idProduit;
        });

        return $this;
    }
}
