<?php
/**
 * Created by PhpStorm.
 * User: Kronhyx
 * Date: 12/09/2018
 * Time: 4:35 PM
 */

namespace Kronhyx\TrackerBundle\tests\EventSubscriber;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Kronhyx\TrackerBundle\EventSubscriber\DoctrineSubscriber;
use PHPUnit\Framework\TestCase;

final class DoctrineSubscriberTest extends TestCase
{

    /**
     * @var EntityManager
     */
    private $manager;



    public function testGetSubscribedEvents(): void
    {
        $subscriber = new DoctrineSubscriber();

        $this->assertContains(Events::prePersist, $subscriber->getSubscribedEvents());
        $this->assertContains(Events::preUpdate, $subscriber->getSubscribedEvents());
        $this->assertContains(Events::preRemove, $subscriber->getSubscribedEvents());
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function testPrePersist(): void
    {
        $this->manager->persist(new \stdClass());
    }
}
