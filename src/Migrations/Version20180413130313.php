<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180413130313 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE favorit (id INT AUTO_INCREMENT NOT NULL, userid INT DEFAULT NULL, filmid INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_users CHANGE email email VARCHAR(255) NOT NULL, CHANGE username username VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE app_users RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_C2502824E7927C74');
        $this->addSql('ALTER TABLE app_users RENAME INDEX uniq_8d93d649f85e0677 TO UNIQ_C2502824F85E0677');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE favorit');
        $this->addSql('ALTER TABLE app_users CHANGE email email VARCHAR(191) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE username username VARCHAR(191) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE app_users RENAME INDEX uniq_c2502824e7927c74 TO UNIQ_8D93D649E7927C74');
        $this->addSql('ALTER TABLE app_users RENAME INDEX uniq_c2502824f85e0677 TO UNIQ_8D93D649F85E0677');
    }
}
