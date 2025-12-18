<?php

namespace Database\Seeders;

use App\Models\Article;

use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $faker = Factory::create('fr_FR');

        $titre = "Au clair de la lune";

        $texte = "Ah, Au clair de la lune, cette ballade intemporelle où l’on découvre que la première urgence, au XVIIIᵉ siècle, n’était ni la faim, ni la guerre, ni même la météo… mais un manque de bougie. Le héros, manifestement équipé d’une mémoire de poisson rouge, se retrouve plongé dans l’obscurité totale et décide d’aller sonner chez son voisin Pierrot, spécialiste incontesté de la gestion d’inventaire… enfin, c’est ce qu’il espère. Pierrot, bien sûr, dort. Car personne ne dort jamais dans une chanson, sauf quand on a besoin d’une bougie.<br />

Après quoi, la quête du luminaire devient soudain une tragicomédie du quotidien : on gratte, on cherche, on soupire… et on réalise que toute l'intrigue repose sur un objet disparu qui aurait pu être remplacé par absolument n’importe quoi. Une torche ? Une lanterne ? Une luciole motivée ? Non. Il faut une bougie. Et tant pis si l’on réveille tout le voisinage au passage.<br />

Cette chanson, finalement, est une sorte de tutoriel poétique sur le thème : “Comment créer du drame avec un accessoire à deux sous.” Et ça fonctionne encore aujourd’hui, car rien n’est plus universel que de chercher quelque chose dans le noir, de ne pas le trouver, et d’accuser un ami innocent au passage.<br />

Bref : une aventure nocturne minimaliste, un suspense à hauteur d’enfant, et une morale simple — mieux vaut vérifier sa réserve de bougies avant l’heure du coucher.<br />";

        $resume = "Un homme cherche désespérément une bougie dans la nuit et finit par réveiller tout son entourage pour résoudre un minuscule problème d’éclairage.";

        Article::create([
            'titre' => $titre,
            'resume' => $resume,
            'texte' => $texte,
            'image' => '/images/au-clair-de-la-lune.jpg',
            'media' => 'https://comptines.tv/musiques/au_clair_de_la_lune.mp3',
            "en_ligne" => 1,
            "nb_vues" => 50,
            "user_id" => 1,
            "rythme_id" => 1,
            "accessibilite_id" => 3,
            "conclusion_id" => 1,
          
        ]);

        Article::create([
            'titre' => ' Le punk, entre force brute et limites artistiques',
            'resume' =>' Prêt à plonger dans l’univers du punk ? Des garages à la scène , du mensonge à la vérité. Le punk n’est pas seulement un look mais un état de liberté. Déchainez-vous !',
            'texte'=>'Avez-vous déjà fait l’expérience de la musique punk ? Elle se moque complètement de votre playlist, de votre zone de confort et de vos attentes en matière d’excellence musicale. Le punk rock débarque là où on ne l’attend pas, le son poussé au maximum, et défie quiconque ose lui trouver des défauts. Si vous cherchez de la maîtrise technique et des mélodies apaisantes, alors félicitations : vous êtes au mauvais endroit.

Le punk est né parce que des gens s’ennuyaient à mourir. Lassés de la société, des règles, et d’être obligés de bien se tenir. Alors, au lieu d’attendre, ils ont attrapé trois accords et une guitare bon marché pour crier tout cela. Fort. Parfois faux. Mais toujours honnêtement.

Musicalement, le punk est délicieusement brut. Pas de longs solos, pas de sur analyse, pas de recherche de perfection. Seulement la vitesse qui hurle, les guitares saturées qui gémissent et des voix prêtes à se briser d’un instant à l’autre. Le punk ne cherche pas à vous impressionner. Il cherche à vous réveiller. Et si cela vous brûle un peu les oreilles, c’est la moitié du plaisir.

Le punk est aussi une famille de personnes qui n’ont jamais vraiment trouvé leur place dans la société et qui ont fini par arrêter de faire semblant. C’est dans cet esprit qu’il est né. Le punk n’a jamais attendu l’approbation des maisons de disques ou des critiques : il a simplement décidé de faire les choses lui-même, mal au début, puis mieux, puis plus fort.

Tout se lit dans le look : vêtements en lambeaux, épingles à nourrice, cuir, coiffures étranges. Non pas parce que c’est à la mode, mais parce que le punk n’est pas seulement un style : c’est une mentalité.

Le punk promet la vérité. Et parfois, la vérité arrive en hurlant, sans aucune excuse. Et à tout remettre en question autour de vous.
',
            'image' => '/images/Img_article_1.jpg',
            'media'=> 'https://comptines.tv/musiques/au_clair_de_la_lune.mp3',
            "en_ligne"=>1,
            "nb_vues" => 0,
            "user_id" => 1,
            "rythme_id" => 1,
            "accessibilite_id" => 3,
            "conclusion_id" => 1,

        ]);

        Article::create([
            'titre' => ' Les limites du punk : entre simplicité et répétition',
            'resume' => 'Le Punk c’est génial , explosif , libre mais répétitif. La plus grande force du punk est aussi sa faiblesse , à force de crier , on finit par ne plus entendre la subtilité. Une étincelle dans un monde calme : c’est le Punk',
            'texte' => 'Le punk est très apprécié pour son énergie, sa simplicité et son esprit rebelle. Mais dun autre côté, c’est cette simplicité qui fait que le genre peut aussi devenir sa principale limite. Le refus des règles et de complexité peut parfois sembler répétitif et restrictif.

        Dun point de vue musical, le punk mise tout sur la vitesse, le volume et la simplicité. Trois accords peuvent être incroyablement libérateurs, mais ils deviennent vite répétitifs. Lors d’un concert punk, après quelques morceaux, il est parfois difficile de suivre le rythme soutenu et les structures très similaires. Cette similarité peut plaire au départ , mais à force , elle peut être lassante , en particulier pour les auditeurs en quête de diversité musicale.

        Au niveau des paroles , on retrouve plusieurs thèmes comme la colère , la frustration , le rejet , ces thèmes qui sont à lessence même de ce genre maintenant sont parfois obsolètes.
Le monde évolue, tandis que certaines chansons punk répètent toujours les mêmes slogans, sans se demander si la rébellion elle-même a changé. Quand tout est crié, la subtilité se perd.

Le style punk comporte également ses contradictions. Ce qui était initialement un rejet des codes sociaux et de la mode est devenu un uniforme reconnaissable. La veste en cuir, les vêtements déchirés et les épingles à nourrice, symboles de rébellion, sont parfois perçus comme une obligation. Une culture née pour refuser les règles a paradoxalement créé ses propres codes.

Cela ne diminue en rien l’importance du punk. Il a ouvert des portes, bousculé les conventions et rappelé que l’expression vaut plus que la perfection. Néanmoins, ses forces peuvent devenir ses limites. Le punk fonctionne mieux comme une étincelle : immédiat, fort et incisif.

En somme, le punk reste un chapitre essentiel de l’histoire de la musique, même s’il peine parfois à dépasser le cadre qu’il s’est lui-même fixé.',
            'image' => '/images/Img_article_2.jpg',
            'media'=> 'https://comptines.tv/musiques/au_clair_de_la_lune.mp3',
            "en_ligne"=>1,
            "nb_vues" => 0,
            "user_id" => 1,
            "rythme_id" => 1,
            "accessibilite_id" => 3,
            "conclusion_id" => 1,

        ]);



        for($i = 1; $i <= 50; $i++)
            Article::create([
                'titre' => $faker->text(20),
                'resume' => $faker->realTextBetween(30, 100,  2),
                'texte' => $faker->realTextBetween(160, 500,  2),
                'image' => "/images/article$i.png",
                'media' => 'https://comptines.tv/musiques/au_clair_de_la_lune.mp3',
                "user_id" =>  $faker->numberBetween(1, 50),
                "rythme_id" => $faker->numberBetween(1, 5),
                "accessibilite_id" => $faker->numberBetween(1, 5),
                "conclusion_id" => $faker->numberBetween(1, 5),
                "en_ligne" => $faker->numberBetween(0,1),
                "nb_vues" => $faker->numberBetween(0, 20),
            ]);
    }
}
