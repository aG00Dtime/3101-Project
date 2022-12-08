<?php


// create table to add meetings
echo '<table class="table table-light ">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Time</th>
        <th scope="col">Date</th>
        <th scope="col">Manage</th>
    </tr>
</thead>
<tbody>';

// add data to tables
// $count = 1;
// while ($rows = $meetings->fetch(PDO::FETCH_ASSOC)) {
echo '
    <tr>
    <th scope="row">1</th>
    <td> test</td>
    <td> test</td>
    <td> test</td>
    <td> test</td>
    <td><button type="button" class="btn btn-info">Update</button> <button type="button" class="btn btn-danger">Delete</button> </td>
    
    </tr>

    ';

//     $count = $count + 1;
// }

echo '</tbody>
</table>';
