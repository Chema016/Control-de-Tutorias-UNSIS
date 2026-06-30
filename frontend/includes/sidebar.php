<?php
require_once __DIR__ . '/../../backend/config/config.php';
require_once __DIR__ . '/../../backend/includes/auth.php';
$role   = current_role();
$active = $active ?? '';
?>
<div class="sidebar">
  <div class="brand">
    <div class="brand-title">Control de Tutorías</div>
    <div class="brand-sub">UNSIS</div>
  </div>
  <nav>
    <?php if ($role === 'admin'): ?>
      <a href="/frontend/admin/dashboard.php"  class="<?= $active === 'dashboard'  ? 'active' : '' ?>">📊 Resumen general</a>
      <a href="/frontend/admin/profesores.php" class="<?= $active === 'profesores' ? 'active' : '' ?>">👩‍🏫 Profesores / Tutores</a>
      <a href="/frontend/admin/alumnos.php"    class="<?= $active === 'alumnos'    ? 'active' : '' ?>">🎓 Alumnos</a>
    <?php else: ?>
      <a href="/frontend/tutor/dashboard.php"    class="<?= $active === 'dashboard'    ? 'active' : '' ?>">📊 Resumen</a>
      <a href="/frontend/tutor/agenda.php"       class="<?= $active === 'agenda'       ? 'active' : '' ?>">📅 Agenda de citas</a>
      <a href="/frontend/tutor/bitacora.php"     class="<?= $active === 'bitacora'     ? 'active' : '' ?>">📝 Bitácora de sesiones</a>
      <a href="/frontend/tutor/canalizacion.php" class="<?= $active === 'canalizacion' ? 'active' : '' ?>">🔗 Canalizaciones</a>
      <a href="/frontend/tutor/alertas.php"      class="<?= $active === 'alertas'      ? 'active' : '' ?>">🚨 Alertas de riesgo</a>
    <?php endif; ?>
  </nav>
  <div class="logout-box">
    <div class="who">👤 <?= htmlspecialchars($_SESSION['user_name'] ?? '') ?></div>
    <button class="btn btn-secundario btn-block" style="font-size:.76rem;" onclick="cerrarSesion()">Cerrar sesión</button>
  </div>
</div>
<script>
async function cerrarSesion() {
  await fetch('/backend/api/logout.php', { method: 'POST' });
  window.location.href = '/index.php';
}
</script>
