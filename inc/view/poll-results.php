<?php


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $poll_id = $_GET['results'];


    include_once "./inc/model/db-connection-class.php";
    include_once "./inc/model/poll-results-class.php";
    include_once "./inc/controller/poll-results-controller.php";

    $votes = new PollResultsController($poll_id);

    $results = $votes->GetResults();

    $title = $votes->GetPollTitle();

    $totalVotes = 0;

    foreach ($results as $result) {

        $totalVotes += $result['votes'];
    }


    // dirty bug fix
    if ($totalVotes == 0) {
        $totalVotes = 1;
    }
}

?>
<div class="card  mb-3 mx-auto" style=" max-width: 40rem; ">
    <div class="card-header">
        Poll Results
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $title[0]['poll_title'] ?></h5>

        <div class="container ">
            <?php foreach ($results as $result) : ?>
                <div class="container mb-4">

                    <label><?= $result['title'] ?> <span>(<?= $result['votes'] ?> Votes)</span></label>

                    <div class=" progress">
                        <div class="progress-bar" role="progressbar" style="width:<?= @round(($result['votes'] / $totalVotes) * 100) ?>%" aria-valuenow=" 75" aria-valuemin="0" aria-valuemax="100"><?= @round(($result['votes'] / $totalVotes) * 100) ?>%</div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>


    </div>
</div>