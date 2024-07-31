<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class-Object</title>
</head>
<body>
    <h1>Latihan</h1>
    <?php
    class post
    {
        // deklarasi properti global
        public $id;
        public $title;
        public $user_id;
        public $description;
    }
        // melakukan transform dari sebuah class ke sebuah objek
    $post = new post();

    // melakukan pemberian nilai
    $post->id = 1;
    $post->title = 'Batam';
    $post->user_id = 1234;
    $post->description = 'Pesat';

    $post2 = new post();
    $post2->id = 2;
    $post2->title = 'Bogor';
    $post2->user_id = 123;
    $post2->description = 'Sejuk';

    

    ?>
    <h1> Post 1 </h1>
    <p>id : <?php echo $post->id ?></P>
    <p>title : <?php echo $post->title ?></P>
    <p>user_id : <?php echo $post->user_id ?></P>
    <p>description : <?php echo $post->description ?></P>
   
    <h2> Post 2 </h2>
    <p>id : <?php echo $post2->id ?></P>
    <p>title : <?php echo $post2->title ?></P>
    <p>user_id : <?php echo $post2->user_id ?></P>
    <p>description : <?php echo $post2->description ?></P>
</body>
</html>