<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200523021803 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE books ADD firstname_id INT NOT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A9268D0D14D FOREIGN KEY (firstname_id) REFERENCES authors (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A9268D0D14D ON books (firstname_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A9268D0D14D');
        $this->addSql('DROP INDEX IDX_4A1B2A9268D0D14D ON books');
        $this->addSql('ALTER TABLE books DROP firstname_id');
    }
}
