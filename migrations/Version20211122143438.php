<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122143438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_commande INT NOT NULL, prix_commande DOUBLE PRECISION NOT NULL, pret TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_produit (commande_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_DF1E9E8782EA2E54 (commande_id), INDEX IDX_DF1E9E87F347EFB (produit_id), PRIMARY KEY(commande_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, articles_id INT DEFAULT NULL, note_commentaire INT NOT NULL, contenu_commentaire LONGTEXT NOT NULL, INDEX IDX_67F068BC1EBAF6CC (articles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, id_contact INT NOT NULL, raison_contact VARCHAR(255) NOT NULL, text_contact VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, produits_id INT NOT NULL, articles_id INT NOT NULL, paragraphes_id INT DEFAULT NULL, path_image VARCHAR(255) NOT NULL, nom_image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C53D045FCD11A2CF (produits_id), UNIQUE INDEX UNIQ_C53D045F1EBAF6CC (articles_id), UNIQUE INDEX UNIQ_C53D045FF9227DC4 (paragraphes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, nom_ingredient VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paragraphe (id INT AUTO_INCREMENT NOT NULL, numero_paragraphe INT NOT NULL, titre_paragraphe VARCHAR(255) NOT NULL, contenu_paragraphe LONGTEXT NOT NULL, INDEX IDX_4C1BA9B67294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(255) NOT NULL, prix_produit DOUBLE PRECISION NOT NULL, quantite_produit INT NOT NULL, poids_produit DOUBLE PRECISION NOT NULL, description_produit LONGTEXT DEFAULT NULL, categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_ingredient (produit_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_C297417DF347EFB (produit_id), INDEX IDX_C297417D933FE08C (ingredient_id), PRIMARY KEY(produit_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_user VARCHAR(255) NOT NULL, prenom_user VARCHAR(255) NOT NULL, num_tel INT DEFAULT NULL, points_fidels INT NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E8782EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC1EBAF6CC');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F1EBAF6CC');
        $this->addSql('ALTER TABLE paragraphe DROP FOREIGN KEY FK_4C1BA9B67294869C');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY FK_DF1E9E8782EA2E54');
        $this->addSql('ALTER TABLE produit_ingredient DROP FOREIGN KEY FK_C297417D933FE08C');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF9227DC4');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY FK_DF1E9E87F347EFB');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FCD11A2CF');
        $this->addSql('ALTER TABLE produit_ingredient DROP FOREIGN KEY FK_C297417DF347EFB');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commande_produit');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE paragraphe');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_ingredient');
        $this->addSql('DROP TABLE user');
    }
}
