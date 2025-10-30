<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251030085731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contacto CHANGE provincia_id provincia_id INT DEFAULT NULL, CHANGE telefono telefono VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contacto CHANGE provincia_id provincia_id INT NOT NULL, CHANGE telefono telefono VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user DROP name');
    }
}
