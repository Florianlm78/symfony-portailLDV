<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107111120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Evaluation RENAME INDEX idx_1c8a4caf7ecf78b0 TO IDX_1323A5757ECF78B0');
        $this->addSql('ALTER TABLE Evaluation RENAME INDEX idx_1c8a4cafa6cc7b2 TO IDX_1323A575A6CC7B2');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluation RENAME INDEX idx_1323a575a6cc7b2 TO IDX_1C8A4CAFA6CC7B2');
        $this->addSql('ALTER TABLE evaluation RENAME INDEX idx_1323a5757ecf78b0 TO IDX_1C8A4CAF7ECF78B0');
    }
}
