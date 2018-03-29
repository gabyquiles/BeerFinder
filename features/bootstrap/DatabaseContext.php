<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 3/16/18
 * Time: 2:38 PM
 */

use Behat\Behat\Context\Context;
use Doctrine\Common\DataFixtures\Purger\ORMPurger as DoctrineOrmPurger;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;

class DatabaseContext implements Context
{
    /** @var EntityManager */
    private $em;
    private $loader;

    public function __construct(EntityManager $entityManager, $loader)
    {
        $this->em = $entityManager;
        $this->loader = $loader;

        // Run the schema update tool using our entity metadata
        $metadatas = $this->em->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($this->em);
        $schemaTool->dropSchema($metadatas);
        $schemaTool->updateSchema($metadatas);
    }

    /**
     * @BeforeScenario
     */
    public
    function loadFixtures()
    {
        $files = array(
            'fixtures/users.yaml',
            'fixtures/breweries.yaml'
        );
        $this->loader->load($files);
    }

    /**
     * @AfterScenario
     */
    public
    function purgeDatabase()
    {
        $purger = new DoctrineOrmPurger($this->em);
        $purger->purge();
    }
}