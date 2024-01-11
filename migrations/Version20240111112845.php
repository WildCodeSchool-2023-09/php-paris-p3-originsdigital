<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240111112845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD lastname VARCHAR(150) DEFAULT NULL, ADD firstname VARCHAR(150) DEFAULT NULL, ADD birthdate DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', ADD house_number INT DEFAULT NULL, ADD street_name VARCHAR(255) DEFAULT NULL, ADD city VARCHAR(100) DEFAULT NULL, ADD country VARCHAR(100) DEFAULT NULL, ADD phone_number LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP lastname, DROP firstname, DROP birthdate, DROP house_number, DROP street_name, DROP city, DROP country, DROP phone_number');
    }
}
