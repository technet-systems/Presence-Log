<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180404132750 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE student_presence ADD student_id INT NOT NULL');
        $this->addSql('ALTER TABLE student_presence ADD CONSTRAINT FK_DAFC8B3ECB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_DAFC8B3ECB944F1A ON student_presence (student_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE student_presence DROP FOREIGN KEY FK_DAFC8B3ECB944F1A');
        $this->addSql('DROP INDEX IDX_DAFC8B3ECB944F1A ON student_presence');
        $this->addSql('ALTER TABLE student_presence DROP student_id');
    }
}
