<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nickname;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Text;

    /**
     * @var Post
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="comment")
     * @ORM\JoinColumn(name="post_id")
     */
    private $post;

    public function __construct()
    {
        $this->DateTime = new \DateTime();

    }


    public function getId()
    {
        return $this->id;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->DateTime;
    }

    public function setDateTime(?\DateTimeInterface $DateTime): self
    {
        $this->DateTime = $DateTime;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->Nickname;
    }

    public function setNickname(?string $Nickname): self
    {
        $this->Nickname = $Nickname;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(?string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }


    public function getPost(): ?Post
    {
        return $this->post;
    }


    public function setPost(?Post $post): self
    {
        $this->post = $post;
        return $this;
    }

}
