<?php
namespace App\Repository;

use App\Entity\Editorial;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class EditorialRepository extends EntityRepository
{
    /**
     * @param Editorial $editorial
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Editorial $editorial)
    {
        if (!$this->_em->contains($editorial)) {
            $this->_em->persist($editorial);
        }

        $this->_em->flush();
    }

}