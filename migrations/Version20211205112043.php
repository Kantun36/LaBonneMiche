<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205112043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE franchise (id INT AUTO_INCREMENT NOT NULL, sexe VARCHAR(255) NOT NULL, nom_franchise VARCHAR(255) NOT NULL, prenom_franchise VARCHAR(255) NOT NULL, telephone_franchise VARCHAR(255) NOT NULL, adresse_franchise VARCHAR(255) NOT NULL, postal_franchise VARCHAR(255) NOT NULL, ville_franchise VARCHAR(255) NOT NULL, pays_franchise VARCHAR(255) NOT NULL, type_franchise VARCHAR(255) NOT NULL, pays_projet_franchise VARCHAR(255) NOT NULL, region_franchise VARCHAR(255) NOT NULL, info_franchise LONGTEXT NOT NULL, raison_franchise LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE franchise');
    }
}
