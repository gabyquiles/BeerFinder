<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/9/18
 * Time: 10:42 AM
 */

namespace App\Tests\Repository;


use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class BaseRepositoryTest extends KernelTestCase
{
    /** @var ContainerInterface */
    private $container;

    /** @var EntityManager */
    protected $entityManager;

    protected $fixturesFiles = array(
        'fixtures/breweries.yaml',
    );

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();
        $this->container = $kernel->getContainer();

        $this->entityManager = $this->container
            ->get('doctrine')
            ->getManager();
        $this->primeDatabase();
        $this->loadFixtures();
    }

    private function primeDatabase()
    {
        $metadatas = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->dropSchema($metadatas);
        $schemaTool->updateSchema($metadatas);
    }

    private function loadFixtures()
    {
        $loader = $this->container->get('fidry_alice_data_fixtures.loader.doctrine');
        $loader->load($this->fixturesFiles);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }

    /**
     * @param $entityName
     * @return \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository
     */
    protected function getRepository($entityName)
    {
        return $this->entityManager->getRepository($entityName);
    }

    public static function assertUsersEquals($expectedUser, $actualUser)
    {
        static::assertNotNull($expectedUser);
        static::assertNotNull($actualUser);
        static::assertInstanceOf(User::class, $actualUser);
        static::assertEquals($expectedUser->getEmail(), $actualUser->getEmail());
    }
}