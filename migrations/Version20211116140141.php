<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116140141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(255) NOT NULL, prix_produit DOUBLE PRECISION NOT NULL, quantite_produit INT NOT NULL, poids_produit DOUBLE PRECISION NOT NULL, description_produit LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E87F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC1EBAF6CC FOREIGN KEY (articles_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FCD11A2CF FOREIGN KEY (produits_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F1EBAF6CC FOREIGN KEY (articles_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF9227DC4 FOREIGN KEY (paragraphes_id) REFERENCES paragraphe (id)');
        $this->addSql('ALTER TABLE paragraphe ADD CONSTRAINT FK_4C1BA9B67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE produit_ingredient ADD CONSTRAINT FK_C297417DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_ingredient ADD CONSTRAINT FK_C297417D933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY FK_DF1E9E87F347EFB');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FCD11A2CF');
        $this->addSql('ALTER TABLE produit_ingredient DROP FOREIGN KEY FK_C297417DF347EFB');
        $this->addSql('DROP TABLE produit');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC1EBAF6CC');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F1EBAF6CC');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF9227DC4');
        $this->addSql('ALTER TABLE paragraphe DROP FOREIGN KEY FK_4C1BA9B67294869C');
        $this->addSql('ALTER TABLE produit_ingredient DROP FOREIGN KEY FK_C297417D933FE08C');
    }
}
