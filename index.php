<?php

$people = array(
   array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
   array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
   array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
   array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
   array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

?>
<!DOCTYPE html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($people as $p) : ?>
        <tr>
            <th><?php echo $p['first_name']; ?></th>
            <th><?php echo $p['last_name']; ?></th>
            <th><?php echo $p['email']; ?></th>
            <th><button data-id="<?php echo $p['id']; ?>" class="btn">Alert</button></th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
window.people = <?php echo json_encode($people); ?>;

jQuery(document).ready(function(){
    $('.btn').on('click', function() {
        var id = $(this).attr('data-id');
        var match = getPerson(id);
        if (match) {
            alert('Name: '+match.first_name+' '+match.last_name+' Email: '+match.email);
        }
    });

    function getPerson(id) {
        var i;
        var person;
        var p = null;
        for (i = 0; i < people.length; i++) {
            person = people[i];
            if (person.hasOwnProperty("id") && person.id == id ) {
                p = person;
                break;
            }
        }
        return p;
    }
});
</script>
</body>
</html>