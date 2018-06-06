<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 06.06.18
 * Time: 13:40
 */

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var bool
     * @Assert\NotBlank(groups={"Registration"})
     */
    private $acceptRules;
    public function __construct()
    {
        parent::__construct();
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->roles = ['ROLE_USER'];
        $this->acceptRules = false;
        $this->orders = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isAcceptRules(): bool
    {
        return $this->acceptRules;
    }

    /**
     * @param bool $acceptRules
     */
    public function setAcceptRules(bool $acceptRules): void
    {
        $this->acceptRules = $acceptRules;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}