<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704144738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game ADD league_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C9C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C45185D02 FOREIGN KEY (away_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C58AFC4DE FOREIGN KEY (league_id) REFERENCES league (id)');
        $this->addSql('CREATE INDEX IDX_232B318C58AFC4DE ON game (league_id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65B842D717 FOREIGN KEY (team_id_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C9C4C13F6');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C45185D02');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C58AFC4DE');
        $this->addSql('DROP INDEX IDX_232B318C58AFC4DE ON game');
        $this->addSql('ALTER TABLE game DROP league_id');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318A76ED395');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65B842D717');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F9D86650F');
    }
}
