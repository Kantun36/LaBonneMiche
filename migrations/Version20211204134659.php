<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204134659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, user_adresse_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse LONGTEXT NOT NULL, numero_rue INT NOT NULL, complement_adresse LONGTEXT DEFAULT NULL, ville VARCHAR(255) NOT NULL, code_postal INT NOT NULL, pays VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C35F0816EA801AB0 (user_adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816EA801AB0 FOREIGN KEY (user_adresse_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD user_commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D2BF1E7C1 FOREIGN KEY (user_commande_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D2BF1E7C1 ON commande (user_commande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresse');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D2BF1E7C1');
        $this->addSql('DROP INDEX IDX_6EEAA67D2BF1E7C1 ON commande');
        $this->addSql('ALTER TABLE commande DROP user_commande_id');
    }
}
