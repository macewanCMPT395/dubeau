@extends ('layouts/master')
{{HTML::style(asset('css/gamecss.css'))}}
@section ('content')
<div id='title'>
        This is the Wii U forum. Please keep posts on-topic.
</div>
    
<div id='wrap'>
    
    <div id='postbox'>
        <p>Write your post here!</p>
        {{Form::open()}}
            {{Form::textarea('post')}}
        {{Form::close()}}
        {{Form::submit('Post It!')}}
    </div>

    <div id='posts'>
        <p>Connect to the databse for the posts here.</p>
    </div>
</div>
            
@stop