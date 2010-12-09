<?php

namespace Doctrine\Tests\ODM\PHPCR;

class DocumentManagerTest extends PHPCRTestCase
{
    public function testNewInstanceFromConfiguration()
    {
        $config = new \Doctrine\ODM\PHPCR\Configuration();

        $dm = \Doctrine\ODM\PHPCR\DocumentManager::create($config);

        $this->assertType('Doctrine\ODM\PHPCR\DocumentManager', $dm);
        $this->assertSame($config, $dm->getConfiguration());
    }

    public function testGetMetadataFactory()
    {
        $dm = \Doctrine\ODM\PHPCR\DocumentManager::create();

        $this->assertType('Doctrine\ODM\PHPCR\Mapping\ClassMetadataFactory', $dm->getMetadataFactory());
    }

    public function testGetClassMetadataFor()
    {
        $dm = \Doctrine\ODM\PHPCR\DocumentManager::create();

        $cmf = $dm->getMetadataFactory();
        $cmf->setMetadataFor('stdClass', new \Doctrine\ODM\PHPCR\Mapping\ClassMetadata('stdClass'));

        $this->assertType('Doctrine\ODM\PHPCR\Mapping\ClassMetadata', $dm->getClassMetadata('stdClass'));
    }

}