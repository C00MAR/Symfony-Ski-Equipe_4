<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324145555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piste ADD stationÂ_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE piste ADD CONSTRAINT FK_59E25077B48176D1 FOREIGN KEY (stationÂ_id_id) REFERENCES station (id)');
        $this->addSql('CREATE INDEX IDX_59E25077B48176D1 ON piste (stationÂ_id_id)');
        $this->addSql('ALTER TABLE station DROP `desc`, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE telesiege ADD station_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE telesiege ADD CONSTRAINT FK_6646D33A27C2E161 FOREIGN KEY (station_id_id) REFERENCES station (id)');
        $this->addSql('CREATE INDEX IDX_6646D33A27C2E161 ON telesiege (station_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE station ADD `desc` VARCHAR(255) DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE piste DROP FOREIGN KEY FK_59E25077B48176D1');
        $this->addSql('DROP INDEX IDX_59E25077B48176D1 ON piste');
        $this->addSql('ALTER TABLE piste DROP stationÂ_id_id');
        $this->addSql('ALTER TABLE telesiege DROP FOREIGN KEY FK_6646D33A27C2E161');
        $this->addSql('DROP INDEX IDX_6646D33A27C2E161 ON telesiege');
        $this->addSql('ALTER TABLE telesiege DROP station_id_id');
    }
}
