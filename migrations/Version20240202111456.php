<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202111456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video_user DROP FOREIGN KEY FK_8A048B9529C1004E');
        $this->addSql('ALTER TABLE video_user DROP FOREIGN KEY FK_8A048B95A76ED395');
        $this->addSql('DROP TABLE video_user');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE video_user (video_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8A048B9529C1004E (video_id), INDEX IDX_8A048B95A76ED395 (user_id), PRIMARY KEY(video_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE video_user ADD CONSTRAINT FK_8A048B9529C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE video_user ADD CONSTRAINT FK_8A048B95A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C82F1BAF4');
    }
}
