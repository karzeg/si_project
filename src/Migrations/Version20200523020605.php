<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200523020605 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE books ADD content_id INT NOT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A9284A0A3ED FOREIGN KEY (content_id) REFERENCES categories (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A1B2A9284A0A3ED ON books (content_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A9284A0A3ED');
        $this->addSql('DROP INDEX UNIQ_4A1B2A9284A0A3ED ON books');
        $this->addSql('ALTER TABLE books DROP content_id');
    }
}
