<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116094930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande_produit (commande_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_DF1E9E8782EA2E54 (commande_id), INDEX IDX_DF1E9E87F347EFB (produit_id), PRIMARY KEY(commande_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E8782EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E87F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD articles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC1EBAF6CC FOREIGN KEY (articles_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC1EBAF6CC ON commentaire (articles_id)');
        $this->addSql('ALTER TABLE image ADD produits_id INT NOT NULL, ADD articles_id INT NOT NULL, ADD paragraphes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FCD11A2CF FOREIGN KEY (produits_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F1EBAF6CC FOREIGN KEY (articles_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF9227DC4 FOREIGN KEY (paragraphes_id) REFERENCES paragraphe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045FCD11A2CF ON image (produits_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045F1EBAF6CC ON image (articles_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045FF9227DC4 ON image (paragraphes_id)');
        $this->addSql('ALTER TABLE paragraphe ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paragraphe ADD CONSTRAINT FK_4C1BA9B67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_4C1BA9B67294869C ON paragraphe (article_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commande_produit');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC1EBAF6CC');
        $this->addSql('DROP INDEX IDX_67F068BC1EBAF6CC ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP articles_id');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FCD11A2CF');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F1EBAF6CC');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF9227DC4');
        $this->addSql('DROP INDEX UNIQ_C53D045FCD11A2CF ON image');
        $this->addSql('DROP INDEX UNIQ_C53D045F1EBAF6CC ON image');
        $this->addSql('DROP INDEX UNIQ_C53D045FF9227DC4 ON image');
        $this->addSql('ALTER TABLE image DROP produits_id, DROP articles_id, DROP paragraphes_id');
        $this->addSql('ALTER TABLE paragraphe DROP FOREIGN KEY FK_4C1BA9B67294869C');
        $this->addSql('DROP INDEX IDX_4C1BA9B67294869C ON paragraphe');
        $this->addSql('ALTER TABLE paragraphe DROP article_id');
    }
}
