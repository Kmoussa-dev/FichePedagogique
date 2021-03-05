<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304171509 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_matiere_id INTEGER DEFAULT NULL, CONSTRAINT FK_9014574A51E6528F FOREIGN KEY (id_matiere_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO matiere (id) SELECT id FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
        $this->addSql('CREATE INDEX IDX_9014574A51E6528F ON matiere (id_matiere_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_9014574A51E6528F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO matiere (id) SELECT id FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
    }
}
