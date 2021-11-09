<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // -- Amedia Solutions --
        $user = new User();
        $user->setEmail('a.durmier@gmail.com');
        $user->addRole('ROLE_ADMIN');
        $user->setPassword($this->encoder->encodePassword($user, 'test'));
        $manager->persist($user);

        $manager->flush();
    }

}
