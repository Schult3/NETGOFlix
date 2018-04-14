<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavoritRepository")
 */
class Favorit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userid;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $filmid;
    
    public function getUserid(){
        return $this->userid;
    }
    
    public function getFilmid(){
        return $this->filmid;
    }
    
    public function setUserid($userid){
        $this->userid = $userid;
    }
    
    public function setFilmid($filmid){
        $this->filmid = $filmid;
    }
}
