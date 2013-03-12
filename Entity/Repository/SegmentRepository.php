<?php
namespace Oro\Bundle\SegmentationTreeBundle\Entity\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\QueryBuilder;

use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

/**
 * Repository for Segment entities
 *
 * @author Romain Monceau <romain@akeneo.com>
 * @copyright 2012 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/MIT MIT
 */
class SegmentRepository extends NestedTreeRepository
{
    /**
     * Get children from a parent id
     * @param integer $parentId
     *
     * @return ArrayCollection
     */
    public function getChildrenFromParentId($parentId)
    {
        $parent = $this->findOneBy(array('id' => $parentId));

        return $this->getChildren($parent, true, 'title');
    }

    /**
     * Search Segment entities from an array of criterias
     * @param array $criterias
     *
     * @return ArrayCollection
     */
    public function search($criterias)
    {
        $queryBuilder = $this->createQueryBuilder('c');
        foreach ($criterias as $key => $value) {
            $queryBuilder->andWhere('c.'. $key .' LIKE :'. $key)->setParameter($key, '%'. $value .'%');
        }

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $queryBuilder->orderBy('c.title');

        return $queryBuilder->getQuery()->getResult();
    }
}
