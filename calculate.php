<?php

$date_sold = $_POST['date_sold'];

$sqldate = "INSERT INTO stocks (date_sold) VALUES ('$date_sold')";

    // an array items to insert
    $array = array( $_POST[sold1]  => $_POST[exp1],
                  $_POST[sold2]       => $_POST[exp2],
                $_POST[sold3]     => $_POST[exp3]
            );

    // begin the sql statement
    $sql = "INSERT INTO stocks (rotid,sold, num_expired ) VALUES ";

    // this is where the magic happens
    $it = new ArrayIterator( $array );

    // a new caching iterator gives us access to hasNext()
    $cit = new CachingIterator( $it );

    // loop over the array
    foreach ( $cit as $value )
    {
        // add to the query
        $sql .= "('".$cit->key()."','" .$cit->current()."')";
        // if there is another array member, add a comma
        if( $cit->hasNext() )
        {
            $sql .= ",";
        }
    }
    
    


    // now we can use a single database connection and query
    $conn = mysql_connect('localhost', 'root','mysql' );
    mysql_select_db( 'idsdb', $conn );
    mysql_query( $sql, $conn );
    
    //redirect to the HOME page
$to = 'list.php';
header('Location: '. $to);

?>