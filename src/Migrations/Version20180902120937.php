<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20180902120937 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attraction (id INT AUTO_INCREMENT NOT NULL, ref VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, is_studio TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attraction_time (id INT AUTO_INCREMENT NOT NULL, attraction_id INT NOT NULL, wait_time INT NOT NULL, has_fastpass TINYINT(1) NOT NULL, status VARCHAR(255) NOT NULL, is_singlerider TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_1F1B3A6C3C216F9D (attraction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attraction_time ADD CONSTRAINT FK_1F1B3A6C3C216F9D FOREIGN KEY (attraction_id) REFERENCES attraction (id)');
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attraction_time DROP FOREIGN KEY FK_1F1B3A6C3C216F9D');
        $this->addSql('DROP TABLE attraction');
        $this->addSql('DROP TABLE attraction_time');
    }
}
