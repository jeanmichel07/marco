<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221113135831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE theme_voyage ADD district_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE theme_voyage ADD CONSTRAINT FK_EFA5BD29B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_EFA5BD29B08FA272 ON theme_voyage (district_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE theme_voyage DROP FOREIGN KEY FK_EFA5BD29B08FA272');
        $this->addSql('DROP INDEX IDX_EFA5BD29B08FA272 ON theme_voyage');
        $this->addSql('ALTER TABLE theme_voyage DROP district_id');
    }
}
