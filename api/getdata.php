<?php
include('includes/databasefatch.php');
$query = 'SELECT * FROM tblblog order by id desc';
$stm = $dbh->prepare($query);
$stm->execute();
$num = $stm->rowCount();

// Check if any posts
if ($num > 0) {
    // Post array
    //$posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'ID' => $id,
            'PostTitle' => $PostTitle,
            //  'ServiceType' => html_entity_decode($ServiceType),
            'CategoryId' => $CategoryId,
            'PostDetails' => $PostDetails,
            'Nepali_date' => $PostingDate,
            'PostImage' => "https://www.drbtvnetwork.com/25790/admin/blogimages/$PostImage",
            'Location' => $Location,
            'Creator' => $Creator,
            'Source' => $Source,
            'Lke' => $Lke,
            'url' => "https://www.drbtvnetwork.com/blog?nid=$id"
        );

        // Push to "data"
        // array_push($posts_arr, $post_item);
        array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);
} else {
    // No Posts
    echo json_encode(
        array('message' => 'No Posts Found')
    );

    mysqli_close($dbh);
}
