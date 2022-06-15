<?php
    include "koneksi.php";

    $sql = "INSERT INTO tb_covid_all (country, total_case, new_case,total_death,new_death,total_recovered,new_recovered) VALUES 
    ('India', 43185049, 3714, 524708, 7, 42633365,2513),
    ('S.Korea', 18168708, 5022, 24279, 21, 17865591,28085),
    ('Turkey', 15072747, 0, 98965, 0, 14971256,0),
    ('Vietnam', 10762045, 806, 43081, 1, 9513981,9026),
    ('Japan', 8945784, 16130, 30752, 17, 8711289,24361),
    ('Iran', 7232790, 59, 141332, 1, 7056206,713),
    ('Indonesia', 6057142, 342, 156622, 7, 5897022,270),
    ('Malaysia', 4516319, 1330, 35690, 2, 4458999,1881),
    ('Thailand', 4468955, 2162, 30201, 27, 4409248,4879),
    ('Israel', 4154566, 2580, 10864, 0, 4124933,0)
    ";
    if (mysqli_query($koneksi,$sql)) {
        echo "done";
    }else{
        echo mysqli_error($koneksi);
    }
?>