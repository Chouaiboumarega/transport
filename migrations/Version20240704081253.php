<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704081253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicules (id INT AUTO_INCREMENT NOT NULL, chauffeurs_id INT DEFAULT NULL, matricule VARCHAR(255) NOT NULL, assurance VARCHAR(255) NOT NULL, controle VARCHAR(255) NOT NULL, circulation VARCHAR(255) NOT NULL, entretien VARCHAR(255) NOT NULL, kilometrage VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_78218C2DCB2DE31D (chauffeurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicules ADD CONSTRAINT FK_78218C2DCB2DE31D FOREIGN KEY (chauffeurs_id) REFERENCES chauffeurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicules DROP FOREIGN KEY FK_78218C2DCB2DE31D');
        $this->addSql('DROP TABLE vehicules');
    }
}
