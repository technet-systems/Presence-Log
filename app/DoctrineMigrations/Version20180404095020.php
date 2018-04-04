<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180404095020 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE year (id INT AUTO_INCREMENT NOT NULL, day INT NOT NULL, month INT NOT NULL, month_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');

        for ($month = 1; $month <= 12; $month++) {
            switch ($month) {
                case 1:
                    for ($day = 1; $day <= 31; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'styczeń\')');
                    }

                    break;

                case 2:
                    for ($day = 1; $day <= 29; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'luty\')');
                    }

                    break;

                case 3:
                    for ($day = 1; $day <= 31; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'marzec\')');
                    }

                    break;

                case 4:
                    for ($day = 1; $day <= 30; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'kwiecień\')');
                    }

                    break;

                case 5:
                    for ($day = 1; $day <= 31; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'maj\')');
                    }

                    break;

                case 6:
                    for ($day = 1; $day <= 30; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'czerwiec\')');
                    }

                    break;

                case 7:
                    for ($day = 1; $day <= 31; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'lipiec\')');
                    }

                    break;

                case 8:
                    for ($day = 1; $day <= 31; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'sierpień\')');
                    }

                    break;

                case 9:
                    for ($day = 1; $day <= 30; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'wrzesień\')');
                    }

                    break;

                case 10:
                    for ($day = 1; $day <= 31; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'październik\')');
                    }

                    break;

                case 11:
                    for ($day = 1; $day <= 30; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'listopad\')');
                    }

                    break;

                case 12:
                    for ($day = 1; $day <= 31; $day++) {
                        $this->addSql('INSERT INTO `year` (`id`, `day`, `month`, `month_name`) VALUES (NULL,' . $day . ', ' . $month . ', \'grudzień\')');
                    }

                    break;

            }
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE year');
    }
}
