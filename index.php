<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apology Generator</title>

    <link rel="stylesheet" href="./assets/scss/css/main.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');
    </style>
</head>

<body>
    <header>
        <h1>Générateur d'excuses</h1>

    </header>

    <main>
        <section class="container_form">
            <form method="post" action="?">

                <input type="text" class="input_text" id="child_name" name="child_name" required placeholder="Nom de l'enfant..."><br>


                <input type="radio" id="girl" name="gender" value="fille" required>
                <label for="girl">Fille</label>
                <input type="radio" id="boy" name="gender" value="garçon" required>
                <label for="boy">Garçon</label><br>


                <input type="text" class="input_text" id="teacher_name" name="teacher_name" required placeholder="Nom de l'enseignant..."><br>


                <div>
                    <label for="reason">Raison de l'absence:</label><br>
                    <input type="radio" id="illness" name="reason" value="illness" required>
                    <label for="illness">Maladie</label><br>
                    <input type="radio" id="pet_death" name="reason" value="pet_death" required>
                    <label for="pet_death">Décès d'un membre de la famille</label><br>
                    <input type="radio" id="extracurricular" name="reason" value="extracurricular" required>
                    <label for="extracurricular">Activité parascolaire importante</label><br>
                    <input type="radio" id="other" name="reason" value="other" required>
                    <label for="other">Devoirs non faits</label><br>
                </div>

                <button class="button_generer" type="submit"> Générer <img src="./assets/img/verifier.png" alt="logo validation"> </button>
            </form>
        </section>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $child_name = $_POST['child_name'];
            $gender = $_POST['gender'];
            $teacher_name = $_POST['teacher_name'];
            $reason = $_POST['reason'];
            $current_date = date('d/m/Y');

            $apologies = array(
                'illness' => array(
                    'fille' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Ma fille, $child_name, ne pourra pas assister au cours aujourd’hui.<br> Son état de santé justifie cette absence. Le médecin de famille lui a préconisé une période de repos.<br> Pour tout complément d’informations n’hésitez surtout pas à nous contacter. <br><br> Nos plus sincères salutations.<br>Les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Nous vous informons que ma fille, $child_name, ne pourra pas être présente en classe aujourd'hui en raison de sa santé fragile. Le médecin a recommandé qu'elle se repose pour éviter toute complication. Nous vous prions de bien vouloir lui accorder cette absence. <br><br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous écris pour vous informer que ma fille, $child_name, est malade et ne pourra pas se rendre à l'école aujourd'hui. Sa santé nécessite qu'elle reste à la maison et suive les instructions médicales. Nous vous prions de bien vouloir prendre cela en compte. <br> Merci d'avance pour votre compréhension. <br><br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Nous vous prions d'excuser l'absence de ma fille, $child_name, aujourd'hui. Elle souffre d'une maladie qui nécessite son repos à la maison. Nous avons consulté un médecin qui a recommandé qu'elle ne participe pas aux cours. Nous restons à votre disposition pour toute information supplémentaire. <br><br> Bien à vous, les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Nous tenons à vous informer que notre fille, $child_name, sera absente aujourd'hui pour des raisons médicales. Son état de santé nécessite qu'elle reste à la maison et se repose. Nous vous prions de bien vouloir lui fournir les devoirs manqués afin qu'elle puisse les rattraper. <br><br> Avec nos sincères salutations, les parents de $child_name.",
                    ),
                    'garçon' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Mon fils, $child_name, ne pourra pas assister au cours aujourd’hui.<br> Son état de santé justifie cette absence. Le médecin de famille lui a préconisé une période de repos.<br> Pour tout complément d’informations n’hésitez surtout pas à nous contacter. <br><br> Nos plus sincères salutations.<br>Les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Nous vous informons que mon fils, $child_name, ne pourra pas être présent en classe aujourd'hui en raison de sa santé fragile. Le médecin a recommandé qu'il se repose pour éviter toute complication. Nous vous prions de bien vouloir lui accorder cette absence. <br><br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous écris pour vous informer que mon fils, $child_name, est malade et ne pourra pas se rendre à l'école aujourd'hui. Sa santé nécessite qu'il reste à la maison et suive les instructions médicales. Nous vous prions de bien vouloir prendre cela en compte. <br><br> Merci d'avance pour votre compréhension. <br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Nous vous prions d'excuser l'absence de mon fils, $child_name, aujourd'hui. Il souffre d'une maladie qui nécessite son repos à la maison. Nous avons consulté un médecin qui a recommandé qu'il ne participe pas aux cours. Nous restons à votre disposition pour toute information supplémentaire. <br><br> Bien à vous, les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Nous tenons à vous informer que notre fils, $child_name, sera absent aujourd'hui pour des raisons médicales. Son état de santé nécessite qu'il reste à la maison et se repose. Nous vous prions de bien vouloir lui fournir les devoirs manqués afin qu'il puisse les rattraper. <br><br> Avec nos sincères salutations, les parents de $child_name.",
                    )
                ),
                'pet_death' => array(
                    'fille' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Ma fille, $child_name devrait nous accompagner, mon épouse et moi, ce lundi à un enterrement.<br> Pouvez-vous donc lui accorder une autorisation de sortie pour cette matinée? <br> Elle devrait être de retour dans votre établissement scolaire avant la reprise des cours de l’après-midi, le même jour. <br><br> En vous remerciant de votre compréhension, je vous prie de croire, Madame la Directrice (monsieur le Directeur), à mes sentiments distingués.",
                        "Monsieur/Madame $teacher_name,<br><br> Nous vous informons que ma fille, $child_name, devra nous accompagner à un enterrement ce lundi. Nous sollicitons donc votre bienveillance afin qu'elle puisse bénéficier d'une autorisation de sortie pour la matinée. Nous veillerons à ce qu'elle soit de retour à l'école avant la reprise des cours de l'après-midi. <br><br>Nous vous remercions sincèrement pour votre compréhension.<br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour solliciter une autorisation de sortie pour ma fille, $child_name, ce lundi matin. Nous devons assister à un enterrement familial et elle sera présente avec nous. Nous nous engageons à ce qu'elle rejoigne l'établissement avant l'après-midi. <br><br>Nous vous remercions d'avance pour votre compréhension et votre bienveillance.<br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Nous vous prions d'accorder une autorisation de sortie à notre fille, $child_name, ce lundi matin. Nous avons un événement familial triste à assister et elle devra être présente avec nous. Nous nous assurerons qu'elle revienne à l'école avant l'après-midi.<br><br> Nous vous remercions de prendre en compte notre demande.<br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour vous informer que ma fille, $child_name, ne pourra pas assister aux cours du lundi matin. Nous avons un triste événement familial, un enterrement, auquel elle doit participer avec nous. Nous souhaitons obtenir votre autorisation pour cette absence temporaire. Elle sera de retour avant l'après-midi.<br><br> Je vous remercie de votre compréhension. <br> Sincères salutations, les parents de $child_name.",
                    ),
                    'garçon' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Mon fils, $child_name devrait nous accompagner, mon épouse et moi, ce lundi à un enterrement.<br> Pouvez-vous donc lui accorder une autorisation de sortie pour cette matinée? <br> Il devrait être de retour dans votre établissement scolaire avant la reprise des cours de l’après-midi, le même jour. <br><br> En vous remerciant de votre compréhension, je vous prie de croire, Madame la Directrice (monsieur le Directeur), à mes sentiments distingués.",
                        "Cher/chère $teacher_name,<br><br> Je vous écris pour solliciter une autorisation de sortie pour mon fils, $child_name, ce lundi matin. Nous avons un enterrement auquel il doit assister avec nous, ses parents. Il sera de retour à l'école avant l'après-midi pour reprendre les cours. Je vous remercie sincèrement de prendre cela en compte. <br><br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour solliciter une autorisation de sortie pour mon fils, $child_name, le lundi matin. Nous devons assister à un enterrement en famille et il est important qu'il nous accompagne. Il sera de retour à l'école avant la reprise des cours de l'après-midi. Je vous remercie d'avance pour votre compréhension. <br><br> Respectueusement, les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Je tenais à vous informer que mon fils, $child_name, devra s'absenter de l'école ce lundi matin en raison d'un enterrement familial. Nous sollicitons votre bienveillance pour lui accorder une autorisation de sortie temporaire. Il sera de retour avant le début des cours de l'après-midi. Nous vous remercions de votre compréhension. <br><br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour vous informer que mon fils, $child_name, ne pourra pas assister aux cours du lundi matin. Nous avons un triste événement familial, un enterrement, auquel il doit participer avec nous. Nous souhaitons obtenir votre autorisation pour cette absence temporaire. Il sera de retour avant l'après-midi. Je vous remercie de votre compréhension. <br><br> Sincères salutations, les parents de $child_name.",
                    )
                ),
                'extracurricular' => array(
                    'fille' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Ma fille, $child_name, est autorisée par ses parents à ne pas assister aux cours scolaires de la journée du 25 septembre 2018. <br> Notre enfant a été sélectionnée à un concours de musique prestigieux, c'est une magnifique opportunité pour elle qu'il ne faut pas louper. <br> Vous remerciant par avance pour votre compréhension, nous vous prions de bien vouloir accepter nos salutations.",
                        "Cher/chère $teacher_name,<br><br> Je vous écris pour solliciter une autorisation pour ma fille, $child_name, afin de ne pas assister aux cours le 25 septembre 2018. Elle a été sélectionnée pour participer à un concours de musique très important. C'est une opportunité exceptionnelle pour elle et nous souhaitons lui permettre de la saisir. Nous vous remercions de prendre cela en compte. <br><br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour solliciter une autorisation spéciale pour ma fille, $child_name, de s'absenter des cours le 25 septembre 2018. Elle a été choisie pour représenter l'école dans un concours de musique de grande envergure. Nous croyons fermement en l'importance de cette expérience pour son développement artistique. Nous vous remercions de votre compréhension. <br> Respectueusement, les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Je tenais à vous informer que ma fille, $child_name, ne sera pas présente aux cours le 25 septembre 2018. Elle a été retenue pour participer à un concours musical de haut niveau et nous sommes très fiers de cette opportunité. Nous vous prions de bien vouloir lui accorder cette autorisation exceptionnelle.<br><br> Merci beaucoup pour votre compréhension. <br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour vous informer que ma fille, $child_name, ne pourra pas assister aux cours de la journée du 25 septembre 2018. Elle a été sélectionnée pour participer à un concours musical très prestigieux. Nous sommes convaincus que cette expérience enrichissante contribuera à son épanouissement.<br><br> Nous vous remercions de prendre en considération cette demande. <br> Sincères salutations, les parents de $child_name.",
                    ),
                    'garçon' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Mon fils, $child_name, est autorisé par ses parents à ne pas assister aux cours scolaires de la journée du 25 septembre 2018. <br> Notre enfant a été sélectionné à un concours de musique prestigieux, c'est une magnifique opportunité pour lui qu'il ne faut pas louper. <br><br> Vous remerciant par avance pour votre compréhension, nous vous prions de bien vouloir accepter nos salutations.",
                        "Cher/chère $teacher_name,<br><br> Je vous écris pour solliciter une autorisation pour mon fils, $child_name, afin de ne pas assister aux cours le 25 septembre 2018. Il a été sélectionné pour participer à un concours de musique très important. C'est une opportunité exceptionnelle pour lui et nous souhaitons lui permettre de la saisir.<br><br> Nous vous remercions de prendre cela en compte. <br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour solliciter une autorisation spéciale pour mon fils, $child_name, de s'absenter des cours le 25 septembre 2018. Il a été choisi pour représenter l'école dans un concours de musique de grande envergure. Nous croyons fermement en l'importance de cette expérience pour son développement artistique.<br><br> Nous vous remercions de votre compréhension. <br> Respectueusement, les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Je tenais à vous informer que mon fils, $child_name, ne sera pas présent aux cours le 25 septembre 2018. Il a été retenu pour participer à un concours musical de haut niveau et nous sommes très fiers de cette opportunité. Nous vous prions de bien vouloir lui accorder cette autorisation exceptionnelle.<br><br> Merci beaucoup pour votre compréhension. <br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour vous informer que mon fils, $child_name, ne pourra pas assister aux cours de la journée du 25 septembre 2018. Il a été sélectionné pour participer à un concours musical très prestigieux. Nous sommes convaincus que cette expérience enrichissante contribuera à son épanouissement.<br><br> Nous vous remercions de prendre en considération cette demande. <br> Sincères salutations, les parents de $child_name.",
                    )
                ),
                'other' => array(
                    'fille' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Je viens vous demander de faire preuve d’indulgence à l’égard de ma fille $child_name qui se présente ce matin en classe sans savoir sa récitation. La faute m’en incombe: notre enfant a participé à un événement familial (fête d’anniversaire de sa grand-mère). La réunion familiale qui eut lieu à cette occasion nous a tenus éveillés assez tard et j’ai pris la responsabilité de la dispenser d’un travail scolaire à une heure avancée.<br> Elle m’a promis d’apprendre son texte (poésie, leçons) au plutôt.<br><br> Je vous remercie par avance pour votre compréhension.<br> Cordialement.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande afin de solliciter votre compréhension envers ma fille, $child_name, qui ne s'est pas préparée pour la récitation d'aujourd'hui. Cela est entièrement de ma faute : notre famille a célébré l'anniversaire de sa grand-mère et nous avons passé une soirée très tardive. J'ai pris la décision de la dispenser de son travail scolaire à une heure avancée.<br> Elle s'engage à apprendre son texte (poésie, leçons) dès que possible.<br><br> Je vous remercie par avance pour votre indulgence.<br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous écris pour vous demander d'excuser ma fille, $child_name, qui n'a pas pu préparer sa récitation pour aujourd'hui. La responsabilité en revient à moi : nous avons assisté à un événement familial important, l'anniversaire de sa grand-mère, qui s'est prolongé tard dans la nuit. J'ai pris la décision de la dispenser de son devoir à une heure avancée.<br> Elle s'engage à apprendre son texte (poésie, leçons) dès que possible.<br><br> Je vous remercie de votre compréhension.<br> Cordialement, les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Je tenais à vous informer que ma fille, $child_name, n'est pas préparée pour sa récitation aujourd'hui. C'est entièrement de ma faute : nous avons participé à une célébration familiale, l'anniversaire de sa grand-mère, qui s'est prolongée tard dans la soirée. J'ai pris la décision de lui accorder une dispense de travail scolaire à une heure avancée.<br> Elle s'engage à apprendre son texte (poésie, leçons) dès que possible.<br><br> Je vous remercie de votre compréhension et de votre indulgence.<br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande pour vous informer que ma fille, $child_name, n'a pas pu réaliser sa récitation pour aujourd'hui. La responsabilité en incombe à moi : nous avons assisté à une réunion familiale importante, l'anniversaire de sa grand-mère, qui a duré jusqu'à une heure tardive. J'ai décidé de la dispenser de son travail scolaire à une heure avancée.<br> Elle s'engage à apprendre son texte (poésie, leçons) dès que possible.<br><br> Je vous remercie de votre compréhension et de votre bienveillance.<br> Cordialement, les parents de $child_name.",
                    ),
                    'garçon' => array(
                        "Monsieur/Madame $teacher_name,<br><br> Je viens vous demander de faire preuve d’indulgence à l’égard de mon fils $child_name qui se présente ce matin en classe sans savoir sa récitation. La faute m’en incombe: notre enfant a participé à un événement familial (fête d’anniversaire de sa grand-mère). La réunion familiale qui eut lieu à cette occasion nous a tenus éveillés assez tard et j’ai pris la responsabilité de la dispenser d’un travail scolaire à une heure avancée.<br> Elle m’a promis d’apprendre son texte (poésie, leçons) au plutôt.<br><br> Je vous remercie par avance pour votre compréhension.<br> Cordialement.",
                        "Cher/chère $teacher_name,<br><br> Je viens vous demander de faire preuve d’indulgence à l’égard de mon fils $child_name qui se présente ce matin en classe sans savoir sa récitation. La faute m’en incombe : notre enfant a participé à un événement familial (fête d’anniversaire de sa grand-mère). La réunion familiale qui eut lieu à cette occasion nous a tenus éveillés assez tard et j’ai pris la responsabilité de le dispenser d’un travail scolaire à une heure avancée.<br> Il m’a promis d’apprendre son texte (poésie, leçons) au plus tôt.<br><br> Je vous remercie par avance pour votre compréhension.<br> Cordialement.",
                        "Cher/chère $teacher_name,<br><br> Je vous adresse cette demande afin de solliciter votre compréhension envers mon fils, $child_name, qui ne s'est pas préparé pour la récitation d'aujourd'hui. Cela est entièrement de ma faute : notre famille a célébré l'anniversaire de sa grand-mère et nous avons passé une soirée très tardive. J'ai pris la décision de le dispenser de son travail scolaire à une heure avancée.<br> Il s'engage à apprendre son texte (poésie, leçons) dès que possible.<br><br> Je vous remercie par avance pour votre indulgence.<br> Cordialement, les parents de $child_name.",
                        "Cher/chère $teacher_name,<br><br> Je vous écris pour vous demander d'excuser mon fils, $child_name, qui n'a pas pu préparer sa récitation pour aujourd'hui. La responsabilité en revient à moi : nous avons assisté à un événement familial important, l'anniversaire de sa grand-mère, qui s'est prolongé tard dans la nuit. J'ai pris la décision de le dispenser de son devoir à une heure avancée.<br> Il s'engage à apprendre son texte (poésie, leçons) dès que possible.<br><br> Je vous remercie de votre compréhension.<br> Cordialement, les parents de $child_name.",
                        "Monsieur/Madame $teacher_name,<br><br> Je tenais à vous informer que mon fils, $child_name, n'est pas préparé pour sa récitation aujourd'hui. C'est entièrement de ma faute : nous avons participé à une célébration familiale, l'anniversaire de sa grand-mère, qui s'est prolongée tard dans la soirée. J'ai pris la décision de lui accorder une dispense de travail scolaire à une heure avancée.<br> Il s'engage à apprendre son texte (poésie, leçons) dès que possible.<br><br> Je vous remercie de votre compréhension et de votre indulgence.<br> Cordialement, les parents de $child_name.",
                    )
                )
            );


            $message_index = array_rand($apologies[$reason][$gender]);
            $message = $apologies[$reason][$gender][$message_index];



            echo "<section class='container_apology'> <p>Date: $current_date </p> <br>  $message </section>";
        }

        ?>

    </main>
</body>

</html>