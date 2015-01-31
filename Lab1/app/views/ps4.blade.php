@extends ('layouts/master')
{{HTML::style(asset('css/gamecss.css'))}}
@section ('content')
<?php
    $system = array('ps4');
    Session::put('syst','ps4');
    $users = Session::get('userdata',NULL);
?>
<body id='ps4'>
<div id='title'>
    This is the Playstation 4 forum. Please keep posts on-topic.
</div>

<div id='wrap'>
    <div id='postbox'>
        <p>Write your post here!</p>
        {{Form::open(array('url' => 'blog'))}}
            {{Form::textarea('post')}}
        <p>{{Form::submit('Post It!')}}<p>
        {{Form::close()}}
    </div>

    <div id='posts'>
    <?php
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
