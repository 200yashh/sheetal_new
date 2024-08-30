<p>Hello, {{ $data['name'] }}</p>
<p>You are invited to get registered on our portal</p>
<p>Use this credentials to login in our portal, and fill your details.</p>
<p>Email : {{ $data['email'] }}</p>
<p>Password : {{ $data['password'] }}</p>
<br>
<a href="{{ route('agents.index') }}">Click Here</a>