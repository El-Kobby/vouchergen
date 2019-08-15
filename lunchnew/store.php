<form id="survey_update">
    <h3><?php echo $sg_request; ?></h3>

    <div class="wrapper1">
        <label><?php echo $sq_request1 = $sq_table->getQuestionByID(1); ?></label><br>
        <input type="radio" id="servicemanager1"><?php echo $sqo_request = $sqo_table->getRecurringFirstOptions(); ?>
    </div><br>
    <!--h4><!--?php echo $sq_request2 = $sq_table->getQuestionByID(3); ?></h4>
        <input type="radio" id="nonrecurringoption1"><!--?php echo $sqo_request2 = $sqo_table->getOptionsBySurveyQuestion(3); ?>-->

    <div class="wrapper2">
        <label><?php echo $sq_request3 = $sq_table->getQuestionByID(4); ?></label><br>
        <input type="radio" id="servicemanager2"><?php echo $sqo_request3 = $sqo_table->getRecurringSecondOptions(); ?>
    </div><br>

    <h3><?php echo $sg_request2 = $sg_table->getSurveyGroup(2); ?></h3><br>
    <label><?php echo $sq_request4 = $sq_table->getQuestionByID(5); ?></label><br>
    <input type="radio" id="clientmanager1"><?php echo $sqo_request; ?><br>
    <!--h4><!--?php echo $sq_request5 = $sq_table->getQuestionByID(7) ?></h4>
        <input type="checkbox" id="improv"><!--?php echo $sqo_request4 = $sqo_table->getOptionsBySurveyQuestion(7); ?>-->

    <label><?php echo $sq_request6 = $sq_table->getQuestionByID(8) ?></label><br>
    <input type="radio" id="recurringoption3"><?php echo $sqo_request3 ?><br>

    <label><?php echo $sq_request7 = $sq_table->getQuestionByID(9) ?></label><br>
    <input type="radio" id="recurringoption4"><?php echo $sqo_request3 ?><br>

    <h3><?php echo $sg_request3 = $sg_table->getSurveyGroup(3); ?></h3><br>
    <label><?php echo $sq_request8 = $sq_table->getQuestionByID(10) ?></label><br>
    <input type="radio" id="improv2"><?php echo $sqo_request5 = $sqo_table->getOptionsBySurveyQuestion(10); ?><br>

    <div class="wrapper3">
        <label><?php echo $sq_request9 = $sq_table->getQuestionByID(11) ?></label><br>
        <input type="radio" id="likelyuse"><?php echo $sqo_request5 = $sqo_table->getOptionsBySurveyQuestion(11); ?>
    </div><br>

    <h3><?php echo $sg_request4 = $sg_table->getSurveyGroup(4); ?></h3><br>
    <div class="wrapper4">
        <label><?php echo $sq_request10 = $sq_table->getQuestionByID(13) ?></label><br>
        <input type="radio" id="satisfaction"><?php echo $sqo_request3 ?>
    </div><br>

    <label><?php echo $sq_request11 = $sq_table->getQuestionByID(15) ?></label><br>
    <input type="radio" id="recurringoption6"><?php echo $sqo_request3 ?><br>

    <label>Please Provide additional comments</label><br>
    <textarea rows="5" id="comments"></textarea><br>

    <button id='approval' class="btn btn-ispic btn-icon glyphicons circle_ok" type="button"><i></i>Submit</button>

</form>
