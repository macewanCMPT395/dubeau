<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Simple CRUD App</title>
{{HTML::style(asset('css/styles.css'))}}
</head>
<body>
<h1>Simple CRUD App</h1>
<hr />
<div id="tabs">
  <ul>
    <li><a href="/"><span>Login/Logout</span></a></li>
    <li><a href="edit"><span>Edit Profile</span></a></li>
    <li><a href="others"><span>Other Users</span></a></li>
    <li><a href="about"><span>About</span></a></li>
  </ul>
</div>
@yield('content')
</body>
</html>
