<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20180423131700 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO `brewery` VALUES 
(8,\'Right Around the Corner\',\'(813) 360-0766\',NULL,\'2244 Central Ave\',NULL,\'Saint Petersburg\',\'FL\',\'33712\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(9,\'Green Bench Brewing Company\',\'(727) 800-9836\',\'http://greenbenchbrewing.com/\',\'1133 Baum Ave N\',NULL,\'Saint Petersburg\',\'FL\',\'33705\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(10,\'Cage Brewing\',\'(727) 201-4278\',NULL,\'2001 1st Ave S\',NULL,\'Saint Petersburg\',\'FL\',\'33712\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(11,\'3 Daughters Brewing\',\'(727) 495-6002\',NULL,\'222 22nd St S\',NULL,\'Saint Petersburg\',\'FL\',\'33712\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(12,\'Flying Boat Brewing Company\',\'(727) 800-2999\',NULL,\'1776 11th Ave N\',NULL,\'Saint Petersburg\',\'FL\',\'33713\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(13,\'Pinellas Ale Works\',\'(727) 235-0970\',\'pawbeer.com\',\'1962 1st Ave S\',NULL,\'Saint Petersburg\',\'FL\',\'33712\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(14,\'St. Pete Brewing Company\',\'(727) 623-4837\',NULL,\'544 1st Ave N\',NULL,\'Saint Petersburg\',\'FL\',\'33701\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(15,\'Cycle Brewing\',\'(727) 320-7954\',NULL,\'534 Central Ave\',NULL,\'Saint Petersburg\',\'FL\',\'33701\',ST_GeomFromText(\'POINT(27.7676 82.6403)\')),
(16,\'Ocean Lab Brewing Co.\',\'(787) 759-2642\',NULL,\'Road PR187 KM 2.6\',NULL,\'Carolina\',\'PR\',\'00979\',ST_GeomFromText(\'POINT(18.447201 -65.999766)\'));');
        $this->addSql('INSERT INTO `user` VALUES 
(1,\'admin@example.com\',\'admin@example.com\',\'admin@example.com\',\'admin@example.com\',1,NULL,\'$2y$13$bGmSnGOqk5iDNJmUvz.gEuNAAXTIriinlggGl8a4.GKVVjZPNs6km\',\'2018-04-07 14:50:20\',NULL,NULL,\'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}\',\'first name\',\'last name\');');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('TRUNCATE brewery');
        $this->addSql('TRUNCATE user');
    }
}