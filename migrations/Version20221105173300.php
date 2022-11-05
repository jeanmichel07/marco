<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105173300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, prix NUMERIC(10, 2) NOT NULL, INDEX IDX_B8755515B08FA272 (district_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, region_id INT DEFAULT NULL, status TINYINT(1) DEFAULT NULL, INDEX IDX_31C1548798260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, sup_chambre VARCHAR(255) NOT NULL, caracteristic VARCHAR(255) DEFAULT NULL, prix NUMERIC(10, 2) NOT NULL, INDEX IDX_3535ED9B08FA272 (district_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, genre VARCHAR(10) DEFAULT NULL, cin VARCHAR(100) NOT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loc_voiture (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, capacite VARCHAR(255) DEFAULT NULL, prix NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE province (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, province_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT NULL, INDEX IDX_F62F176E946114A (province_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, client_id INT DEFAULT NULL, voyage_id INT DEFAULT NULL, date_depart DATETIME NOT NULL, date_retoure DATETIME DEFAULT NULL, nbr_personne INT DEFAULT NULL, INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C8495568C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_touristique (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, INDEX IDX_59B8727BB08FA272 (district_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme_voyage (id INT AUTO_INCREMENT NOT NULL, type_voyage_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, caracteristique VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, INDEX IDX_EFA5BD29DC0FA4BF (type_voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE top_voyage (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, caracteristique VARCHAR(255) NOT NULL, INDEX IDX_686023D9B08FA272 (district_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_voyage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, titre VARCHAR(255) DEFAULT NULL, caracteristique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage (id INT AUTO_INCREMENT NOT NULL, theme_voyage_id INT DEFAULT NULL, site_touristique_id INT DEFAULT NULL, activite_id INT DEFAULT NULL, hotel_id INT DEFAULT NULL, loc_voiture_id INT DEFAULT NULL, INDEX IDX_3F9D8955A60A3F22 (theme_voyage_id), INDEX IDX_3F9D8955E6566212 (site_touristique_id), INDEX IDX_3F9D89559B0F88B1 (activite_id), INDEX IDX_3F9D89553243BB18 (hotel_id), INDEX IDX_3F9D89558913F7E (loc_voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C1548798260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176E946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES info_client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495568C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('ALTER TABLE site_touristique ADD CONSTRAINT FK_59B8727BB08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE theme_voyage ADD CONSTRAINT FK_EFA5BD29DC0FA4BF FOREIGN KEY (type_voyage_id) REFERENCES type_voyage (id)');
        $this->addSql('ALTER TABLE top_voyage ADD CONSTRAINT FK_686023D9B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955A60A3F22 FOREIGN KEY (theme_voyage_id) REFERENCES theme_voyage (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955E6566212 FOREIGN KEY (site_touristique_id) REFERENCES site_touristique (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89559B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89553243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89558913F7E FOREIGN KEY (loc_voiture_id) REFERENCES loc_voiture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89559B0F88B1');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515B08FA272');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9B08FA272');
        $this->addSql('ALTER TABLE site_touristique DROP FOREIGN KEY FK_59B8727BB08FA272');
        $this->addSql('ALTER TABLE top_voyage DROP FOREIGN KEY FK_686023D9B08FA272');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89553243BB18');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89558913F7E');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176E946114A');
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_31C1548798260155');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955E6566212');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955A60A3F22');
        $this->addSql('ALTER TABLE theme_voyage DROP FOREIGN KEY FK_EFA5BD29DC0FA4BF');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495568C9E5AF');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE info_client');
        $this->addSql('DROP TABLE loc_voiture');
        $this->addSql('DROP TABLE province');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE site_touristique');
        $this->addSql('DROP TABLE theme_voyage');
        $this->addSql('DROP TABLE top_voyage');
        $this->addSql('DROP TABLE type_voyage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE voyage');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
