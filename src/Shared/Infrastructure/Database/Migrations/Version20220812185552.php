<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220812185552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE isolation_processes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE storage_processes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE isolation_processes (id INT NOT NULL, measurement_tool_id INT DEFAULT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, cause VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B417D6B3C17B66A1 ON isolation_processes (measurement_tool_id)');
        $this->addSql('CREATE TABLE storage_processes (id INT NOT NULL, measurement_tool_id INT DEFAULT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, cause VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4C338143C17B66A1 ON storage_processes (measurement_tool_id)');
        $this->addSql('ALTER TABLE isolation_processes ADD CONSTRAINT FK_B417D6B3C17B66A1 FOREIGN KEY (measurement_tool_id) REFERENCES measurement_tools (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE storage_processes ADD CONSTRAINT FK_4C338143C17B66A1 FOREIGN KEY (measurement_tool_id) REFERENCES measurement_tools (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE isolation_processes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE storage_processes_id_seq CASCADE');
        $this->addSql('DROP TABLE isolation_processes');
        $this->addSql('DROP TABLE storage_processes');
    }
}
