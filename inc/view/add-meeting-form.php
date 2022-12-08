<div class="container-fluid" style="position: absolute; top: 15%">
    <div class="row">
        <div class="col-4 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Add New Meeting
                    </h5>
                    <div class="card-text">
                        <form method="POST" action="<?php include './inc/view/add-meeting-inc.php';
                                                    addMeeting() ?>">
                            <div class="mb-3">
                                <label for="mname" class="form-label">Meeting Name</label>
                                <input type="text" class="form-control" name="mname" id="mname" required>
                            </div>

                            <div class="mb-3">
                                <label for="mdescr" class="form-label">Description</label>
                                <input type="text" class="form-control" name="mdescr" id="mdescr" required>
                            </div>

                            <div class="mb-3">
                                <label for="mtime" class="form-label">Time</label>
                                <input type="time" class="form-control" name="mtime" id="mtime" required>
                            </div>

                            <div class="mb-4">
                                <label for="mdate" class="form-label">Date</label>
                                <input type="date" class="form-control" name="mdate" id="mdate" required>
                            </div>

                            <div class="mb-4">
                                <label for="murl" class="form-label">URL</label>
                                <input type="url" class="form-control" name="murl" id="murl" required>
                            </div>

                            <label>Select Meeting Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="PRIVATE" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Private Meeting
                                </label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" value="PUBLIC" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Public Meeting
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary" name="add-meeting">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>