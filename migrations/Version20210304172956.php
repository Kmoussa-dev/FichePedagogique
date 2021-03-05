<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304172956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_9014574A51E6528F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id, id_matiere_id FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_matiere_id INTEGER DEFAULT NULL, nom_matiere_id INTEGER DEFAULT NULL, matiere_obligatoire_id INTEGER DEFAULT NULL, note_id INTEGER DEFAULT NULL, coefficient_matiere_id INTEGER DEFAULT NULL, CONSTRAINT FK_9014574A51E6528F FOREIGN KEY (id_matiere_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574AF523522F FOREIGN KEY (nom_matiere_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574A5C600F76 FOREIGN KEY (matiere_obligatoire_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574A26ED0855 FOREIGN KEY (note_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574AF6C4299C FOREIGN KEY (coefficient_matiere_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO matiere (id, id_matiere_id) SELECT id, id_matiere_id FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
        $this->addSql('CREATE INDEX IDX_9014574A51E6528F ON matiere (id_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF523522F ON matiere (nom_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574A5C600F76 ON matiere (matiere_obligatoire_id)');
        $this->addSql('CREATE INDEX IDX_9014574A26ED0855 ON matiere (note_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF6C4299C ON matiere (coefficient_matiere_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_9014574A51E6528F');
        $this->addSql('DROP INDEX IDX_9014574AF523522F');
        $this->addSql('DROP INDEX IDX_9014574A5C600F76');
        $this->addSql('DROP INDEX IDX_9014574A26ED0855');
        $this->addSql('DROP INDEX IDX_9014574AF6C4299C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id, id_matiere_id FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_matiere_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO matiere (id, id_matiere_id) SELECT id, id_matiere_id FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
        $this->addSql('CREATE INDEX IDX_9014574A51E6528F ON matiere (id_matiere_id)');
    }
}
