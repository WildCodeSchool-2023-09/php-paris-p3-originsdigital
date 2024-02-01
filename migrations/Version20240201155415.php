<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201155415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, label LONGTEXT NOT NULL, is_correct TINYINT(1) NOT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_user (course_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_45310B4F591CC992 (course_id), INDEX IDX_45310B4FA76ED395 (user_id), PRIMARY KEY(course_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, logo VARCHAR(200) DEFAULT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_D782112DB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_video (playlist_id INT NOT NULL, video_id INT NOT NULL, INDEX IDX_DFDBC36F6BBD148 (playlist_id), INDEX IDX_DFDBC36F29C1004E (video_id), PRIMARY KEY(playlist_id, video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, course_id INT NOT NULL, label LONGTEXT NOT NULL, question_number INT NOT NULL, INDEX IDX_B6F7494E591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(150) NOT NULL, profilepicture VARCHAR(200) DEFAULT NULL, lastname VARCHAR(150) DEFAULT NULL, firstname VARCHAR(150) DEFAULT NULL, birthdate DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', house_number INT DEFAULT NULL, street_name VARCHAR(255) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, phone_number LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_playlist (user_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_370FF52DA76ED395 (user_id), INDEX IDX_370FF52D6BBD148 (playlist_id), PRIMARY KEY(user_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, language_id INT NOT NULL, title VARCHAR(500) NOT NULL, description LONGTEXT NOT NULL, video VARCHAR(255) NOT NULL, thumbnail VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_7CC7DA2C82F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE course_user ADD CONSTRAINT FK_45310B4F591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_user ADD CONSTRAINT FK_45310B4FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112DB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE playlist_video ADD CONSTRAINT FK_DFDBC36F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_video ADD CONSTRAINT FK_DFDBC36F29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE user_playlist ADD CONSTRAINT FK_370FF52DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_playlist ADD CONSTRAINT FK_370FF52D6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE course_user DROP FOREIGN KEY FK_45310B4F591CC992');
        $this->addSql('ALTER TABLE course_user DROP FOREIGN KEY FK_45310B4FA76ED395');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112DB03A8386');
        $this->addSql('ALTER TABLE playlist_video DROP FOREIGN KEY FK_DFDBC36F6BBD148');
        $this->addSql('ALTER TABLE playlist_video DROP FOREIGN KEY FK_DFDBC36F29C1004E');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E591CC992');
        $this->addSql('ALTER TABLE user_playlist DROP FOREIGN KEY FK_370FF52DA76ED395');
        $this->addSql('ALTER TABLE user_playlist DROP FOREIGN KEY FK_370FF52D6BBD148');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C82F1BAF4');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_user');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE playlist_video');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_playlist');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
