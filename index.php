<?php
require_once __DIR__ . '/backend/config/config.php';
require_once __DIR__ . '/backend/includes/auth.php';

if (is_logged_in()) {
    header('Location: ' . (current_role() === 'admin' ? '/frontend/admin/dashboard.php' : '/frontend/tutor/dashboard.php'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control de Tutorías UNSIS – Acceso</title>
  <link rel="stylesheet" href="/frontend/assets/css/style.css">
</head>
<body>
<div class="login-wrap">
  <div class="login-izq">
  <div class="login-marca">
    <img src="/frontend/assets/img/logo_unsis.png" 
         alt="Logo UNSIS" 
         class="login-logo">
    <div class="login-marca-titulo">Control de Tutorías UNSIS</div>
    <div class="login-marca-sub">Universidad de la Sierra Sur · Oaxaca</div>
  </div>
</div>

  <div class="login-der">
    <div class="login-card">
      <div class="login-divider"></div>
      <h1>Iniciar sesión</h1>
      <p class="login-inst">UNSIS · Sistema de Tutorías</p>
      <p class="subtitle">Ingresa con tu correo institucional</p>

      <div id="loginMsg" class="alert-msg error" style="display:none;"></div>

      <form id="loginForm">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" required autocomplete="username" placeholder="tu@correo.com">

        <label for="password">Contraseña</label>
        <input type="password" id="password" required autocomplete="current-password" placeholder="••••••••">

        <button type="submit" id="loginBtn" class="btn btn-block" style="margin-top:20px;">
          Iniciar sesión
        </button>
      </form>
    </div>
  </div>
</div>

<script src="/frontend/assets/js/common.js"></script>
<script src="/frontend/assets/js/login.js"></script>
</body>
</html>
