<?php

$link = mysqli_connect('localhost', 'root', '' , 'data');

// $file = scandir('./data/sites');
// foreach ($file as $key => $value) {
//     if ($value == '..' || $value =='.') {
//         continue;
//     }
//     $data = json_decode(file_get_contents('./data/sites/'.$value),true);

//     $sql = 'insert into sites (`description`, `tags`,`url`,`createAt`,`name`,`id`) values (
//     "'.$data['description'].'" ,
//     "'.$data['tags'].'", "'.$data['url'].'", "'.$data['createAt'].'","'.$data['name'].'","'.$data['id'].'")';

//    mysqli_query($link, $sql);
//    echo $data['id'].PHP_EOL;
// }

$data = mysqli_query($link, 'select * from sites where is_show = 1');

 while ($row = mysqli_fetch_assoc($data)) {
    $fileName = './data/sites/'.$row['id'].'json';
    if (!file_exists($fileName)) {
        file_put_contents($fileName, json_encode($row));
        echo $row['id'].PHP_EOL;
    }
}
mysqli_free_result($data);

system('./build.js');




