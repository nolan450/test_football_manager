<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704142107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, home_team_score INT DEFAULT NULL, away_team_score INT DEFAULT NULL, date DATETIME DEFAULT NULL, home_team_id INT NOT NULL, away_team_id INT NOT NULL, INDEX IDX_232B318C9C4C13F6 (home_team_id), INDEX IDX_232B318C45185D02 (away_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE league (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_3EB4C318A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, position VARCHAR(50) DEFAULT NULL, age INT DEFAULT NULL, team_id_id INT DEFAULT NULL, INDEX IDX_98197A65B842D717 (team_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, user_id_id INT DEFAULT NULL, INDEX IDX_C4E0A61F9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C9C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C45185D02 FOREIGN KEY (away_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65B842D717 FOREIGN KEY (team_id_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C9C4C13F6');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C45185D02');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318A76ED395');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65B842D717');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F9D86650F');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE league');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE user');
    }
}
