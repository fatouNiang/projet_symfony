<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706181547 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant ADD chambre_id INT DEFAULT NULL, ADD bourse INT DEFAULT NULL, ADD adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E39B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('CREATE INDEX IDX_717E22E39B177F54 ON etudiant (chambre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E39B177F54');
        $this->addSql('DROP INDEX IDX_717E22E39B177F54 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP chambre_id, DROP bourse, DROP adresse');
    }
}
