<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikeNo
 *
 * @ORM\Table(name="like_no")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LikeNoRepository")
 */
class LikeNo
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
     * @var int
     *
     * @ORM\Column(name="art_id", type="integer")
     */
    private $artId;

    /**
     * @var int
     *
     * @ORM\Column(name="num", type="integer")
     */
    private $num;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="time")
     */
    private $createTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_time", type="time")
     */
    private $updateTime;


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
     * Set artId
     *
     * @param integer $artId
     *
     * @return LikeNo
     */
    public function setArtId($artId)
    {
        $this->artId = $artId;

        return $this;
    }

    /**
     * Get artId
     *
     * @return int
     */
    public function getArtId()
    {
        return $this->artId;
    }

    /**
     * Set num
     *
     * @param integer $num
     *
     * @return LikeNo
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return int
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return LikeNo
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

    /**
     * Set updateTime
     *
     * @param \DateTime $updateTime
     *
     * @return LikeNo
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}

