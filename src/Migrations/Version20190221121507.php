<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190221121507 extends AbstractMigration
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
        $this->addSql('ALTER TABLE page ADD slug VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE post ADD slug VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(140) DEFAULT NULL');
        $this->addSql('ALTER TABLE tag ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auteur DROP slug');
        $this->addSql('ALTER TABLE page DROP slug');
        $this->addSql('ALTER TABLE post DROP slug, CHANGE image image VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE tag DROP slug');
    }
}
