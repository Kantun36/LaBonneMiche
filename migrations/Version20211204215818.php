<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204215818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816EA801AB0');
        $this->addSql('DROP INDEX UNIQ_C35F0816EA801AB0 ON adresse');
        $this->addSql('ALTER TABLE adresse DROP user_adresse_id, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE complement_adresse complement_adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE article CHANGE contenu contenu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande ADD id_commande INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD user_adresse_id INT DEFAULT NULL, CHANGE adresse adresse LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE complement_adresse complement_adresse LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816EA801AB0 FOREIGN KEY (user_adresse_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C35F0816EA801AB0 ON adresse (user_adresse_id)');
        $this->addSql('ALTER TABLE article CHANGE contenu contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commande DROP id_commande');
    }
}
