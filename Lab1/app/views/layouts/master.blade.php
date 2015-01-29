<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Games Forum</title>
{{HTML::style(asset('css/styles.css'))}}
</head>
<body>
<h1>Games Forum</h1>
<hr />
<div id="tabs">
  <ul>
    <li><a href="/"><span>Login</span></a></li>
    <li><a href="/"><span>Logout</span></a></li>
    <li><a href="edit"><span>Edit Profile</span></a></li>
    <li><a href="about"><span>About</span></a></li>
    <li><a href="wiiu"><span>Wii U</span></a></li>
    <li><a href="ps4"><span>Playstation 4</span></a></li>
    <li><a href="xbox1"><span>Xbox One</span></a></li>
  </ul>
</div>
@yield('content')
</body>
</html>
