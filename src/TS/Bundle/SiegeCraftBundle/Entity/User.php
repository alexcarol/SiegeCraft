<?php

namespace TS\Bundle\SiegeCraftBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="web_user")
 */
class User extends BaseUser {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}