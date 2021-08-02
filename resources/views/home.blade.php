<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	@auth
		<form method="POST" action="{{ route('logout') }}">
        @csrf
		<a  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
        </form>
		{{ Auth::user()->name }}
	@endauth

	@guest
		<a href="{{route('login')}}">Login</a>
		<a href="{{route('register')}}">Register</a>
	@endguest
</body>
</html>