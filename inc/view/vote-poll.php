<?php



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // meeting id from meetings page
    $poll_id = $_GET['poll_id'];


    include "./inc/model/db-connection-class.php";
    include "./inc/model/get-poll-class.php";
    include "./inc/controller/get-poll-controller.php";


    $getPollName = new GetPollController(null, $poll_id);

    $answers = $getPollName->GetPollAns();
    // get title
    $getPollName = $getPollName->GetPollDet();
}

?>
<div class="container-fluid" style="position: absolute; top: 20%">
    <div class="row">
        <div class="col-4 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">

                        Vote

                    </h5>
                    <div class="card-text">
                        <form method="POST" action="<?php include './inc/view/vote-inc.php';
                                                    voteOnPoll() ?>">

                            <div class="mb-3">
                                <input type="hidden" name="poll_id" value="<?php echo $poll_id ?>">

                                <h4><?php echo $getPollName[0]['poll_title'] ?></h4>
                            </div>

                            <div>

                                <?php for ($i = 0; $i < count($answers); $i++) : ?>

                                    <div class="form-check mb-3">

                                        <input class="form-check-input" type="radio" value="<?= $answers[$i]['id'] ?>" name="poll_answer" checked>

                                        <label class="form-check-label">

                                            <?= $answers[$i]['title'] ?>

                                        </label>

                                    </div>

                                <?php endfor; ?>

                            </div>
                            <button type="submit" class="btn btn-info " name='vote'>Vote</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>