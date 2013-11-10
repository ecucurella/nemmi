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
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

class LoadFixturesData extends AbstractFixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
//        $user1 = new User();
//        $user1->setEmail('joan@onfan.com');
//        $user1->setName('joanet');
//        $user1->setPassword(1234);
//        $user1->setCreatedAt(new \DateTime());
//        $user1->setLocality('Barcelona');
//        $manager->persist($user1);
//        $this->addReference('admin-user', $user1);
//
//        $dt = new \DateTime('2013-11-20');
//        $dt->setTime('22', '00');
//        $concert = new Concert();
//        $concert->setName('Els gossos');
//        $concert->setPlace('Plaça Catalunya');
//        $concert->setTime($dt);
//        $concert->setUser($this->getReference('admin-user'));
//        $manager->persist($concert);

        $this->createUsers($manager);
        $this->createConcerts($manager);

        $manager->flush();

    }

    public function createUsers(ObjectManager $manager)
    {
        $users = array(
            array('joan', 'Barcelona'),
            array('bob', 'Montgat'),
            array('alice', 'Mataró'),
            array('gloria', 'Mataró'),
            array('berta', 'Montgat'),
            array('ariadna', 'Barceloan'),
            array('carles', 'Mataró'),
            array('enric', 'Girona'),
            array('manel', 'Girona')
        );

        foreach ($users as $user_fixture) {
            $user = new User();
            $user->setName($user_fixture[0]);
            $user->setPassword(1234);
            $user->setEmail($user_fixture[0] . '@gmail.com');
            $user->setLocality($user_fixture[1]);
            $user->setCreatedAt(new \DateTime());
            $this->addReference($user_fixture[0], $user);
            $manager->persist($user);
        }

    }


    public function createConcerts(ObjectManager $manager)
    {
        $concerts = array(
          array('Els pets', "La pobla de l'Illet", "2013-12-23", "22", 'joan'),
          array('Manel', "Barcelona", "2013-11-23", "22", 'enric'),
          array('Lady gaga', "Vic", "2013-10-20", "23", 'manel'),
          array('Albert Plà', "Barcelonat", "2013-12-20", "21", 'joan'),
          array('Els catarres', "Barcelona", "2014-01-10", "22", 'joan'),
          array('Manel', "Barcelona", "2014-01-11", "22", 'joan'),
          array('Els amics de les arts', "Barcelona", "2014-02-10", "23", 'joan'),
          array('Els catarres', "Barcelona", "2014-01-10", "22", 'berta'),

        );

        foreach ($concerts as $concert_fixture) {
            $dt = new \DateTime($concert_fixture[2]);
            $dt->setTime($concert_fixture[3], 00);

            $concert = new Concert();
            $concert->setName($concert_fixture[0]);
            $concert->setPlace($concert_fixture[1]);
            $concert->setTime($concert_fixture[2]);
            $concert->setTime($dt);
            $concert->setUser($this->getReference($concert_fixture[4]));
            $manager->persist($concert);

        }

    }


}