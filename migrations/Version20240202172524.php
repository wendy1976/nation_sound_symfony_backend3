<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202172524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concert (id INT AUTO_INCREMENT NOT NULL, date_concert_id INT NOT NULL, scene_id INT NOT NULL, musique_id INT DEFAULT NULL, nom_artiste VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_D57C02D24FFA7A88 (date_concert_id), INDEX IDX_D57C02D2166053B4 (scene_id), INDEX IDX_D57C02D225E254A1 (musique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert_pass (id INT AUTO_INCREMENT NOT NULL, concert_id INT DEFAULT NULL, pass_id INT DEFAULT NULL, INDEX IDX_6BCDE0E383C97B2E (concert_id), INDEX IDX_6BCDE0E3EC545AE5 (pass_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date_concert (id INT AUTO_INCREMENT NOT NULL, date_heure DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, coordinates LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', icon VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, popup_content LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musique (id INT AUTO_INCREMENT NOT NULL, style_musique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, external_link LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification_info (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, internal_link LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pass (id INT AUTO_INCREMENT NOT NULL, nom_pass VARCHAR(255) NOT NULL, description_pass VARCHAR(255) NOT NULL, prix_pass NUMERIC(10, 2) NOT NULL, image_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scene (id INT AUTO_INCREMENT NOT NULL, nom_scene VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE security_info (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D24FFA7A88 FOREIGN KEY (date_concert_id) REFERENCES date_concert (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D225E254A1 FOREIGN KEY (musique_id) REFERENCES musique (id)');
        $this->addSql('ALTER TABLE concert_pass ADD CONSTRAINT FK_6BCDE0E383C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id)');
        $this->addSql('ALTER TABLE concert_pass ADD CONSTRAINT FK_6BCDE0E3EC545AE5 FOREIGN KEY (pass_id) REFERENCES pass (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D24FFA7A88');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2166053B4');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D225E254A1');
        $this->addSql('ALTER TABLE concert_pass DROP FOREIGN KEY FK_6BCDE0E383C97B2E');
        $this->addSql('ALTER TABLE concert_pass DROP FOREIGN KEY FK_6BCDE0E3EC545AE5');
        $this->addSql('DROP TABLE concert');
        $this->addSql('DROP TABLE concert_pass');
        $this->addSql('DROP TABLE date_concert');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE musique');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE notification_info');
        $this->addSql('DROP TABLE pass');
        $this->addSql('DROP TABLE scene');
        $this->addSql('DROP TABLE security_info');
    }
}
