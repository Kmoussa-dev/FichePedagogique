<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304111335 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, numero_etu INTEGER NOT NULL, email VARCHAR(255) NOT NULL, tel INTEGER NOT NULL, adresse VARCHAR(255) NOT NULL, date_inscription DATETIME NOT NULL, redoublant VARCHAR(255) NOT NULL, regime_rse VARCHAR(255) NOT NULL, tier_temps VARCHAR(255) NOT NULL, type_controle_choisi VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE module (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_module VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, obligatoire VARCHAR(255) NOT NULL, note_obtenue DOUBLE PRECISION NOT NULL, coefficient INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE secretaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE semestre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero_semestre VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE secretaire');
        $this->addSql('DROP TABLE semestre');
    }
}
