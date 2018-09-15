<?php
/**
 * Created by PhpStorm.
 * User: Kronhyx
 * Date: 12/09/2018
 * Time: 1:33 PM
 */

namespace Kronhyx\TrackerBundle\EventSubscriber;


use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\ManyToOne;
use Kronhyx\TrackerBundle\Entity\Tracker;

/**
 * Class DoctrineSubscriber
 * @package Kronhyx\TrackerBundle\EventSubscriber
 * @author Randy Tellez Galán <kronhyx@gmail.com>
 */
class DoctrineSubscriber implements EventSubscriber
{
    /**
     * @return array
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::preUpdate,
            Events::preRemove,
        ];
    }

    private function isTrackeable(object $entity)
    {
        $reflection = new \ReflectionClass($entity);

        if ($reflection->hasProperty('tracker')) {
            $parser = new AnnotationReader();
            /**@var ManyToOne $relation */
            $relation = $parser->getPropertyAnnotation($reflection->getProperty('tracker'), ManyToOne::class);
            return ($relation->targetEntity === Tracker::class);
        }

        return false;
    }

    /**
     * @param LifecycleEventArgs $eventArgs
     * @throws \ReflectionException
     */
    public function prePersist(LifecycleEventArgs $eventArgs): void
    {
        $entity = $eventArgs->getEntity();

        if ($this->isTrackeable($entity)) {
            $tracker = new Tracker();

            $tracker->setCreatedAt(new \DateTime());
            $entity->setTracker($tracker);
        }

    }

    /**
     * @param LifecycleEventArgs $eventArgs
     * @throws \ReflectionException
     */
    public function preUpdate(LifecycleEventArgs $eventArgs): void
    {
        $entity = $eventArgs->getEntity();

        if ($this->isTrackeable($entity)) {
            /**@var Tracker $tracker */
            $tracker = $entity->getTracker();
            $tracker->setUpdatedAt(new \DateTime());
        }

    }

    /**
     * @param LifecycleEventArgs $eventArgs
     * @throws \ReflectionException
     */
    public function preRemove(LifecycleEventArgs $eventArgs): void
    {
        $entity = $eventArgs->getEntity();

        if ($this->isTrackeable($entity)) {
            /**@var Tracker $tracker */
            $tracker = $entity->getTracker();
            $tracker->setDeletedAt(new \DateTime());
        }

    }

}