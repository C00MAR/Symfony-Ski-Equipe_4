<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326204539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piste (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, open_hour DATE NOT NULL, close_hour DATE NOT NULL, fermeture TINYINT(1) NOT NULL, fermeture_message VARCHAR(255) NOT NULL, difficulty VARCHAR(255) NOT NULL, INDEX IDX_59E2507721BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_9F39F8B15E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telesiege (id INT AUTO_INCREMENT NOT NULL, station_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, open_hour DATE NOT NULL, close_hour DATE NOT NULL, fermeture TINYINT(1) NOT NULL, fermeture_message VARCHAR(255) NOT NULL, INDEX IDX_6646D33A21BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piste ADD CONSTRAINT FK_59E2507721BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE telesiege ADD CONSTRAINT FK_6646D33A21BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piste DROP FOREIGN KEY FK_59E2507721BDB235');
        $this->addSql('ALTER TABLE telesiege DROP FOREIGN KEY FK_6646D33A21BDB235');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE piste');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE telesiege');
        $this->addSql('DROP TABLE user');
    }
}
