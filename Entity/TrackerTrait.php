<?php
/**
 * Created by PhpStorm.
 * User: Kronhyx
 * Date: 12/09/2018
 * Time: 12:19 PM
 */

namespace Kronhyx\TrackerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

trait TrackerTrait
{
    /**
     * @var Tracker
     * @ORM\ManyToOne(targetEntity="Kronhyx\TrackerBundle\Entity\Tracker", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $tracker;

    /**
     * @return Tracker
     */
    public function getTracker(): Tracker
    {
        return $this->tracker;
    }

    /**
     * @param Tracker $tracker
     * @return TrackerTrait
     */
    public function setTracker(Tracker $tracker): self
    {
        $this->tracker = $tracker;
        return $this;
    }


}