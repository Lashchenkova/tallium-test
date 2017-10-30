<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171028201208 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE profile_user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(72) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seat (id INT AUTO_INCREMENT NOT NULL, row_id INT NOT NULL, seat_number INT NOT NULL, is_booked TINYINT(1) DEFAULT NULL, INDEX IDX_3D5C366683A269F2 (row_id), UNIQUE INDEX unique_sr_idx (id, row_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE row (id INT AUTO_INCREMENT NOT NULL, sector_id INT NOT NULL, row_number INT NOT NULL, INDEX IDX_8430F6DBDE95C867 (sector_id), UNIQUE INDEX unique_rs_idx (sector_id, id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booked_seat (id INT AUTO_INCREMENT NOT NULL, seat_id INT NOT NULL, user_id INT NOT NULL, is_booked TINYINT(1) DEFAULT NULL, INDEX IDX_A138AC1EC1DAFE35 (seat_id), INDEX IDX_A138AC1EA76ED395 (user_id), UNIQUE INDEX unique_su_idx (seat_id, user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sector (id INT AUTO_INCREMENT NOT NULL, sector_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seat ADD CONSTRAINT FK_3D5C366683A269F2 FOREIGN KEY (row_id) REFERENCES row (id)');
        $this->addSql('ALTER TABLE row ADD CONSTRAINT FK_8430F6DBDE95C867 FOREIGN KEY (sector_id) REFERENCES sector (id)');
        $this->addSql('ALTER TABLE booked_seat ADD CONSTRAINT FK_A138AC1EC1DAFE35 FOREIGN KEY (seat_id) REFERENCES seat (id)');
        $this->addSql('ALTER TABLE booked_seat ADD CONSTRAINT FK_A138AC1EA76ED395 FOREIGN KEY (user_id) REFERENCES profile_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booked_seat DROP FOREIGN KEY FK_A138AC1EA76ED395');
        $this->addSql('ALTER TABLE booked_seat DROP FOREIGN KEY FK_A138AC1EC1DAFE35');
        $this->addSql('ALTER TABLE seat DROP FOREIGN KEY FK_3D5C366683A269F2');
        $this->addSql('ALTER TABLE row DROP FOREIGN KEY FK_8430F6DBDE95C867');
        $this->addSql('DROP TABLE profile_user');
        $this->addSql('DROP TABLE seat');
        $this->addSql('DROP TABLE row');
        $this->addSql('DROP TABLE booked_seat');
        $this->addSql('DROP TABLE sector');
    }
}
