<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260515140010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, source VARCHAR(255) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, date_dernier_contact DATETIME DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE interaction (id INT AUTO_INCREMENT NOT NULL, sujet VARCHAR(255) NOT NULL, contenu LONGTEXT DEFAULT NULL, date DATETIME NOT NULL, creer_par VARCHAR(255) DEFAULT NULL, date_creation DATETIME NOT NULL, type VARCHAR(255) NOT NULL, client_id INT DEFAULT NULL, INDEX IDX_378DFDA719EB6921 (client_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE opportunite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, montant NUMERIC(10, 2) NOT NULL, date_cloture DATE DEFAULT NULL, probabilite INT NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, relation_id INT DEFAULT NULL, INDEX IDX_97889F983256915B (relation_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE interaction ADD CONSTRAINT FK_378DFDA719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE opportunite ADD CONSTRAINT FK_97889F983256915B FOREIGN KEY (relation_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE interaction DROP FOREIGN KEY FK_378DFDA719EB6921');
        $this->addSql('ALTER TABLE opportunite DROP FOREIGN KEY FK_97889F983256915B');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE interaction');
        $this->addSql('DROP TABLE opportunite');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
