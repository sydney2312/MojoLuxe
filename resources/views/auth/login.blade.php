<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MojoLux — Login</title>

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

* { margin:0; padding:0; box-sizing:border-box; }

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
  background:radial-gradient(circle, rgba(184,150,62,0.12), transparent 60%);
  top:-200px; left:-200px;
  filter:blur(40px);
}

body::after {
  content:"";
  position:absolute;
  width:500px;
  height:500px;
  background:radial-gradient(circle, rgba(0,0,0,0.04), transparent 70%);
  bottom:-200px; right:-200px;
  filter:blur(50px);
}

.login-card {
  width:420px;
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
  margin-bottom:30px;
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

/* error styling */
.error {
  font-size:12px;
  color:var(--error);
  margin-bottom:10px;
}

/* top error box */
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

.extra {
  text-align:center;
  margin-top:14px;
  font-size:12px;
}

.extra a {
  color:var(--gold);
  text-decoration:none;
}

.extra a:hover {
  text-decoration:underline;
}

.register-box {
  margin-top:14px;
  text-align:center;
}

.register-box a {
  display:inline-block;
  margin-top:8px;
  padding:10px 14px;
  border:1px solid var(--gold);
  border-radius:10px;
  color:var(--gold);
  text-decoration:none;
  font-size:12px;
  letter-spacing:1px;
  transition:.2s;
}

.register-box a:hover {
  background:var(--gold);
  color:var(--ink);
}
</style>
</head>

<body>

<div class="login-card">

  <div class="brand">
    <h1>MojoLux</h1>
    <p>Luxury Dogwear Experience</p>
  </div>

  <!-- Global Login Error -->
  @if ($errors->any())
    <div class="error-box">
      <div class="error">
        Invalid email or password.
      </div>
    </div>
  @endif

  <!-- Session Error  -->
  @if(session('error'))
    <div class="error-box">
      <div class="error">{{ session('error') }}</div>
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    @error('email')
      <div class="error">{{ $message }}</div>
    @enderror

    <label>Password</label>
    <input type="password" name="password" required>
    @error('password')
      <div class="error">{{ $message }}</div>
    @enderror

    <button class="btn" type="submit">Sign In</button>
  </form>

  <div class="extra">
    @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">Forgot password?</a>
    @endif
  </div>

  <div class="register-box">
    <div style="font-size:12px; color:var(--ink-soft);">
      New to MojoLux?
    </div>

    @if (Route::has('register'))
      <a href="{{ route('register') }}">Create Account</a>
    @endif
  </div>

</div>

</body>
</html>
