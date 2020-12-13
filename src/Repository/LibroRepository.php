<?php
namespace App\Repository;

use App\Entity\Libro;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class LibroRepository extends EntityRepository
{
    /**
     * @param Libro $libro
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Libro $libro)
    {
        if (!$this->_em->contains($libro)) {
            $this->_em->persist($libro);
        }

        $this->_em->flush();
    }

}