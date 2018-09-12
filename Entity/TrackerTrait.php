<?php
/**
 * Created by PhpStorm.
 * User: Kronhyx
 * Date: 12/09/2018
 * Time: 12:19 PM
 */

namespace Kronhyx\TrackerBundle\Entity;

use App\Entity\Tracker;
use Doctrine\ORM\Mapping as ORM;

trait TrackerTrait
{
    /**
     * @var Tracker
     * @ORM\ManyToOne(targetEntity="Kronhyx\TrackerBundle\Entity\Tracker", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $tracker;
}