<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251107101756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product CHANGE quantite quantity INT NOT NULL, CHANGE date_reapprovisionnement restock_date DATETIME DEFAULT NULL, CHANGE fournisseur supplier VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product CHANGE quantity quantite INT NOT NULL, CHANGE restock_date date_reapprovisionnement DATETIME DEFAULT NULL, CHANGE supplier fournisseur VARCHAR(255) DEFAULT NULL');
    }
}
