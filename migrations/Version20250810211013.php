<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250810211013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, number VARCHAR(4) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_CD1DE18A98260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salons (id INT AUTO_INCREMENT NOT NULL, dept_fk_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, opening_date DATE NOT NULL, no_employees_full_time INT NOT NULL, rep_name VARCHAR(255) NOT NULL, rep_first_name VARCHAR(255) NOT NULL, region_FK_id INT DEFAULT NULL, country_FK_id INT DEFAULT NULL, INDEX IDX_982F223878839D0 (dept_fk_id), UNIQUE INDEX UNIQ_982F22387CE09AF2 (region_FK_id), UNIQUE INDEX UNIQ_982F223863648C00 (country_FK_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistic (id INT AUTO_INCREMENT NOT NULL, national_turnover_avg DOUBLE PRECISION NOT NULL, region_turnover_avg DOUBLE PRECISION NOT NULL, dept_turnover_avg DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turnover (id INT AUTO_INCREMENT NOT NULL, salon_fk_id INT DEFAULT NULL, date DATE NOT NULL, amount DOUBLE PRECISION NOT NULL, dept VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_638A62CC4FA49A0 (salon_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, token_jwt VARCHAR(255) DEFAULT NULL, last_connection DATE DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE salons ADD CONSTRAINT FK_982F223878839D0 FOREIGN KEY (dept_fk_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE salons ADD CONSTRAINT FK_982F22387CE09AF2 FOREIGN KEY (region_FK_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE salons ADD CONSTRAINT FK_982F223863648C00 FOREIGN KEY (country_FK_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE turnover ADD CONSTRAINT FK_638A62CC4FA49A0 FOREIGN KEY (salon_fk_id) REFERENCES salons (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A98260155');
        $this->addSql('ALTER TABLE salons DROP FOREIGN KEY FK_982F223878839D0');
        $this->addSql('ALTER TABLE salons DROP FOREIGN KEY FK_982F22387CE09AF2');
        $this->addSql('ALTER TABLE salons DROP FOREIGN KEY FK_982F223863648C00');
        $this->addSql('ALTER TABLE turnover DROP FOREIGN KEY FK_638A62CC4FA49A0');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE salons');
        $this->addSql('DROP TABLE statistic');
        $this->addSql('DROP TABLE turnover');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
