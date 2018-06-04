<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180529075445 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE response ADD question_id INT DEFAULT NULL, ADD child_id INT DEFAULT NULL, DROP child');
        $this->addSql('ALTER TABLE response ADD CONSTRAINT FK_3E7B0BFB1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE response ADD CONSTRAINT FK_3E7B0BFBDD62C21B FOREIGN KEY (child_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_3E7B0BFB1E27F6BF ON response (question_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3E7B0BFBDD62C21B ON response (child_id)');
        $this->addSql('ALTER TABLE question DROP response, DROP responses, DROP valided, DROP gameover');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE question ADD response INT NOT NULL, ADD responses JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', ADD valided TINYINT(1) NOT NULL, ADD gameover TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE response DROP FOREIGN KEY FK_3E7B0BFB1E27F6BF');
        $this->addSql('ALTER TABLE response DROP FOREIGN KEY FK_3E7B0BFBDD62C21B');
        $this->addSql('DROP INDEX IDX_3E7B0BFB1E27F6BF ON response');
        $this->addSql('DROP INDEX UNIQ_3E7B0BFBDD62C21B ON response');
        $this->addSql('ALTER TABLE response ADD child JSON NOT NULL COMMENT \'(DC2Type:json_array)\', DROP question_id, DROP child_id');
    }
}
