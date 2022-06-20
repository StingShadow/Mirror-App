<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616100404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_personnage ADD sagesse INT NOT NULL, ADD sexe VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campagne CHANGE titre_campagne titre_campagne VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_campagne description_campagne LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE classe CHANGE nom_classe nom_classe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_classe description_classe LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE creature CHANGE nom_creature nom_creature VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_creature description_creature LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE habitat_creature habitat_creature VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE regime_creature regime_creature VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fiche_personnage DROP sagesse, DROP sexe, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE yeux yeux VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cheveux cheveux VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE objet CHANGE nom_objet nom_objet VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_objet description_objet LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE effet_objet effet_objet LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pays CHANGE nom_pays nom_pays VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_pays description_pays LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race CHANGE nom_race nom_race VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_race description_race LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE capacite_race capacite_race LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rarete CHANGE nom_rarete nom_rarete VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE religion CHANGE nom_religion nom_religion VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_religion description_religion LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE theme CHANGE titre_theme titre_theme VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_theme description_theme LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type CHANGE nom_type nom_type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE pseudo pseudo VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE denomination denomination VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reset_token reset_token VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ville CHANGE nom_ville nom_ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_ville description_ville LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
