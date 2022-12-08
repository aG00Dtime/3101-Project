<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    // for url generation
    $root_url = "http://" . $_SERVER['HTTP_HOST'];
    $root_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

    $poll_id = $_GET['vote'];


    $url = $root_url . "vote-poll?poll_id={$poll_id}";
}

?>
<div class="card mx-auto" style="width:30rem">
    <div class=" card-body">
        <h5 class="card-title">Shareable URL</h5>

        <input class="text container-fluid" value="<?php echo $url ?>">

    </div>
</div>