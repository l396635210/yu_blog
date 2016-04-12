<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cat
 *
 * @ORM\Table(name="cat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CatRepository")
 */
class Cat
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="art_cnt", type="smallint")
     */
    private $artCnt;

    /**
     * @var int
     *
     * @ORM\Column(name="create_id", type="integer")
     */
    private $createId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="date")
     */
    private $createTime;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Cat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set artCnt
     *
     * @param integer $artCnt
     *
     * @return Cat
     */
    public function setArtCnt($artCnt)
    {
        $this->artCnt = $artCnt;

        return $this;
    }

    /**
     * Get artCnt
     *
     * @return int
     */
    public function getArtCnt()
    {
        return $this->artCnt;
    }

    /**
     * Set createId
     *
     * @param integer $createId
     *
     * @return Cat
     */
    public function setCreateId($createId)
    {
        $this->createId = $createId;

        return $this;
    }

    /**
     * Get createId
     *
     * @return int
     */
    public function getCreateId()
    {
        return $this->createId;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return Cat
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }
}
