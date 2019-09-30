<?php

declare(strict_types=1);

namespace KassioSchaider\PriceStalker\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190929223032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE Price (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER DEFAULT NULL, value DOUBLE PRECISION NOT NULL, channel VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_B090DDD4584665A ON Price (product_id)');
        $this->addSql('CREATE TABLE Product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, barCode VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, mainPrice DOUBLE PRECISION NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE Price');
        $this->addSql('DROP TABLE Product');
    }
}
