@extends ('layouts/master')
{{HTML::style(asset('css/gamecss.css'))}}
@section ('content')
<?php
    $system = array('ps4'); /*a variable made for outputting to the Blogs table*/
    Session::put('syst','ps4');
    $users = Session::get('userdata',NULL);
?>
<body id='ps4'>
<div id='title'>
    This is the Playstation 4 forum. Please keep posts on-topic.
</div>

<?php/* the text box takes the new blog entry and on post it being hit the post is added to the table Blogs*/?>
<div id='wrap'>
    <div id='postbox'>
        <p>Write your post here!</p> 
        {{Form::open(array('url' => 'blog'))}}
            {{Form::textarea('post')}}
        <p>{{Form::submit('Post It!')}}<p>
        {{Form::close()}}
    </div>

    <div id='posts'>
    <?php /*to output the blog entrys the funtion gets all entrys with system = ps4 and prints them out with newest first*/
        $users = DB::select('select * from Blogs where system = ?',$system);
        for($x = count($users); $x > 0; $x--):
            $post = $users[$x-1];
    ?>
        <p><?= $post->Entry?></p>
        <p>Authored by <?= $post->Name?><p>
        <p>------------------------------------------------------<p>
    <?php
        endfor;
    ?>
    </div>
</div>
</body>      
@stop
