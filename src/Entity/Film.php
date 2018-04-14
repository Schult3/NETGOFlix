<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
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
    private $titel;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $jahr;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $genre;
    
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $imdbid;
    
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $posterurl;
    
    
    public function getId(){ 
        return $this->id;
    }
    
    public function getTitel(){ 
        return $this->titel;
    }
    
    public function getJahr(){ 
        return $this->jahr;
    }
    
    public function getGenre(){ 
        return $this->genre;
    }
    
    public function getImdbid(){ 
        return $this->imdbid;
    }
    
    public function getPosterurl(){ 
        return $this->posterurl;
    }
    
    public function setTitel($titel){
        $this->titel = $titel;
    }
    
    public function setJahr($jahr){
        $this->jahr = $jahr;
    }
    
    public function setGenre($genre){
        $this->genre = $genre;
    }
    
    public function setImdbid($imdbid){
        $this->imdbid = $imdbid;
    } 
    
    public function setPosterurl($posterurl){
        $this->posterurl = $posterurl;
    } 
}
