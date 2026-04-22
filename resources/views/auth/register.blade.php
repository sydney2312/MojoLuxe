<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MojoLux — Register</title>

<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<style>
:root {
  --ink:#1A1714;
  --ink-soft:#5C5650;
  --gold:#B8963E;
  --gold-warm:#D4AF6A;
  --paper:#FAF7F2;
  --rule:#E8E0D4;
  --white:#FFFFFF;
  --error:#a94442;
}

* {
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body {
  font-family:'DM Sans', sans-serif;
  background:var(--paper);
  height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  color:var(--ink);
}

body::before {
  content:"";
  position:absolute;
  width:600px;
  height:600px;
  background:radial-gradient(circle, rgba(184,150,62,0.10), transparent 60%);
  top:-200px;
  left:-200px;
  filter:blur(40px);
}

body::after {
  content:"";
  position:absolute;
  width:500px;
  height:500px;
  background:radial-gradient(circle, rgba(0,0,0,0.04), transparent 70%);
  bottom:-200px;
  right:-200px;
  filter:blur(50px);
}

.card {
  width:440px;
  background:var(--white);
  border:1px solid var(--rule);
  border-radius:16px;
  padding:40px;
  box-shadow:0 25px 60px rgba(26,23,20,0.08);
  position:relative;
  z-index:2;
}

.brand {
  text-align:center;
  margin-bottom:28px;
}

.brand h1 {
  font-family:'DM Serif Display', serif;
  font-size:34px;
}

.brand p {
  font-size:11px;
  letter-spacing:2px;
  text-transform:uppercase;
  color:var(--gold);
  margin-top:6px;
}

label {
  font-size:11px;
  text-transform:uppercase;
  letter-spacing:1.5px;
  color:var(--ink-soft);
  display:block;
  margin-bottom:6px;
}

input {
  width:100%;
  padding:12px 14px;
  margin-bottom:6px;
  border-radius:10px;
  border:1px solid var(--rule);
  background:var(--paper);
  font-size:14px;
  outline:none;
  transition:.2s;
}

input:focus {
  border-color:var(--gold);
  box-shadow:0 0 0 3px rgba(184,150,62,0.12);
}

.error {
  font-size:12px;
  color:var(--error);
  margin-bottom:10px;
}

.error-box {
  background:#fff4f4;
  border:1px solid #f1c0c0;
  padding:10px;
  border-radius:8px;
  margin-bottom:15px;
}

.btn {
  width:100%;
  padding:12px;
  border:none;
  border-radius:10px;
  background:var(--ink);
  color:var(--white);
  font-weight:500;
  letter-spacing:1px;
  cursor:pointer;
  transition:.25s;
  margin-top:10px;
}

.btn:hover {
  background:var(--gold);
  color:var(--ink);
  transform:translateY(-2px);
}

.login-link {
  text-align:center;
  margin-top:16px;
  font-size:12px;
}

.login-link a {
  color:var(--gold);
  text-decoration:none;
}

.login-link a:hover {
  text-decoration:underline;
}
</style>
</head>

<body>

<div class="card">

  <div class="brand">
    <h1>MojoLux</h1>
    <p>Create Your Account</p>
  </div>

  <!-- Global Errors -->
  @if ($errors->any())
    <div class="error-box">
      @foreach ($errors->all() as $error)
        <div class="error">{{ $error }}</div>
      @endforeach
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}" required>
    @error('name')
      <div class="error">{{ $message }}</div>
    @enderror

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    @error('email')
      <div class="error">
        @if($message == 'The email has already been taken.')
          Account already exists.
        @else
          {{ $message }}
        @endif
      </div>
    @enderror

    <label>Password</label>
    <input type="password" name="password" required>
    @error('password')
      <div class="error">{{ $message }}</div>
    @enderror

    <label>Confirm Password</label>
    <input type="password" name="password_confirmation" required>
    @error('password_confirmation')
      <div class="error">{{ $message }}</div>
    @enderror

    <button class="btn" type="submit">Create Account</button>
  </form>

  <div class="login-link">
    Already have an account?
    <a href="{{ route('login') }}">Sign in</a>
  </div>

</div>

</body>
</html>
