<?php
/**
 * Created in Onfan Package
 * User: Joan Teixidó <joan@onfan.com>
 * User: Manolo Jurado <manolo@onfan.com>
 * Date: 07/11/13
 * Time: 02:19
 */

namespace myConcerts\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use nemmi\WebBundle\Entity\Concert;
use nemmi\WebBundle\Entity\User;

class LoadFixturesData extends AbstractFixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('joan@onfan.com');
        $user1->setName('joanet');
        $user1->setPassword(1234);
        $user1->setCreatedAt(new \DateTime());
        $user1->setLocality('Barcelona');
        $manager->persist($user1);
        $this->addReference('admin-user', $user1);

        $dt = new \DateTime('2013-11-20');
        $dt->setTime('22', '00');
        $concert = new Concert();
        $concert->setName('Els gossos');
        $concert->setPlace('Plaça Catalunya');
        $concert->setTime($dt);
        $concert->setUser($this->getReference('admin-user'));


        $manager->persist($concert);
        $manager->flush();

    }


}