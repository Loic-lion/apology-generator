<!DOCTYPE html>
<html>

<head>
    <title>Apology Generator</title>
</head>

<body>
    <h1>Apology Generator</h1>
    <form method="post" action="excuse.php">
        <label for="child_name">Nom de l'enfant:</label>
        <input type="text" id="child_name" name="child_name" required><br>

        <label for="gender">Genre de l'enfant:</label>
        <input type="radio" id="girl" name="gender" value="fille" required>
        <label for="girl">Fille</label>
        <input type="radio" id="boy" name="gender" value="garçon" required>
        <label for="boy">Garçon</label><br>

        <label for="teacher_name">Nom de l'enseignant:</label>
        <input type="text" id="teacher_name" name="teacher_name" required><br>

        <label for="reason">Raison de l'absence:</label><br>
        <input type="radio" id="illness" name="reason" value="illness" required>
        <label for="illness">Maladie</label><br>
        <input type="radio" id="pet_death" name="reason" value="pet_death" required>
        <label for="pet_death">Décès d'un animal de compagnie (ou d'un membre de la famille)</label><br>
        <input type="radio" id="extracurricular" name="reason" value="extracurricular" required>
        <label for="extracurricular">Activité para-scholaire importante</label><br>
        <input type="radio" id="other" name="reason" value="other" required>
        <label for="other">Any other excuse of your choice</label><br>

        <input type="submit" value="Generate Apology">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $child_name = $_POST['child_name'];
        $gender = $_POST['gender'];
        $teacher_name = $_POST['teacher_name'];
        $reason = $_POST['reason'];

        $apology = generateApology($child_name, $gender, $teacher_name, $reason);
        echo "<h2>Generated Apology:</h2>";
        echo "<p>$apology</p>";
    }

    function generateApology($child_name, $gender, $teacher_name, $reason)
    {
        switch ($reason) {
            case 'illness':
                $apology = "Monsieur/Madame $teacher_name,<br> Mon/Ma $gender, $child_name, ne pourra pas assister au cours aujourd’hui.<br> Son état de santé justifie cette absence. Le médecin de famille lui a préconisé une période de repos.<br> Pour tout complément d’informations n’hésitez surtout pas à nous contacter. <br> Nos plus sincères salutations.<br>Signature des parents";
                break;
            case 'pet_death':
                $apology = "Monsieur/Madame  $teacher_name,<br> Mon/Ma $gender, $child_name devrait nous accompagner , mon épouse et moi, ce lundi à un enterrement.<br> Pouvez-vous donc lui accorder une autorisation de sortie pour cette matinée? <br> Il devrait être de retour dans votre établissement scolaire avant la reprise des cours de l’après-midi, le même jour. <br> En vous remerciant de votre compréhension, je vous prie de croire, Madame la Directrice (monsieur le Directeur), à mes sentiments distingués. <br>Signature des parents";
                break;
            case 'extracurricular':
                $apology = "Monsieur/Madame $teacher_name,<br> Mon/Ma $gender, $child_name, est autorisé par ses parents à ne pas assister aux cours scolaires de la journée du 25 septembre 2018. <br> Notre enfant à été selctionné à un concours de musique prestigieux, c'est une magnifique opportunitée pour lui/elle qu'il ne faut pas louper. <br> Vous remerciant pas avance pour votre compréhension, nous vous prions de bien vouloir accepter nos salutations. <br>Signature des parents";
                break;
            case 'other':
                $apology = "Monsieur/Madame $teacher_name,\n\nI regret to inform you that my $gender, $child_name, will not be able to attend school today due to unforeseen circumstances. [Please mention your own excuse here]. We apologize for any inconvenience caused and appreciate your understanding.\n\nSincerely,\n[Your Name]";
                break;
            default:
                $apology = "Dear $teacher_name,\n\nI am writing to inform you that my $gender, $child_name, is unable to attend school today. We apologize for the inconvenience caused and appreciate your understanding.\n\nSincerely,\n[Your Name]";
        }

        return $apology;
    }
    ?>
</body>

</html>