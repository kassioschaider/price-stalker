<?php

declare(strict_types=1);

namespace KassioSchaider\PriceStalker\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190930020030 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE Store (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE store_product (store_id INTEGER NOT NULL, product_id INTEGER NOT NULL, PRIMARY KEY(store_id, product_id))');
        $this->addSql('CREATE INDEX IDX_CA42254AB092A811 ON store_product (store_id)');
        $this->addSql('CREATE INDEX IDX_CA42254A4584665A ON store_product (product_id)');
        $this->addSql('DROP INDEX IDX_B090DDD4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Price AS SELECT id, product_id, value, channel FROM Price');
        $this->addSql('DROP TABLE Price');
        $this->addSql('CREATE TABLE Price (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER DEFAULT NULL, value DOUBLE PRECISION NOT NULL, channel VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_B090DDD4584665A FOREIGN KEY (product_id) REFERENCES Product (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO Price (id, product_id, value, channel) SELECT id, product_id, value, channel FROM __temp__Price');
        $this->addSql('DROP TABLE __temp__Price');
        $this->addSql('CREATE INDEX IDX_B090DDD4584665A ON Price (product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE Store');
        $this->addSql('DROP TABLE store_product');
        $this->addSql('DROP INDEX IDX_B090DDD4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Price AS SELECT id, product_id, value, channel FROM Price');
        $this->addSql('DROP TABLE Price');
        $this->addSql('CREATE TABLE Price (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER DEFAULT NULL, value DOUBLE PRECISION NOT NULL, channel VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO Price (id, product_id, value, channel) SELECT id, product_id, value, channel FROM __temp__Price');
        $this->addSql('DROP TABLE __temp__Price');
        $this->addSql('CREATE INDEX IDX_B090DDD4584665A ON Price (product_id)');
    }
}
