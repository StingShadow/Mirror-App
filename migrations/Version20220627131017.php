<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220627131017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE race CHANGE caratere caractere LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campagne CHANGE titre_campagne titre_campagne VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_campagne description_campagne LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE classe CHANGE nomclasse nomclasse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descriptionclasse descriptionclasse LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE creature CHANGE nom_creature nom_creature VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_creature description_creature LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE habitat_creature habitat_creature VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE regime_creature regime_creature VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fiche_personnage CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE yeux yeux VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cheveux cheveux VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sexe sexe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE objet CHANGE nom_objet nom_objet VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_objet description_objet LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE effet_objet effet_objet LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pays CHANGE nompays nompays VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descriptionpays descriptionpays LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race ADD caratere LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP caractere, CHANGE nomrace nomrace VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE histoire histoire LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE caracteristique_physique caracteristique_physique LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE croyances croyances LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE capaciterace capaciterace LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rarete CHANGE nomrarete nomrarete VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE religion CHANGE nomreligion nomreligion VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descriptionreligion descriptionreligion LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE source_pouvoir CHANGE nom_source nom_source VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE caracteristique caracteristique LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE src src VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE theme CHANGE titre_theme titre_theme VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_theme description_theme LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type CHANGE nom_type nom_type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE pseudo pseudo VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE denomination denomination VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reset_token reset_token VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ville CHANGE nomville nomville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descriptionville descriptionville LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
