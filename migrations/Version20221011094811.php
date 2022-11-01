<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221011094811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animateur (id INT AUTO_INCREMENT NOT NULL, nom_animateur VARCHAR(30) NOT NULL, prénom_animateur VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(30) NOT NULL, prénom_client VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialiste (id INT AUTO_INCREMENT NOT NULL, nom_specialiste VARCHAR(30) NOT NULL, prénom_specialiste VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, animateur_id INT NOT NULL, date_début VARCHAR(30) NOT NULL, nb_jours INT NOT NULL, INDEX IDX_C27C93697F05C301 (animateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_client (stage_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_5BCDA54E2298D193 (stage_id), INDEX IDX_5BCDA54E19EB6921 (client_id), PRIMARY KEY(stage_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_specialiste (stage_id INT NOT NULL, specialiste_id INT NOT NULL, nb_heures INT NOT NULL, INDEX IDX_843F56FF2298D193 (stage_id), INDEX IDX_843F56FF6F1A5C10 (specialiste_id), PRIMARY KEY(stage_id, specialiste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93697F05C301 FOREIGN KEY (animateur_id) REFERENCES animateur (id)');
        $this->addSql('ALTER TABLE stage_client ADD CONSTRAINT FK_5BCDA54E2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_client ADD CONSTRAINT FK_5BCDA54E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_specialiste ADD CONSTRAINT FK_843F56FF2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE stage_specialiste ADD CONSTRAINT FK_843F56FF6F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES specialiste (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93697F05C301');
        $this->addSql('ALTER TABLE stage_client DROP FOREIGN KEY FK_5BCDA54E2298D193');
        $this->addSql('ALTER TABLE stage_client DROP FOREIGN KEY FK_5BCDA54E19EB6921');
        $this->addSql('ALTER TABLE stage_specialiste DROP FOREIGN KEY FK_843F56FF2298D193');
        $this->addSql('ALTER TABLE stage_specialiste DROP FOREIGN KEY FK_843F56FF6F1A5C10');
        $this->addSql('DROP TABLE animateur');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE specialiste');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE stage_client');
        $this->addSql('DROP TABLE stage_specialiste');
    }
}
