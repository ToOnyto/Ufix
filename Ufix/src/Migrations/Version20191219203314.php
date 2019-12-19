<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191219203314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, repairer_id INT DEFAULT NULL, ad_type INT NOT NULL, product_name VARCHAR(255) NOT NULL, product_category INT NOT NULL, product_break_description VARCHAR(255) NOT NULL, product_price INT NOT NULL, ad_description LONGTEXT NOT NULL, INDEX IDX_77E0ED587E3C61F9 (owner_id), INDEX IDX_77E0ED5847C5DFEE (repairer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, adress LONGTEXT NOT NULL, post_code INT NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, owned_ads LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', repaired_ads LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED587E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED5847C5DFEE FOREIGN KEY (repairer_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED587E3C61F9');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED5847C5DFEE');
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE user');
    }
}
