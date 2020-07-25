<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710114252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE race_traits_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE race_traits (id INT NOT NULL, race_id INT DEFAULT NULL, subraces_id INT DEFAULT NULL, index VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8EF6BFB56E59D40D ON race_traits (race_id)');
        $this->addSql('CREATE INDEX IDX_8EF6BFB5923E25C5 ON race_traits (subraces_id)');
        $this->addSql('ALTER TABLE race_traits ADD CONSTRAINT FK_8EF6BFB56E59D40D FOREIGN KEY (race_id) REFERENCES race (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE race_traits ADD CONSTRAINT FK_8EF6BFB5923E25C5 FOREIGN KEY (subraces_id) REFERENCES subraces (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ability_bonuses ADD race_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ability_bonuses ADD subraces_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ability_bonuses ADD CONSTRAINT FK_F9FF2E406E59D40D FOREIGN KEY (race_id) REFERENCES race (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ability_bonuses ADD CONSTRAINT FK_F9FF2E40923E25C5 FOREIGN KEY (subraces_id) REFERENCES subraces (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F9FF2E406E59D40D ON ability_bonuses (race_id)');
        $this->addSql('CREATE INDEX IDX_F9FF2E40923E25C5 ON ability_bonuses (subraces_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE race_traits_id_seq CASCADE');
        $this->addSql('DROP TABLE race_traits');
        $this->addSql('ALTER TABLE ability_bonuses DROP CONSTRAINT FK_F9FF2E406E59D40D');
        $this->addSql('ALTER TABLE ability_bonuses DROP CONSTRAINT FK_F9FF2E40923E25C5');
        $this->addSql('DROP INDEX IDX_F9FF2E406E59D40D');
        $this->addSql('DROP INDEX IDX_F9FF2E40923E25C5');
        $this->addSql('ALTER TABLE ability_bonuses DROP race_id');
        $this->addSql('ALTER TABLE ability_bonuses DROP subraces_id');
    }
}
