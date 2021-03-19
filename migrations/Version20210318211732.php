<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318211732 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5E90F6D64D65622C');
        $this->addSql('DROP INDEX IDX_5E90F6D6762A0D2C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__inscription AS SELECT id, id_semestre_id, id_parcours_id, nom, prenom, date_naissance, numero_etu, email, tel, adresse, redoublant, regime_rse, tier_temps, type_controle_choisi, ajac FROM inscription');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('CREATE TABLE inscription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_semestre_id INTEGER DEFAULT NULL, id_parcours_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL COLLATE BINARY, prenom VARCHAR(255) NOT NULL COLLATE BINARY, date_naissance DATE NOT NULL, numero_etu INTEGER NOT NULL, email VARCHAR(255) NOT NULL COLLATE BINARY, tel INTEGER NOT NULL, adresse VARCHAR(255) NOT NULL COLLATE BINARY, redoublant VARCHAR(255) NOT NULL COLLATE BINARY, regime_rse VARCHAR(255) NOT NULL COLLATE BINARY, tier_temps VARCHAR(255) NOT NULL COLLATE BINARY, type_controle_choisi VARCHAR(255) NOT NULL COLLATE BINARY, ajac VARCHAR(255) NOT NULL COLLATE BINARY, date_inscription DATETIME , CONSTRAINT FK_5E90F6D64D65622C FOREIGN KEY (id_semestre_id) REFERENCES semestre (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5E90F6D6762A0D2C FOREIGN KEY (id_parcours_id) REFERENCES parcours (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO inscription (id, id_semestre_id, id_parcours_id, nom, prenom, date_naissance, numero_etu, email, tel, adresse, redoublant, regime_rse, tier_temps, type_controle_choisi, ajac) SELECT id, id_semestre_id, id_parcours_id, nom, prenom, date_naissance, numero_etu, email, tel, adresse, redoublant, regime_rse, tier_temps, type_controle_choisi, ajac FROM __temp__inscription');
        $this->addSql('DROP TABLE __temp__inscription');
        $this->addSql('CREATE INDEX IDX_5E90F6D64D65622C ON inscription (id_semestre_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6762A0D2C ON inscription (id_parcours_id)');
        $this->addSql('DROP INDEX IDX_9014574A51E6528F');
        $this->addSql('DROP INDEX IDX_9014574AF523522F');
        $this->addSql('DROP INDEX IDX_9014574A5C600F76');
        $this->addSql('DROP INDEX IDX_9014574AF6C4299C');
        $this->addSql('DROP INDEX IDX_9014574A9255BE6C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id, id_matiere_id, nom_matiere_id, matiere_obligatoire_id, coefficient_matiere_id, numero_etudiant_id, note_obtenue FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_matiere_id INTEGER DEFAULT NULL, nom_matiere_id INTEGER DEFAULT NULL, matiere_obligatoire_id INTEGER DEFAULT NULL, coefficient_matiere_id INTEGER DEFAULT NULL, numero_etudiant_id INTEGER DEFAULT NULL, note_obtenue DOUBLE PRECISION NOT NULL, CONSTRAINT FK_9014574A51E6528F FOREIGN KEY (id_matiere_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574AF523522F FOREIGN KEY (nom_matiere_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574A5C600F76 FOREIGN KEY (matiere_obligatoire_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574AF6C4299C FOREIGN KEY (coefficient_matiere_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9014574A9255BE6C FOREIGN KEY (numero_etudiant_id) REFERENCES inscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO matiere (id, id_matiere_id, nom_matiere_id, matiere_obligatoire_id, coefficient_matiere_id, numero_etudiant_id, note_obtenue) SELECT id, id_matiere_id, nom_matiere_id, matiere_obligatoire_id, coefficient_matiere_id, numero_etudiant_id, note_obtenue FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
        $this->addSql('CREATE INDEX IDX_9014574A51E6528F ON matiere (id_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF523522F ON matiere (nom_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574A5C600F76 ON matiere (matiere_obligatoire_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF6C4299C ON matiere (coefficient_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574A9255BE6C ON matiere (numero_etudiant_id)');
        $this->addSql('DROP INDEX IDX_16AC5B6E5D172A78');
        $this->addSql('CREATE TEMPORARY TABLE __temp__validation AS SELECT id, numero_id, est_valide, description FROM validation');
        $this->addSql('DROP TABLE validation');
        $this->addSql('CREATE TABLE validation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero_id INTEGER DEFAULT NULL, est_valide VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, CONSTRAINT FK_16AC5B6E5D172A78 FOREIGN KEY (numero_id) REFERENCES inscription (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO validation (id, numero_id, est_valide, description) SELECT id, numero_id, est_valide, description FROM __temp__validation');
        $this->addSql('DROP TABLE __temp__validation');
        $this->addSql('CREATE INDEX IDX_16AC5B6E5D172A78 ON validation (numero_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5E90F6D64D65622C');
        $this->addSql('DROP INDEX IDX_5E90F6D6762A0D2C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__inscription AS SELECT id, id_semestre_id, id_parcours_id, nom, prenom, date_naissance, numero_etu, email, tel, adresse, redoublant, regime_rse, tier_temps, type_controle_choisi, ajac FROM inscription');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('CREATE TABLE inscription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_semestre_id INTEGER DEFAULT NULL, id_parcours_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, numero_etu INTEGER NOT NULL, email VARCHAR(255) NOT NULL, tel INTEGER NOT NULL, adresse VARCHAR(255) NOT NULL, redoublant VARCHAR(255) NOT NULL, regime_rse VARCHAR(255) NOT NULL, tier_temps VARCHAR(255) NOT NULL, type_controle_choisi VARCHAR(255) NOT NULL, ajac VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO inscription (id, id_semestre_id, id_parcours_id, nom, prenom, date_naissance, numero_etu, email, tel, adresse, redoublant, regime_rse, tier_temps, type_controle_choisi, ajac) SELECT id, id_semestre_id, id_parcours_id, nom, prenom, date_naissance, numero_etu, email, tel, adresse, redoublant, regime_rse, tier_temps, type_controle_choisi, ajac FROM __temp__inscription');
        $this->addSql('DROP TABLE __temp__inscription');
        $this->addSql('CREATE INDEX IDX_5E90F6D64D65622C ON inscription (id_semestre_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6762A0D2C ON inscription (id_parcours_id)');
        $this->addSql('DROP INDEX IDX_9014574A51E6528F');
        $this->addSql('DROP INDEX IDX_9014574AF523522F');
        $this->addSql('DROP INDEX IDX_9014574A5C600F76');
        $this->addSql('DROP INDEX IDX_9014574AF6C4299C');
        $this->addSql('DROP INDEX IDX_9014574A9255BE6C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__matiere AS SELECT id, id_matiere_id, nom_matiere_id, matiere_obligatoire_id, coefficient_matiere_id, numero_etudiant_id, note_obtenue FROM matiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_matiere_id INTEGER DEFAULT NULL, nom_matiere_id INTEGER DEFAULT NULL, matiere_obligatoire_id INTEGER DEFAULT NULL, coefficient_matiere_id INTEGER DEFAULT NULL, numero_etudiant_id INTEGER DEFAULT NULL, note_obtenue DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO matiere (id, id_matiere_id, nom_matiere_id, matiere_obligatoire_id, coefficient_matiere_id, numero_etudiant_id, note_obtenue) SELECT id, id_matiere_id, nom_matiere_id, matiere_obligatoire_id, coefficient_matiere_id, numero_etudiant_id, note_obtenue FROM __temp__matiere');
        $this->addSql('DROP TABLE __temp__matiere');
        $this->addSql('CREATE INDEX IDX_9014574A51E6528F ON matiere (id_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF523522F ON matiere (nom_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574A5C600F76 ON matiere (matiere_obligatoire_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF6C4299C ON matiere (coefficient_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574A9255BE6C ON matiere (numero_etudiant_id)');
        $this->addSql('DROP INDEX IDX_16AC5B6E5D172A78');
        $this->addSql('CREATE TEMPORARY TABLE __temp__validation AS SELECT id, numero_id, est_valide, description FROM validation');
        $this->addSql('DROP TABLE validation');
        $this->addSql('CREATE TABLE validation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero_id INTEGER DEFAULT NULL, est_valide VARCHAR(255) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('INSERT INTO validation (id, numero_id, est_valide, description) SELECT id, numero_id, est_valide, description FROM __temp__validation');
        $this->addSql('DROP TABLE __temp__validation');
        $this->addSql('CREATE INDEX IDX_16AC5B6E5D172A78 ON validation (numero_id)');
    }
}
