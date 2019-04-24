<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190424193353 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auteur ADD slug VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE message ADD titre VARCHAR(255) NOT NULL, ADD file VARCHAR(255) NOT NULL, ADD url VARCHAR(255) NOT NULL, ADD search VARCHAR(255) NOT NULL, ADD repeate VARCHAR(255) NOT NULL, ADD radio VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD arry LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD choice VARCHAR(255) NOT NULL, DROP gsm, DROP sexe, DROP path');
        $this->addSql('ALTER TABLE page ADD slug VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE post ADD slug VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(140) DEFAULT NULL');
        $this->addSql('ALTER TABLE tag ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auteur DROP slug');
        $this->addSql('ALTER TABLE message ADD gsm VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD sexe VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD path VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP titre, DROP file, DROP url, DROP search, DROP repeate, DROP radio, DROP password, DROP arry, DROP choice');
        $this->addSql('ALTER TABLE page DROP slug');
        $this->addSql('ALTER TABLE post DROP slug, CHANGE image image VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE tag DROP slug');
    }
}
