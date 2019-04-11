<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190318091450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, type_actualite_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, lead LONGTEXT DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, image LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, auteur VARCHAR(255) DEFAULT NULL, ordre_affichage TINYINT(1) DEFAULT NULL, etat VARCHAR(255) DEFAULT NULL, INDEX IDX_54928197BCF5E72D (categorie_id), INDEX IDX_5492819725C78A76 (type_actualite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, actualite_id INT DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, publication DATETIME DEFAULT NULL, auteur VARCHAR(255) DEFAULT NULL, INDEX IDX_67F068BCA2843073 (actualite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dedicace (id INT AUTO_INCREMENT NOT NULL, diffusion DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dedicaces (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(15) DEFAULT NULL, nom VARCHAR(75) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone VARCHAR(15) DEFAULT NULL, chanson VARCHAR(255) DEFAULT NULL, type_chanson VARCHAR(255) DEFAULT NULL, artisite VARCHAR(255) DEFAULT NULL, destinataire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_actualite (id INT AUTO_INCREMENT NOT NULL, station VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_54928197BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE actualite ADD CONSTRAINT FK_5492819725C78A76 FOREIGN KEY (type_actualite_id) REFERENCES type_actualite (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA2843073');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_54928197BCF5E72D');
        $this->addSql('ALTER TABLE actualite DROP FOREIGN KEY FK_5492819725C78A76');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE dedicace');
        $this->addSql('DROP TABLE dedicaces');
        $this->addSql('DROP TABLE type_actualite');
    }
}
