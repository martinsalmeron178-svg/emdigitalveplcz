<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "emdigitalve_db";

$conn = @new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    $conn = null; // Permite que la página siga cargando aunque falle la BD
} else {
    $conn->set_charset("utf8mb4");
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);

    // Validacion directa o contra base de datos (puedes ajustar el usuario y clave admin aquí)
    if ($usuario === 'admin' && $clave === 'emdigitalve2026') {
        $_SESSION['admin_logueado'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Acceso denegado: Credenciales incorrectas.";
    }
}
?>
<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMDIGITALVE | Acceso Restringido</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800;900&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        obsidian: '#050508',
                        neonOrange: '#FF5722',
                        silverTech: '#C0C0C0',
                        darkCard: '#0E1117',
                        cardBorder: '#1F2430'
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        cyber: ['"Orbitron"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .bg-grid-tech {
            background-image: radial-gradient(rgba(255, 87, 34, 0.15) 1px, transparent 1px);
            background-size: 28px 28px;
        }
        .cyber-shadow {
            box-shadow: 0 0 30px rgba(255, 87, 34, 0.25);
        }
    </style>
</head>
<body class="bg-obsidian text-white font-sans min-h-screen bg-grid-tech flex items-center justify-center selection:bg-neonOrange selection:text-white px-6">

    <div class="max-w-md w-full bg-darkCard border border-neonOrange/50 p-8 rounded-2xl cyber-shadow relative">
        
        <!-- Logo Monograma -->
        <div class="text-center mb-8">
            <div class="text-3xl font-black font-cyber tracking-widest inline-flex items-center mb-2">
                <span class="text-neonOrange drop-shadow-[0_0_10px_#FF5722]">{</span>
                <span class="text-silverTech">E</span>
                <span class="text-white">M</span>
                <span class="text-neonOrange drop-shadow-[0_0_10px_#FF5722]">}</span>
            </div>
            <h1 class="text-lg font-cyber font-bold text-white uppercase tracking-wider">PANEL DE CONTROL</h1>
            <p class="text-xs text-silverTech mt-1">Área restringida solo para administradores autorizados.</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="mb-4 bg-red-950/50 border border-red-600 text-red-300 text-xs p-3 rounded text-center font-semibold">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="space-y-5">
            <div>
                <label class="block text-[10px] font-cyber text-silverTech uppercase mb-1.5">USUARIO</label>
                <input type="text" name="usuario" placeholder="Ingresa tu usuario" class="w-full bg-obsidian border border-gray-800 rounded-lg p-3 text-xs text-white focus:outline-none focus:border-neonOrange transition" required>
            </div>
            <div>
                <label class="block text-[10px] font-cyber text-silverTech uppercase mb-1.5">CONTRASEÑA</label>
                <input type="password" name="clave" placeholder="••••••••••••" class="w-full bg-obsidian border border-gray-800 rounded-lg p-3 text-xs text-white focus:outline-none focus:border-neonOrange transition" required>
            </div>
            <button type="submit" class="w-full bg-neonOrange hover:bg-orange-600 text-white font-cyber font-bold text-xs py-3.5 rounded-lg transition shadow-[0_0_20px_rgba(255,87,34,0.4)] uppercase tracking-wider">
                ACCEDER AL SISTEMA ⚡
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="index.php" class="text-xs text-silverTech hover:text-neonOrange font-cyber transition">&larr; Volver al Inicio</a>
        </div>
    </div>

</body>
</html>