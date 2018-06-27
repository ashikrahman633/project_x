<?php include 'inc/header.php'; ?>
<?php
    Session::checkSession();

    $total = $exm->getTotalQuestionNumber();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $process = $pro->processData($_POST);
}
?>
<div class="main">
    <h1>All Questions & Ans: <?php echo $total; ?></h1>
    <div class="test">
            <table>
                <?php
                    $getque = $exm->getAllQuestion();
                    if ($getque){
                        while ($question = $getque->fetch_assoc()){

                ?>
                <tr>
                    <td colspan="2">
                        <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
                    </td>
                </tr>
                <?php
                   $number = $question['quesNo'];
                    $answer = $exm->getAnswer($number);
                    if ($answer){
                        while ($result = $answer->fetch_assoc()){

                        ?>
                        <tr>
                            <td>
                                <input type="radio"/>
                                <?php
                                    if ($result['rightAns'] == '1'){
                                        echo "<span style='color: green'>".$result['ans']."</span>";
                                    }else{
                                        echo $result['ans'];
                                    }

                                ?>
                            </td>
                        </tr>
                    <?php } } ?>
                <?php } } ?>
            </table>
        <a href="starttest.php?">Start Again</a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>/