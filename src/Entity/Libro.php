<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LibroRepository")
 * @ORM\Table(name="libros")
 */
class Libro
{
    /**
     * @ORM\Column(name="isbn", type="integer")
     * @ORM\Id
     */
    private $isbn;

    /**
     * @ORM\Column(name="n_paginas", type="string", length=45)
     */
    private $n_paginas;

    /**
     * @ORM\Column(name="titulo", type="string", length=45)
     */
    private $titulo;

    /**
     * @ORM\Column(name="sinopsis", type="string")
     */
    private $sinopsis;

    /**
     * @var Editorial
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Editorial")
     * @ORM\JoinColumn(name="editorial_id", referencedColumnName="id")
     *
     */
    protected $editorial;

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getNPaginas()
    {
        return $this->n_paginas;
    }

    /**
     * @param mixed $n_paginas
     */
    public function setNPaginas($n_paginas): void
    {
        $this->n_paginas = $n_paginas;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /**
     * @param mixed $sinopsis
     */
    public function setSinopsis($sinopsis): void
    {
        $this->sinopsis = $sinopsis;
    }

    /**
     * @return Editorial
     */
    public function getEditorial(): Editorial
    {
        return $this->editorial;
    }

    /**
     * @param Editorial $editorial
     */
    public function setEditorial(Editorial $editorial): void
    {
        $this->editorial = $editorial;
    }


}