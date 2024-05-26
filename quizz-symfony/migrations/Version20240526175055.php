<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240526175055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse CHANGE reponse_expected reponse_expected INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7FEC37B3 FOREIGN KEY (reponse_expected) REFERENCES reponse (id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7FEC37B3 ON reponse (reponse_expected)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7FEC37B3');
        $this->addSql('DROP INDEX IDX_5FB6DEC7FEC37B3 ON reponse');
        $this->addSql('ALTER TABLE reponse CHANGE reponse_expected reponse_expected SMALLINT NOT NULL');
    }
}
