<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251107151050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE supply_request (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, approximate_date DATE NOT NULL, quantity INT NOT NULL, status VARCHAR(20) NOT NULL, supplier_name VARCHAR(100) NOT NULL, INDEX IDX_8720D3324584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE supply_request ADD CONSTRAINT FK_8720D3324584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product ADD quantity_reaprov INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supply_request DROP FOREIGN KEY FK_8720D3324584665A');
        $this->addSql('DROP TABLE supply_request');
        $this->addSql('ALTER TABLE product DROP quantity_reaprov');
    }
}
