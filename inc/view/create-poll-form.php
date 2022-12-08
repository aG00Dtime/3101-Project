<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // meeting id from meetings page
    $meeting_id = $_GET['meeting_id'];
}
?>

<div class="container-fluid" style="position: absolute; top: 20%">
    <div class="row">
        <div class="col-4 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Create new Poll
                    </h5>
                    <div class="card-text">
                        <form method="POST" action="<?php include_once './inc/view/add-poll-inc.php';
                                                    createPoll() ?>">
                            <div class="mb-3">
                                <!--meeting id to create poll for-->
                                <input type="hidden" name="meeting_id" id="meeting_id" value="<?php echo $meeting_id ?>">

                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>

                            <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <input type="text" class="form-control" name="desc" id="desc" required>
                            </div>
                            <div class="mb-3">
                                <label for="poll-answers" class="form-label">Poll Answers (per line)</label>
                                <textarea class="form-control" id="poll-answers" name="poll-answers" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name='create-poll'>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>