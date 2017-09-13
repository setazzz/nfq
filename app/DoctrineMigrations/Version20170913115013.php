<?php

namespace Application\Migrations;

use AppBundle\Entity\Orders;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170913115013 extends AbstractMigration implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function postUp(Schema $schema)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');

        $names = [
            'Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas','Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas',
            'Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas','Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas',
            'Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas','Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas',
            'Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas','Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas',
            'Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas','Jonas', 'Petras', 'Aloyzas', 'Antanas', 'Benediktas',
        ];

        $emails = [
            '@gmail.com', '@yahoo.com', '@takas.lt', '@one.lt', '@mac.com'
        ];

        $cities = [
            'Vilnius', 'Kaunas', 'Klaipėda', 'Šiauliai', 'Panevėžys', 'Alytus', 'Marijampolė', 'Tauragė', 'Visaginas',
        ];

        $fixations = [
            'strong',
            'weak',
            'free',
        ];

        $locations = [
            'indoor',
            'shelter',
            'outdoor',
        ];

        $purposes = [
            'prosport',
            'asport',
            'recreational',
            'playground',
        ];

        for ($i = 0; $i < 50; $i++) {
            shuffle($emails);
            shuffle($cities);
            shuffle($fixations);
            shuffle($locations);
            shuffle($purposes);

            $name = $names[$i];
            $email = str_replace(' ', '', strtolower($names[$i])) . $emails[0];
            $phone = '86' . str_pad(rand(0, pow(10, 7)-1), 7, '0', STR_PAD_LEFT);
            $city = $cities[0];
            $width = rand(100, 5000) / 100;
            $height = rand(100, 1000) / 100;
            $fixation = $fixations[0];
            $location = $locations[0];
            $purpose = $purposes[0];

            $newOrder = new Orders();

            $newOrder->setClientName($name);
            $newOrder->setClientEmail($email);
            $newOrder->setClientPhone($phone);
            $newOrder->setClientCity($city);
            $newOrder->setWidth($width);
            $newOrder->setHeight($height);
            $newOrder->setFixation($fixation);
            $newOrder->setLocation($location);
            $newOrder->setPurpose($purpose);

            $em->persist($newOrder);
        }

        $em->flush();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
