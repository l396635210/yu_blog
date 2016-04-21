<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Msg
 *
 * @ORM\Table(name="msg")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MsgRepository")
 */
class Msg
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
     * @var string
     *
     * @ORM\Column(name="nick", type="string", length=30)
     */
    private $nick;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=50)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=32)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="time")
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
     * Set artId
     *
     * @param integer $artId
     *
     * @return Msg
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
     * Set nick
     *
     * @param string $nick
     *
     * @return Msg
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Msg
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Msg
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return Msg
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

