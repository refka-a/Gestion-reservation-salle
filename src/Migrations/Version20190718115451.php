<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190718115451 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE externbooking ADD id_hours INT DEFAULT NULL');
        $this->addSql('ALTER TABLE externbooking ADD CONSTRAINT FK_218F5DFA649FFCBD FOREIGN KEY (id_hours) REFERENCES hours (id)');
        $this->addSql('CREATE INDEX IDX_218F5DFA649FFCBD ON externbooking (id_hours)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE externbooking DROP FOREIGN KEY FK_218F5DFA649FFCBD');
        $this->addSql('DROP INDEX IDX_218F5DFA649FFCBD ON externbooking');
        $this->addSql('ALTER TABLE externbooking DROP id_hours');
    }
}
