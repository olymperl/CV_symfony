<?php

namespace App\DataFixtures;

use App\Entity\Competences;
use App\Entity\Formations;
use App\Entity\Experiences;
use App\Entity\Contacts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $competences_list = [
            ['titre' => 'Photoshop', 'description' => 'Utilisation de Photoshop dans le domaine des cours : création d\'affiche, retouche photo...', 'img' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Photoshop_CC_icon.png'],
            ['titre' => 'Illustrator', 'description' => 'Utilisation d\'Illustrator dans le domaine des cours : création de personnage afin de les animer par la suite, d\'affiche ...', 'img' => 'https://upload.wikimedia.org/wikipedia/commons/6/66/Illustrator_CC_icon.png'],
            ['titre' => 'HTML/CSS', 'description' => 'Utilisation de HTML/CSS dans le domaine des cours avec la création de site web et pour des projets personnels.', 'img' => 'http://www.webdevelopmenthelp.net/wp-content/uploads/2015/09/HTML55.png'],
            ['titre' => 'PHP', 'description' => 'Utilisation de PHP dans le domaine des cours avec la création d\'une facture et d\'autres pages web comme une page de connexion', 'img' => 'https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2016/04/1459870313PHP-logo.svg.png']
        ];

        $experiences_list = [
            ['titre' => 'Workshop : Projet débats IDEO', 'description' => 'EEMI : Projet de création d’un site de débat avec l’association «Tech for good».  Réalisation de l’étude de marché, d’une expérience map ainsi que d’un userflow.', 'img' => 'https://thumbor.sd-cdn.fr/UDZjnuEaUvESq1bwtu8sdSVs838=/940x550/cdn.sd-cdn.fr/wp-content/uploads/2020/12/tech_for_good.jpg'],
            ['titre' => 'Workshop : Création d’un site de QCM', 'description' => 'EEMI : Réalisation d’une étude de marché ainsi que de la partie rédaction du QCM. Création d’un userflow ainsi que de l’arborescence du site.', 'img' => 'https://blog.hubspot.com/hubfs/8%20Tips%20for%20Creating%20Super%20Smooth%20User%20Flows%20for%20UX.png'],
            ['titre' => 'Élue CMJ, Conseil Municipal Jeune', 'description' => 'Houilles, de 2015 à 2017 : "Vivre sa jeunesse à Houilles" : organiser des activités adaptées aux jeunes ovillois en partenariat avec les animateurs jeunesse de la ville.', 'img' => 'https://lh3.googleusercontent.com/proxy/E5i2Qd1fRvo-u6dO-JsuUa7yOHhNbQ3UKr9v2T0K2IILxTtNh0_Yg6r_sGkfjAIaZJOCt1lfby-QzqTrqS1ZPay-PW6elIwWyL5Hhc2U83DPQOXdyroUqarBDHVl4FqDWA']
        ];

        $formations_list = [
            ['titre' => ' École Européenne des Métiers de l’Internet | EEMI', 'description' => 'De 2019 à 2022 : Cursus de 3 années d’études permettant la compréhension des enjeux digitaux et formation au domaine du web développement, du marketing et du design. Mes deux premières années m’auront donné l’occasion d’étudier différentes matières transverses telles que le marketing, le design et le web développement. ', 'img' => 'https://www.eemi.com/wp-content/uploads/2020/11/eemi-rs.jpg'],
            ['titre' => 'Lycée les Pierres Vives', 'description' => 'De 2016 à 2019 : Obtention du baccalauréat Économique et Social spécialité mathématiques', 'img' => 'https://static.actu.fr/uploads/2019/09/dd1.jpg']
        ];
        $contacts_list = [
            ['mail' => 'marc.dupont@gmail.com', 'nom' => 'Marc Dupont', 'message' => 'Super ton CV !'],
            ['mail' => 'leomine@gmail.com', 'nom' => 'Leo Mine', 'message' => 'Bonne idée le CV en Symfony.'],
            ['mail' => 'abcdefg@gmail.com', 'nom' => 'Théo', 'message' => 'Ca serait sympa de voir plus tes compétences et ce que tu as fait pendant tes expériences !']
        ];

        foreach($competences_list as $comp){
            $competence = new Competences();
            $competence->setTitre($comp['titre']);
            $competence->setDescription($comp['description']);
            $competence->setImg($comp['img']);
            $manager->persist($comp);
            $manager->flush();
        }
        
        foreach($experiences_list as $exp){
            $experience = new Experiences();
            $experience->setTitre($exp['titre']);
            $experience->setDescription($exp['description']);
            $experience->setImg($exp['img']);
            $manager->persist($exp);
            $manager->flush();
        }
        foreach($formations_list as $form){
            $formation = new Formations();
            $formation->setTitre($form['titre']);
            $formation->setDescription($form['description']);
            $formation->setImg($form['img']);
            $manager->persist($form);
            $manager->flush();
        }
        foreach($contacts_list as $contact){
            $contact = new Contact();
            $contact->setMail($form['mail']);
            $contact->setNom($form['nom']);
            $contact->setMessage($form['message']);
            $manager->persist($comp);
            $manager->flush();
        }

    }
}
