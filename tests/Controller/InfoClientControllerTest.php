<?php

namespace App\Test\Controller;

use App\Entity\InfoClient;
use App\Repository\InfoClientRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InfoClientControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private InfoClientRepository $repository;
    private string $path = '/info/client/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(InfoClient::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('InfoClient index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'info_client[name]' => 'Testing',
            'info_client[prenom]' => 'Testing',
            'info_client[adresse]' => 'Testing',
            'info_client[email]' => 'Testing',
            'info_client[phone]' => 'Testing',
            'info_client[genre]' => 'Testing',
            'info_client[CIN]' => 'Testing',
            'info_client[type]' => 'Testing',
        ]);

        self::assertResponseRedirects('/info/client/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new InfoClient();
        $fixture->setName('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone('My Title');
        $fixture->setGenre('My Title');
        $fixture->setCIN('My Title');
        $fixture->setType('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('InfoClient');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new InfoClient();
        $fixture->setName('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone('My Title');
        $fixture->setGenre('My Title');
        $fixture->setCIN('My Title');
        $fixture->setType('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'info_client[name]' => 'Something New',
            'info_client[prenom]' => 'Something New',
            'info_client[adresse]' => 'Something New',
            'info_client[email]' => 'Something New',
            'info_client[phone]' => 'Something New',
            'info_client[genre]' => 'Something New',
            'info_client[CIN]' => 'Something New',
            'info_client[type]' => 'Something New',
        ]);

        self::assertResponseRedirects('/info/client/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getAdresse());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPhone());
        self::assertSame('Something New', $fixture[0]->getGenre());
        self::assertSame('Something New', $fixture[0]->getCIN());
        self::assertSame('Something New', $fixture[0]->getType());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new InfoClient();
        $fixture->setName('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setAdresse('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPhone('My Title');
        $fixture->setGenre('My Title');
        $fixture->setCIN('My Title');
        $fixture->setType('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/info/client/');
    }
}
