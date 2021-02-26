<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210125839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD films_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1939610EE FOREIGN KEY (films_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1939610EE ON category (films_id)');
        $this->addSql('ALTER TABLE film ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8244BE22A76ED395 ON film (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1939610EE');
        $this->addSql('DROP INDEX IDX_64C19C1939610EE ON category');
        $this->addSql('ALTER TABLE category DROP films_id');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22A76ED395');
        $this->addSql('DROP INDEX IDX_8244BE22A76ED395 ON film');
        $this->addSql('ALTER TABLE film DROP user_id');
    }
}
