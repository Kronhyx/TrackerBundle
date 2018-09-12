<?php

namespace Kronhyx\TrackerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @author Randy Téllez Galán <kronhyx@gmail.com>
 */
class Tracker
{

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="object")
     */
    private $createdBy;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="object")
     */
    private $updatedBy;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $deletedAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="object")
     */
    private $deletedBy;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Tracker
     */
    public function setCreatedAt(\DateTime $createdAt): Tracker
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedBy(): \DateTime
    {
        return $this->createdBy;
    }

    /**
     * @param \DateTime $createdBy
     * @return Tracker
     */
    public function setCreatedBy(\DateTime $createdBy): Tracker
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Tracker
     */
    public function setUpdatedAt(\DateTime $updatedAt): Tracker
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedBy(): \DateTime
    {
        return $this->updatedBy;
    }

    /**
     * @param \DateTime $updatedBy
     * @return Tracker
     */
    public function setUpdatedBy(\DateTime $updatedBy): Tracker
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt(): \DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     * @return Tracker
     */
    public function setDeletedAt(\DateTime $deletedAt): Tracker
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedBy(): \DateTime
    {
        return $this->deletedBy;
    }

    /**
     * @param \DateTime $deletedBy
     * @return Tracker
     */
    public function setDeletedBy(\DateTime $deletedBy): Tracker
    {
        $this->deletedBy = $deletedBy;
        return $this;
    }


}
