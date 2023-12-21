<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231220164851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, DROP lastname, DROP firstname, DROP birthdate, DROP housenumber, DROP streetname, DROP city, DROP zipcode, DROP country, DROP mail, DROP phonenumber, DROP profilepicture, DROP role, DROP quizzresult, CHANGE username username VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('ALTER TABLE user ADD lastname VARCHAR(150) DEFAULT NULL, ADD firstname VARCHAR(150) DEFAULT NULL, ADD birthdate DATE DEFAULT NULL, ADD housenumber INT DEFAULT NULL, ADD streetname VARCHAR(150) DEFAULT NULL, ADD city VARCHAR(100) DEFAULT NULL, ADD zipcode INT DEFAULT NULL, ADD country VARCHAR(100) DEFAULT NULL, ADD mail VARCHAR(150) NOT NULL, ADD phonenumber VARCHAR(14) DEFAULT NULL, ADD profilepicture VARCHAR(200) DEFAULT NULL, ADD role VARCHAR(10) DEFAULT NULL, ADD quizzresult VARCHAR(100) DEFAULT NULL, DROP roles, CHANGE username username VARCHAR(150) NOT NULL');
    }
}
