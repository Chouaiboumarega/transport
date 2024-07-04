<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704081753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livraisons (id INT AUTO_INCREMENT NOT NULL, vehicules_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, depart VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, colis VARCHAR(255) NOT NULL, INDEX IDX_96A0CE618D8BD7E2 (vehicules_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livraisons ADD CONSTRAINT FK_96A0CE618D8BD7E2 FOREIGN KEY (vehicules_id) REFERENCES vehicules (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraisons DROP FOREIGN KEY FK_96A0CE618D8BD7E2');
        $this->addSql('DROP TABLE livraisons');
    }
}
