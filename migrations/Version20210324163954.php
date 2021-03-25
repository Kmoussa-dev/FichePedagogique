<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324163954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_semestre_id INTEGER DEFAULT NULL, id_parcours_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, numero_etu INTEGER NOT NULL, email VARCHAR(255) NOT NULL, tel INTEGER NOT NULL, adresse VARCHAR(255) NOT NULL, redoublant VARCHAR(255) NOT NULL, regime_rse VARCHAR(255) NOT NULL, tier_temps VARCHAR(255) NOT NULL, type_controle_choisi VARCHAR(255) NOT NULL, ajac VARCHAR(255) NOT NULL, date_inscription DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_5E90F6D64D65622C ON inscription (id_semestre_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6762A0D2C ON inscription (id_parcours_id)');
        $this->addSql('CREATE TABLE matiere (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_matiere_id INTEGER DEFAULT NULL, nom_matiere_id INTEGER DEFAULT NULL, matiere_obligatoire_id INTEGER DEFAULT NULL, coefficient_matiere_id INTEGER DEFAULT NULL, numero_etudiant_id INTEGER DEFAULT NULL, note_obtenue DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_9014574A51E6528F ON matiere (id_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF523522F ON matiere (nom_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574A5C600F76 ON matiere (matiere_obligatoire_id)');
        $this->addSql('CREATE INDEX IDX_9014574AF6C4299C ON matiere (coefficient_matiere_id)');
        $this->addSql('CREATE INDEX IDX_9014574A9255BE6C ON matiere (numero_etudiant_id)');
        $this->addSql('CREATE TABLE module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_module VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, obligatoire VARCHAR(255) NOT NULL, coefficient INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE parcours (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, niveau VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE secretaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE semestre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero_semestre VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE semestres (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, num_semestre VARCHAR(255) NOT NULL, id_module VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, obligatoire VARCHAR(255) NOT NULL, coefficient INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE validation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero_id INTEGER DEFAULT NULL, est_valide VARCHAR(255) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_16AC5B6E5D172A78 ON validation (numero_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE secretaire');
        $this->addSql('DROP TABLE semestre');
        $this->addSql('DROP TABLE semestres');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE validation');
    }
}
