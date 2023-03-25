<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324150612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piste ADD station_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE piste ADD CONSTRAINT FK_59E2507721BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('CREATE INDEX IDX_59E2507721BDB235 ON piste (station_id)');
        $this->addSql('ALTER TABLE station DROP `desc`, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE station ADD `desc` VARCHAR(255) DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE piste DROP FOREIGN KEY FK_59E2507721BDB235');
        $this->addSql('DROP INDEX IDX_59E2507721BDB235 ON piste');
        $this->addSql('ALTER TABLE piste DROP station_id');
    }
}
