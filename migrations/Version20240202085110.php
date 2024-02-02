<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202085110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_playlist DROP INDEX IDX_370FF52DA76ED395, ADD UNIQUE INDEX UNIQ_370FF52DA76ED395 (user_id)');
        $this->addSql('ALTER TABLE user_playlist DROP INDEX IDX_370FF52D6BBD148, ADD UNIQUE INDEX UNIQ_370FF52D6BBD148 (playlist_id)');
        $this->addSql('ALTER TABLE user_playlist DROP FOREIGN KEY FK_370FF52D6BBD148');
        $this->addSql('ALTER TABLE user_playlist DROP FOREIGN KEY FK_370FF52DA76ED395');
        $this->addSql('ALTER TABLE user_playlist ADD id INT AUTO_INCREMENT NOT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE playlist_id playlist_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user_playlist ADD CONSTRAINT FK_370FF52D6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE user_playlist ADD CONSTRAINT FK_370FF52DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_playlist DROP INDEX UNIQ_370FF52DA76ED395, ADD INDEX IDX_370FF52DA76ED395 (user_id)');
        $this->addSql('ALTER TABLE user_playlist DROP INDEX UNIQ_370FF52D6BBD148, ADD INDEX IDX_370FF52D6BBD148 (playlist_id)');
        $this->addSql('ALTER TABLE user_playlist MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE user_playlist DROP FOREIGN KEY FK_370FF52DA76ED395');
        $this->addSql('ALTER TABLE user_playlist DROP FOREIGN KEY FK_370FF52D6BBD148');
        $this->addSql('DROP INDEX `PRIMARY` ON user_playlist');
        $this->addSql('ALTER TABLE user_playlist DROP id, CHANGE user_id user_id INT NOT NULL, CHANGE playlist_id playlist_id INT NOT NULL');
        $this->addSql('ALTER TABLE user_playlist ADD CONSTRAINT FK_370FF52DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_playlist ADD CONSTRAINT FK_370FF52D6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_playlist ADD PRIMARY KEY (user_id, playlist_id)');
    }
}
