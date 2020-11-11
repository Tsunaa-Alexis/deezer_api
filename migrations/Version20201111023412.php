<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201111023412 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album (id INT NOT NULL, artist_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, upc VARCHAR(255) DEFAULT NULL, link VARCHAR(1000) NOT NULL, share VARCHAR(1000) DEFAULT NULL, cover VARCHAR(1000) DEFAULT NULL, cover_small VARCHAR(1000) DEFAULT NULL, cover_medium VARCHAR(1000) DEFAULT NULL, cover_big VARCHAR(1000) DEFAULT NULL, cover_xl VARCHAR(1000) DEFAULT NULL, label VARCHAR(255) NOT NULL, duration INT DEFAULT NULL, fans INT DEFAULT NULL, rating INT DEFAULT NULL, tracklist VARCHAR(1000) DEFAULT NULL, INDEX IDX_39986E43B7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(1000) DEFAULT NULL, share VARCHAR(1000) DEFAULT NULL, picture VARCHAR(1000) DEFAULT NULL, picture_small VARCHAR(1000) DEFAULT NULL, picture_medium VARCHAR(1000) DEFAULT NULL, picture_big VARCHAR(1000) DEFAULT NULL, picture_xl VARCHAR(1000) DEFAULT NULL, nm_album INT DEFAULT NULL, nb_fan INT DEFAULT NULL, radio TINYINT(1) DEFAULT NULL, tracklist VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE track (id INT NOT NULL, artist_id INT DEFAULT NULL, album_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, link VARCHAR(1000) NOT NULL, duration INT DEFAULT NULL, track_position INT DEFAULT NULL, disk_number INT DEFAULT NULL, ranks INT DEFAULT NULL, INDEX IDX_D6E3F8A6B7970CF8 (artist_id), INDEX IDX_D6E3F8A61137ABCF (album_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A6B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A61137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE track DROP FOREIGN KEY FK_D6E3F8A61137ABCF');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43B7970CF8');
        $this->addSql('ALTER TABLE track DROP FOREIGN KEY FK_D6E3F8A6B7970CF8');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE track');
        $this->addSql('DROP TABLE user');
    }
}
