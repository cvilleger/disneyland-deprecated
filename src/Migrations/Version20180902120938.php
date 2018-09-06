<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20180902120938 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $sql = "INSERT INTO `attraction` (`ref`, `name`, `is_studio`) VALUES 
                    ('P1AA00', 'Adventure Isle', '0'), 
                    ('P1AA01', 'La Cabane des Robinson', '0'),
                    ('P1AA02', 'Indiana Jones et le Temple du Péril', '0'), 
                    ('P1AA03', 'Le Passage Enchanté d\'Aladdin', '0'),
                    ('P1AA04', 'Pirates of the Caribbean', '0'), 
                    ('P1AA05', 'La Plage des Pirates', '0'),
                    ('P1AA08', 'Le Galion des Pirates', '0'), 
                    ('P1DA03', 'Autopia', '0'),
                    ('P1DA04', 'Buzz Lightyear Laser Blast', '0'), 
                    ('P1DA06', 'Les Mystères du Nautilus', '0'),
                    ('P1DA07', 'Orbitron', '0'), 
                    ('P1DA08', 'Star Wars Hyperspace Mountain', '0'),
                    ('P1DA09', 'Star Tours : L\'Aventure Continue', '0'), 
                    ('P1DA10', 'Disneyland Railroad Discoveryland Station', '0'),
                    ('P1DA13', 'Star Wars: Path of the Jedi', '0'), 
                    ('P1DA14', 'Starport : rencontre avec un Personnage Star Wars', '0'),
                    ('P1MA01', 'Disneyland Railroad', '0'), 
                    ('P1MA04', 'Main Street Vehicles', '0'),
                    ('P1MA05', 'Disneyland Railroad Main Street Station', '0'), 
                    ('P1MA06', 'Meet Mickey Mouse', '0'),
                    ('P1NA00', 'Alice\'s Curious Labyrinth', '0'), 
                    ('P1NA01', 'Blanche-Neige et les Sept Nains', '0'),
                    ('P1NA02', 'Le Carrousel de Lancelot', '0'), 
                    ('P1NA03', 'Casey Jr. – le Petit Train du Cirque', '0'),
                    ('P1NA05', 'Dumbo the Flying Elephant', '0'), 
                    ('P1NA06', 'La Galerie de la Belle au Bois Dormant', '0'),
                    ('P1NA07', 'It\'s a small world', '0'), 
                    ('P1NA08', 'Mad Hatter\'s Tea Cups', '0'),
                    ('P1NA09', 'Le Pays des Contes de Fées', '0'), 
                    ('P1NA10', 'Peter Pan\'s Flight', '0'),
                    ('P1NA12', 'La Tanière du Dragon', '0'), 
                    ('P1NA13', 'Les Voyages de Pinocchio', '0'),
                    ('P1NA16', 'Disneyland Railroad Fantasyland Station', '0'), 
                    ('P1NA17', 'Pavillon des Princesses', '0'),
                    ('P1RA00', 'Big Thunder Mountain', '0'), 
                    ('P1RA03', 'Phantom Manor', '0'),
                    ('P1RA05', 'Rustler Roundup Shootin\' Gallery', '0'), 
                    ('P1RA06', 'Thunder Mesa Riverboat Landing', '0'),
                    ('P1RA07', 'Pocahontas Indian Village', '0'), 
                    ('P1RA10', 'Disneyland Railroad Frontierland Depot', '0'),
                    ('P2XA00', 'Studio Tram Tour : Behind the Magic', '1'), 
                    ('P2XA01', 'Art of Disney Animation', '1'),
                    ('P2XA02', 'Cars Quatre Roues Rallye', '1'), 
                    ('P2XA03', 'Crush\'s Coaster', '1'), 
                    ('P2XA05', 'Les Tapis Volants – Flying Carpets Over Agrabah', '1'), 
                    ('P2XA06', 'RC Racer', '1'), 
                    ('P2XA07', 'Toy Soldiers Parachute Drop', '1'), 
                    ('P2XA08', 'Slinky Dog Zigzag Spin', '1'), 
                    ('P2XA09', 'Ratatouille : L\'Aventure Totalement Toquée de Rémy', '1'), 
                    ('P2YA01', 'Meet Spider-Man', '1'), 
                    ('P2ZA00', 'Armageddon : les Effets Spéciaux', '1'), 
                    ('P2ZA01', 'Rock n Roller Coaster avec Aerosmith', '1'), 
                    ('P2ZA02', 'The Twilight Zone Tower of Terror', '1')
                ";
        $this->addSql($sql);
    }

    public function down(Schema $schema) : void
    {
    }
}
