<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205134827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD user_adresse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816EA801AB0 FOREIGN KEY (user_adresse_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C35F0816EA801AB0 ON adresse (user_adresse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816EA801AB0');
        $this->addSql('DROP INDEX UNIQ_C35F0816EA801AB0 ON adresse');
        $this->addSql('ALTER TABLE adresse DROP user_adresse_id');
    }
}
