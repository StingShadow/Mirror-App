<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329112303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campagne (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, titre_campagne VARCHAR(255) NOT NULL, description_campagne LONGTEXT NOT NULL, INDEX IDX_539B5D16FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, nom_classe VARCHAR(255) NOT NULL, description_classe LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creature (id INT AUTO_INCREMENT NOT NULL, race_id INT DEFAULT NULL, nom_creature VARCHAR(255) NOT NULL, description_creature LONGTEXT DEFAULT NULL, habitat_creature VARCHAR(255) NOT NULL, regime_creature VARCHAR(255) NOT NULL, INDEX IDX_2A6C6AF46E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_personnage (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, pays_id INT DEFAULT NULL, ville_id INT DEFAULT NULL, religion_id INT DEFAULT NULL, race_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, taille INT NOT NULL, poids INT NOT NULL, yeux VARCHAR(255) NOT NULL, cheveux VARCHAR(255) NOT NULL, constitution INT NOT NULL, `force` INT NOT NULL, perception INT NOT NULL, intelligence INT NOT NULL, charisme INT NOT NULL, fuite INT NOT NULL, dexterite INT NOT NULL, INDEX IDX_C4BC4C9A8F5EA509 (classe_id), INDEX IDX_C4BC4C9AA6E44244 (pays_id), INDEX IDX_C4BC4C9AA73F0036 (ville_id), INDEX IDX_C4BC4C9AB7850CBD (religion_id), INDEX IDX_C4BC4C9A6E59D40D (race_id), INDEX IDX_C4BC4C9AFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_personnage_objet (fiche_personnage_id INT NOT NULL, objet_id INT NOT NULL, INDEX IDX_2C09EF778DE077C (fiche_personnage_id), INDEX IDX_2C09EF77F520CF5A (objet_id), PRIMARY KEY(fiche_personnage_id, objet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, theme_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, message LONGTEXT NOT NULL, INDEX IDX_B6BD307F59027487 (theme_id), INDEX IDX_B6BD307FFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objet (id INT AUTO_INCREMENT NOT NULL, nom_objet VARCHAR(255) NOT NULL, description_objet LONGTEXT NOT NULL, effet_objet LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom_pays VARCHAR(255) NOT NULL, description_pays LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, nom_race VARCHAR(255) NOT NULL, description_race LONGTEXT NOT NULL, capacite_race LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rarete (id INT AUTO_INCREMENT NOT NULL, nom_rarete VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE religion (id INT AUTO_INCREMENT NOT NULL, nom_religion VARCHAR(255) NOT NULL, description_religion LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, campagne_id INT DEFAULT NULL, titre_theme VARCHAR(255) NOT NULL, description_theme LONGTEXT NOT NULL, INDEX IDX_9775E708FB88E14F (utilisateur_id), INDEX IDX_9775E70816227374 (campagne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, denomination VARCHAR(255) NOT NULL, reset_token VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B386CC499D (pseudo), UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, nom_ville VARCHAR(255) NOT NULL, description_ville LONGTEXT NOT NULL, INDEX IDX_43C3D9C3A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE creature ADD CONSTRAINT FK_2A6C6AF46E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE fiche_personnage ADD CONSTRAINT FK_C4BC4C9A8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE fiche_personnage ADD CONSTRAINT FK_C4BC4C9AA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE fiche_personnage ADD CONSTRAINT FK_C4BC4C9AA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE fiche_personnage ADD CONSTRAINT FK_C4BC4C9AB7850CBD FOREIGN KEY (religion_id) REFERENCES religion (id)');
        $this->addSql('ALTER TABLE fiche_personnage ADD CONSTRAINT FK_C4BC4C9A6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE fiche_personnage ADD CONSTRAINT FK_C4BC4C9AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE fiche_personnage_objet ADD CONSTRAINT FK_2C09EF778DE077C FOREIGN KEY (fiche_personnage_id) REFERENCES fiche_personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiche_personnage_objet ADD CONSTRAINT FK_2C09EF77F520CF5A FOREIGN KEY (objet_id) REFERENCES objet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE theme ADD CONSTRAINT FK_9775E708FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE theme ADD CONSTRAINT FK_9775E70816227374 FOREIGN KEY (campagne_id) REFERENCES campagne (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE theme DROP FOREIGN KEY FK_9775E70816227374');
        $this->addSql('ALTER TABLE fiche_personnage DROP FOREIGN KEY FK_C4BC4C9A8F5EA509');
        $this->addSql('ALTER TABLE fiche_personnage_objet DROP FOREIGN KEY FK_2C09EF778DE077C');
        $this->addSql('ALTER TABLE fiche_personnage_objet DROP FOREIGN KEY FK_2C09EF77F520CF5A');
        $this->addSql('ALTER TABLE fiche_personnage DROP FOREIGN KEY FK_C4BC4C9AA6E44244');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3A6E44244');
        $this->addSql('ALTER TABLE creature DROP FOREIGN KEY FK_2A6C6AF46E59D40D');
        $this->addSql('ALTER TABLE fiche_personnage DROP FOREIGN KEY FK_C4BC4C9A6E59D40D');
        $this->addSql('ALTER TABLE fiche_personnage DROP FOREIGN KEY FK_C4BC4C9AB7850CBD');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F59027487');
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16FB88E14F');
        $this->addSql('ALTER TABLE fiche_personnage DROP FOREIGN KEY FK_C4BC4C9AFB88E14F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FFB88E14F');
        $this->addSql('ALTER TABLE theme DROP FOREIGN KEY FK_9775E708FB88E14F');
        $this->addSql('ALTER TABLE fiche_personnage DROP FOREIGN KEY FK_C4BC4C9AA73F0036');
        $this->addSql('DROP TABLE campagne');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE creature');
        $this->addSql('DROP TABLE fiche_personnage');
        $this->addSql('DROP TABLE fiche_personnage_objet');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE objet');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE rarete');
        $this->addSql('DROP TABLE religion');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE ville');
    }
}
