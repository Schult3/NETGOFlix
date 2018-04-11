<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $genre;
    
    public function getId(){ 
        return $this->id;
    }
    
    
    public function getGenre(){ 
        return $this->genre;
    }
    
    
    public function setGenre($genre){
        $this->genre = $genre;
    }
    
    
}
