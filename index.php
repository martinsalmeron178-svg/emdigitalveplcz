<?php
// Conexion a base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "emdigitalve_db";

$conn = @new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    $conn = null; // Evita que explote la página si no hay base de datos
} else {
    $conn->set_charset("utf8mb4");
}

$whatsapp_numero = '584223770933';
$instagram_usuario = 'em.digital.be';

// Cargar demos desde BD
$demosQuery = $conn->query("SELECT * FROM demos ORDER BY creado_el DESC");
?>
<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMDIGITALVE | Desarrollo Web & Soluciones Digitales</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800;900&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
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
        .hover-neon-orange {
            transition: all 0.3s ease-in-out;
        }
        .hover-neon-orange:hover {
            border-color: #FF5722 !important;
            box-shadow: 0 0 25px rgba(255, 87, 34, 0.4);
            transform: translateY(-5px);
        }
        .hover-neon-silver {
            transition: all 0.3s ease-in-out;
        }
        .hover-neon-silver:hover {
            border-color: #C0C0C0 !important;
            box-shadow: 0 0 25px rgba(192, 192, 192, 0.3);
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-obsidian text-white font-sans min-h-screen bg-grid-tech selection:bg-neonOrange selection:text-white">

    <!-- Header / Navbar Principal -->
    <header class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center border-b border-gray-800/80 sticky top-0 z-50 bg-obsidian/90 backdrop-blur-md">
        
        <!-- Logo Monograma EMDIGITALVE -->
        <div class="flex items-center gap-2">
            <div class="text-2xl font-black font-cyber tracking-widest flex items-center">
                <span class="text-neonOrange drop-shadow-[0_0_10px_#FF5722]">{</span>
                <span class="text-silverTech">E</span>
                <span class="text-white">M</span>
                <span class="text-neonOrange drop-shadow-[0_0_10px_#FF5722]">}</span>
            </div>
            <div class="leading-none border-l border-gray-700 pl-2">
                <span class="block text-xs font-black tracking-widest text-white uppercase">EMDIGITALVE</span>
                <span class="text-[9px] text-neonOrange font-semibold tracking-wider">WEB DEVELOPER</span>
            </div>
        </div>

        <!-- Menú de Navegación -->
        <nav class="hidden md:flex items-center gap-6 text-xs font-semibold text-silverTech">
            <a href="#inicio" class="hover:text-neonOrange transition">Inicio</a>
            <a href="#demos" class="hover:text-neonOrange transition">Demos</a>
            <a href="#servicios" class="hover:text-neonOrange transition">Servicios</a>
            <a href="#planes" class="hover:text-neonOrange transition">Planes</a>
            <a href="#contacto" class="hover:text-neonOrange transition">Contacto</a>
        </nav>

        <!-- Botón Admin Seguro (Pide clave al hacer clic) -->
        <div class="flex items-center gap-3">
            <a href="login.php" class="border border-neonOrange text-neonOrange hover:bg-neonOrange hover:text-white px-3.5 py-1.5 rounded-md text-xs font-cyber font-bold transition shadow-[0_0_10px_rgba(255,87,34,0.2)]">
                + AGREGAR DEMO
            </a>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section id="inicio" class="max-w-5xl mx-auto text-center py-16 px-6 relative">
        
        <!-- Píldora Cobertura Territorial -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-neonOrange/40 bg-darkCard text-xs font-semibold text-silverTech mb-8 shadow-[0_0_15px_rgba(255,87,34,0.15)]">
            <span class="w-2 h-2 rounded-full bg-neonOrange animate-pulse"></span>
            Cobertura Norte Anzoátegui: <span class="text-white font-bold">Barcelona</span> • <span class="text-white font-bold">Puerto La Cruz</span> • <span class="text-neonOrange font-bold">Lechería</span> • <span class="text-white font-bold">Guanta</span>
        </div>

        <!-- Título Principal -->
        <h1 class="text-4xl md:text-6xl font-black text-white font-cyber uppercase tracking-tight leading-tight mb-6">
            DESARROLLO WEB <br>
            <span class="text-neonOrange drop-shadow-[0_0_20px_rgba(255,87,34,0.5)]">& SOLUCIONES DIGITALES</span>
        </h1>

        <p class="text-silverTech text-sm md:text-base max-w-2xl mx-auto mb-10 font-normal">
            Desarrollo de páginas web profesionales, sistemas a la medida y catálogos digitales para potenciar negocios locales y emprendimientos.
        </p>

        <!-- Botones de Acción directos -->
        <div class="flex flex-wrap justify-center gap-4">
            <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=Hola%20EMDIGITALVE,%20quiero%20cotizar%20un%20proyecto" target="_blank" 
               class="bg-neonOrange hover:bg-orange-600 text-white font-cyber font-bold py-3 px-6 rounded-md text-xs tracking-wider uppercase transition shadow-[0_0_20px_rgba(255,87,34,0.4)]">
               WHATSAPP DIRECTO
            </a>
            <a href="https://instagram.com/<?php echo $instagram_usuario; ?>" target="_blank" 
               class="border border-neonOrange text-neonOrange hover:bg-neonOrange hover:text-white font-cyber font-bold py-3 px-6 rounded-md text-xs tracking-wider uppercase transition shadow-[0_0_15px_rgba(255,87,34,0.2)]">
               INSTAGRAM
            </a>
            <a href="#demos" 
               class="border border-gray-700 hover:border-silverTech text-silverTech hover:text-white font-cyber font-bold py-3 px-6 rounded-md text-xs tracking-wider uppercase transition">
               Ver Demos ↗
            </a>
        </div>
    </section>

    <!-- SECCIÓN SERVICIOS -->
    <section id="servicios" class="max-w-6xl mx-auto px-6 py-16 border-t border-gray-800/60">
        <div class="text-center mb-12">
            <span class="text-neonOrange text-xs font-cyber tracking-widest font-bold uppercase">// SOLUCIONES DIGITALES</span>
            <h2 class="text-3xl font-black text-white font-cyber uppercase tracking-wider mt-1">NUESTROS SERVICIOS</h2>
            <p class="text-silverTech text-xs mt-2">Construcción y optimización digital enfocada en resultados comerciales.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-darkCard border border-cardBorder p-6 rounded-xl hover-neon-silver">
                <div class="text-neonOrange text-2xl font-cyber mb-4">&lt;/&gt;</div>
                <h3 class="text-lg font-bold text-white font-cyber mb-2">Desarrollo Web a Medida</h3>
                <p class="text-silverTech text-xs leading-relaxed">Sitios web creados desde cero, con código limpio, líneas modernas y carga ultra rápida.</p>
            </div>
            <div class="bg-darkCard border border-cardBorder p-6 rounded-xl hover-neon-orange">
                <div class="text-neonOrange text-2xl font-cyber mb-4">⚡</div>
                <h3 class="text-lg font-bold text-white font-cyber mb-2">Catálogos y Repuestos</h3>
                <p class="text-silverTech text-xs leading-relaxed">Sistemas ideales para tiendas físicas, ventas de repuestos o servicios con integración a WhatsApp.</p>
            </div>
            <div class="bg-darkCard border border-cardBorder p-6 rounded-xl hover-neon-silver">
                <div class="text-neonOrange text-2xl font-cyber mb-4">🛡️</div>
                <h3 class="text-lg font-bold text-white font-cyber mb-2">Sistemas Administrativos</h3>
                <p class="text-silverTech text-xs leading-relaxed">Paneles de control locales para gestión de inventarios, clientes e información del negocio.</p>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DEMOS EN VIVO -->
    <section id="demos" class="max-w-6xl mx-auto px-6 py-16 border-t border-gray-800/60">
        <div class="text-center mb-12">
            <span class="text-neonOrange text-xs font-cyber tracking-widest font-bold uppercase">// PROYECTOS DESTACADOS</span>
            <h2 class="text-3xl font-black text-white font-cyber uppercase tracking-wider mt-1">DEMOS EN VIVO</h2>
            <p class="text-silverTech text-xs mt-2">Explora soluciones reales diseñadas para potenciar ventas y presencia digital.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if ($demosQuery && $demosQuery->num_rows > 0): ?>
                <?php while($demo = $demosQuery->fetch_assoc()): ?>
                    <div class="bg-darkCard border border-cardBorder rounded-xl overflow-hidden hover-neon-orange flex flex-col justify-between">
                        <?php if(!empty($demo['imagen_url'])): ?>
                            <img src="<?php echo $demo['imagen_url']; ?>" alt="<?php echo $demo['titulo']; ?>" class="w-full h-44 object-cover">
                        <?php endif; ?>
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-base font-bold text-white font-cyber mb-2"><?php echo $demo['titulo']; ?></h3>
                                <p class="text-silverTech text-xs mb-4"><?php echo $demo['descripcion']; ?></p>
                            </div>
                            <?php if(!empty($demo['demo_url'])): ?>
                                <a href="<?php echo $demo['demo_url']; ?>" target="_blank" class="block text-center bg-obsidian border border-gray-700 hover:border-neonOrange text-white text-xs py-2 rounded font-cyber transition">
                                    Ver Demo en Vivo ↗
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-span-full text-center text-gray-500 py-12 border border-dashed border-gray-800 rounded-xl text-xs font-cyber">
                    No hay demos subidos todavía. Sube el primero desde el panel de Admin.
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- SECCIÓN TARIFAS Y SERVICIOS -->
    <section id="planes" class="max-w-6xl mx-auto px-6 py-16 border-t border-gray-800/60">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-black text-white font-cyber uppercase tracking-wider">TARIFAS Y SERVICIOS</h2>
            <p class="text-silverTech text-xs mt-2">Opciones claras y adaptadas al alcance de tu negocio o emprendimiento.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
            
            <!-- Plan 1: Landing Emprendedor ($80 - $120) -->
            <div class="bg-darkCard border border-cardBorder p-6 rounded-xl hover-neon-silver flex flex-col justify-between relative">
                <div class="absolute -top-3 left-4 bg-gray-800 text-silverTech text-[10px] font-cyber px-3 py-0.5 rounded-full border border-gray-700 uppercase">
                    INICIAL
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white font-cyber mt-2 mb-1">Landing Emprendedor</h3>
                    <div class="text-2xl font-black text-white font-cyber my-3">$80 - $120 <span class="text-[11px] text-silverTech font-normal font-sans">/pago único</span></div>
                    <p class="text-silverTech text-xs mb-6">Ideal para presencia rápida y directa en Google y redes sociales.</p>
                    <ul class="space-y-2.5 text-xs text-silverTech mb-8">
                        <li class="flex items-center gap-2">✓ Diseño Responsive (Móvil / PC)</li>
                        <li class="flex items-center gap-2">✓ Botones directos a WhatsApp</li>
                        <li class="flex items-center gap-2">✓ Ubicación Google Maps</li>
                        <li class="flex items-center gap-2">✓ Carga Ultra Rápida</li>
                    </ul>
                </div>
                <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=Hola,%20quiero%20el%20plan%20Landing%20Emprendedor" target="_blank" 
                   class="block text-center border border-gray-700 text-silverTech hover:border-silverTech hover:text-white py-2.5 rounded text-xs font-cyber font-bold transition">
                    CONSULTAR PLAN
                </a>
            </div>

            <!-- Plan 2: Catálogo / Negocios ($150 - $240) -->
            <div class="bg-darkCard border-2 border-neonOrange p-6 rounded-xl hover-neon-orange flex flex-col justify-between relative shadow-[0_0_20px_rgba(255,87,34,0.25)]">
                <div class="absolute -top-3.5 right-4 bg-neonOrange text-white text-[10px] font-cyber font-bold px-3 py-0.5 rounded-full uppercase shadow-[0_0_10px_#FF5722]">
                    MÁS POPULAR
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white font-cyber mt-2 mb-1">Catálogo / Negocios</h3>
                    <div class="text-2xl font-black text-neonOrange font-cyber my-3 drop-shadow-[0_0_10px_rgba(255,87,34,0.5)]">$150 - $240 <span class="text-[11px] text-silverTech font-normal font-sans">/pago único</span></div>
                    <p class="text-silverTech text-xs mb-6">Perfecto para ventas de repuestos, tiendas locales y servicios.</p>
                    <ul class="space-y-2.5 text-xs text-white mb-8 font-medium">
                        <li class="flex items-center gap-2">✓ Todo lo del plan inicial</li>
                        <li class="flex items-center gap-2 text-neonOrange font-bold">✓ Catálogo interactivo de productos</li>
                        <li class="flex items-center gap-2">✓ Buscador y filtros por categoría</li>
                        <li class="flex items-center gap-2">✓ Pedidos automáticos al WhatsApp</li>
                    </ul>
                </div>
                <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=Hola,%20quiero%20el%20plan%20Catalogo%20Negocios" target="_blank" 
                   class="block text-center bg-neonOrange hover:bg-orange-600 text-white py-2.5 rounded text-xs font-cyber font-bold transition shadow-[0_0_15px_rgba(255,87,34,0.4)]">
                    CONSULTAR PLAN
                </a>
            </div>

            <!-- Plan 3: Sistema a Medida ($300+) -->
            <div class="bg-darkCard border border-cardBorder p-6 rounded-xl hover-neon-silver flex flex-col justify-between relative">
                <div class="absolute -top-3 left-4 bg-gray-800 text-silverTech text-[10px] font-cyber px-3 py-0.5 rounded-full border border-gray-700 uppercase">
                    AVANZADO
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white font-cyber mt-2 mb-1">Sistema a Medida</h3>
                    <div class="text-2xl font-black text-white font-cyber my-3">$300+ <span class="text-[11px] text-silverTech font-normal font-sans">/según proyecto</span></div>
                    <p class="text-silverTech text-xs mb-6">Desarrollos complejos con paneles administrativos e inventario.</p>
                    <ul class="space-y-2.5 text-xs text-silverTech mb-8">
                        <li class="flex items-center gap-2">✓ Panel de Control / Dashboard</li>
                        <li class="flex items-center gap-2">✓ Gestión de datos local o en nube</li>
                        <li class="flex items-center gap-2">✓ Módulos personalizados</li>
                        <li class="flex items-center gap-2">✓ Soporte técnico directo</li>
                    </ul>
                </div>
                <a href="https://wa.me/<?php echo $whatsapp_numero; ?>?text=Hola,%20quiero%20cotizar%20un%20Sistema%20a%20Medida" target="_blank" 
                   class="block text-center border border-gray-700 text-silverTech hover:border-silverTech hover:text-white py-2.5 rounded text-xs font-cyber font-bold transition">
                    CONSULTAR PLAN
                </a>
            </div>

        </div>
    </section>

    <!-- SECCIÓN FORMULARIO DE CONTACTO DIRECTO -->
    <section id="contacto" class="max-w-3xl mx-auto px-6 py-16 border-t border-gray-800/60">
        <div class="text-center mb-8">
            <p class="text-silverTech text-xs font-semibold">¿Tienes un proyecto en mente o alguna pregunta? Escríbenos directamente.</p>
        </div>

        <form action="https://wa.me/<?php echo $whatsapp_numero; ?>" method="GET" target="_blank" class="bg-darkCard border border-cardBorder p-6 rounded-xl hover-neon-orange space-y-4">
            <div>
                <label class="block text-[10px] font-cyber text-silverTech uppercase mb-1">NOMBRE / EMPRESA</label>
                <input type="text" placeholder="Ej: Repuestos El Pana" class="w-full bg-obsidian border border-gray-800 rounded p-3 text-xs text-white focus:outline-none focus:border-neonOrange transition" required>
            </div>
            <div>
                <label class="block text-[10px] font-cyber text-silverTech uppercase mb-1">WHATSAPP O CORREO</label>
                <input type="text" placeholder="Ej: 0412-1234567" class="w-full bg-obsidian border border-gray-800 rounded p-3 text-xs text-white focus:outline-none focus:border-neonOrange transition" required>
            </div>
            <div>
                <label class="block text-[10px] font-cyber text-silverTech uppercase mb-1">MENSAJE / SUGERENCIA</label>
                <textarea rows="3" placeholder="Cuéntame sobre tu proyecto..." class="w-full bg-obsidian border border-gray-800 rounded p-3 text-xs text-white focus:outline-none focus:border-neonOrange transition" required></textarea>
            </div>
            <button type="submit" class="w-full bg-neonOrange hover:bg-orange-600 text-white font-cyber font-bold text-xs py-3 rounded transition shadow-[0_0_15px_rgba(255,87,34,0.3)] uppercase">
                ENVIAR MENSAJE POR WHATSAPP ⚡
            </button>
        </form>
    </section>

    <!-- FOOTER -->
    <footer class="text-center py-8 text-gray-500 border-t border-gray-900 text-[11px] font-cyber tracking-wider">
        &copy; <?php echo date('Y'); ?> EMDIGITALVE. Barcelona • Puerto La Cruz • Lechería • Guanta.
    </footer>

</body>
</html>