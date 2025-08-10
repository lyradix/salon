<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250810211853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salons DROP INDEX UNIQ_982F22387CE09AF2, ADD INDEX IDX_982F22387CE09AF2 (region_FK_id)');
        $this->addSql('ALTER TABLE salons DROP INDEX UNIQ_982F223863648C00, ADD INDEX IDX_982F223863648C00 (country_FK_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salons DROP INDEX IDX_982F22387CE09AF2, ADD UNIQUE INDEX UNIQ_982F22387CE09AF2 (region_FK_id)');
        $this->addSql('ALTER TABLE salons DROP INDEX IDX_982F223863648C00, ADD UNIQUE INDEX UNIQ_982F223863648C00 (country_FK_id)');
    }
}
