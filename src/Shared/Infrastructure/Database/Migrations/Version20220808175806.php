<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220808175806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE addresses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE measurement_tools_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE verification_companies_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE verification_company_addresses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE verification_orders_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE verification_requests_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE verification_shipments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE verifications_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE addresses (id INT NOT NULL, address_line1 VARCHAR(255) NOT NULL, address_line2 VARCHAR(255) NOT NULL, city VARCHAR(50) NOT NULL, zip_code VARCHAR(50) NOT NULL, country VARCHAR(50) NOT NULL, province VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE measurement_tools (id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE verification_companies (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE verification_company_addresses (id INT NOT NULL, verification_company_id INT DEFAULT NULL, address_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BAA22EA0C0C90D8 ON verification_company_addresses (verification_company_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BAA22EA0F5B7AF75 ON verification_company_addresses (address_id)');
        $this->addSql('CREATE TABLE verification_orders (id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE verification_requests (id INT NOT NULL, verification_order_id INT DEFAULT NULL, verification_shipment_id INT DEFAULT NULL, verification_company_address_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8A4A5E437C50E52A ON verification_requests (verification_order_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8A4A5E439CC38C71 ON verification_requests (verification_shipment_id)');
        $this->addSql('CREATE INDEX IDX_8A4A5E43D760D197 ON verification_requests (verification_company_address_id)');
        $this->addSql('CREATE TABLE verification_shipments (id INT NOT NULL, shipping_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, return_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE verifications (id INT NOT NULL, measurement_tool_id INT DEFAULT NULL, verification_request_id INT DEFAULT NULL, verification_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, valid_until TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, certificate_code VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8C86E746C17B66A1 ON verifications (measurement_tool_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8C86E746D9E932AB ON verifications (verification_request_id)');
        $this->addSql('ALTER TABLE verification_company_addresses ADD CONSTRAINT FK_BAA22EA0C0C90D8 FOREIGN KEY (verification_company_id) REFERENCES verification_companies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE verification_company_addresses ADD CONSTRAINT FK_BAA22EA0F5B7AF75 FOREIGN KEY (address_id) REFERENCES addresses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE verification_requests ADD CONSTRAINT FK_8A4A5E437C50E52A FOREIGN KEY (verification_order_id) REFERENCES verification_orders (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE verification_requests ADD CONSTRAINT FK_8A4A5E439CC38C71 FOREIGN KEY (verification_shipment_id) REFERENCES verification_shipments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE verification_requests ADD CONSTRAINT FK_8A4A5E43D760D197 FOREIGN KEY (verification_company_address_id) REFERENCES verification_company_addresses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE verifications ADD CONSTRAINT FK_8C86E746C17B66A1 FOREIGN KEY (measurement_tool_id) REFERENCES measurement_tools (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE verifications ADD CONSTRAINT FK_8C86E746D9E932AB FOREIGN KEY (verification_request_id) REFERENCES verification_requests (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE verification_company_addresses DROP CONSTRAINT FK_BAA22EA0F5B7AF75');
        $this->addSql('ALTER TABLE verifications DROP CONSTRAINT FK_8C86E746C17B66A1');
        $this->addSql('ALTER TABLE verification_company_addresses DROP CONSTRAINT FK_BAA22EA0C0C90D8');
        $this->addSql('ALTER TABLE verification_requests DROP CONSTRAINT FK_8A4A5E43D760D197');
        $this->addSql('ALTER TABLE verification_requests DROP CONSTRAINT FK_8A4A5E437C50E52A');
        $this->addSql('ALTER TABLE verifications DROP CONSTRAINT FK_8C86E746D9E932AB');
        $this->addSql('ALTER TABLE verification_requests DROP CONSTRAINT FK_8A4A5E439CC38C71');
        $this->addSql('DROP SEQUENCE addresses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE measurement_tools_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE verification_companies_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE verification_company_addresses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE verification_orders_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE verification_requests_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE verification_shipments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE verifications_id_seq CASCADE');
        $this->addSql('DROP TABLE addresses');
        $this->addSql('DROP TABLE measurement_tools');
        $this->addSql('DROP TABLE verification_companies');
        $this->addSql('DROP TABLE verification_company_addresses');
        $this->addSql('DROP TABLE verification_orders');
        $this->addSql('DROP TABLE verification_requests');
        $this->addSql('DROP TABLE verification_shipments');
        $this->addSql('DROP TABLE verifications');
    }
}
