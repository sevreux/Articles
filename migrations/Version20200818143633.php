<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200818143633 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX id_article ON articles');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY commentaires_ibfk_1');
        $this->addSql('DROP INDEX id_article ON commentaires');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE INDEX id_article ON articles (id_article)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT commentaires_ibfk_1 FOREIGN KEY (id_article) REFERENCES articles (id_article) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX id_article ON commentaires (id_article)');
    }
}
