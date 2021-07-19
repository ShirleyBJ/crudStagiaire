<?php

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

    public function removeLignePanier(LignePanier $lignePanier): self
    {
        $this->lignePaniers->removeElement($lignePanier);

        return $this;
    }
}
