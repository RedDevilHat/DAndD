<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710115134 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE spells_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE spells (id INT NOT NULL, class_id INT DEFAULT NULL, sub_class_id INT DEFAULT NULL, index VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, higher_level TEXT NOT NULL, page VARCHAR(255) NOT NULL, range VARCHAR(255) NOT NULL, components TEXT NOT NULL, material TEXT NOT NULL, ritual BOOLEAN NOT NULL, duration VARCHAR(255) NOT NULL, concentration BOOLEAN NOT NULL, casting_time VARCHAR(255) NOT NULL, level INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_88D70F5BEA000B10 ON spells (class_id)');
        $this->addSql('CREATE INDEX IDX_88D70F5B50AFE549 ON spells (sub_class_id)');
        $this->addSql('COMMENT ON COLUMN spells.components IS \'(DC2Type:simple_array)\'');
        $this->addSql('ALTER TABLE spells ADD CONSTRAINT FK_88D70F5BEA000B10 FOREIGN KEY (class_id) REFERENCES character_class (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE spells ADD CONSTRAINT FK_88D70F5B50AFE549 FOREIGN KEY (sub_class_id) REFERENCES character_subclass (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE spells_id_seq CASCADE');
        $this->addSql('DROP TABLE spells');
    }
}
