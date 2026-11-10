# Mo Soluciones Web — Sitio institucional

Sitio en PHP 8.4+ (probado con PHP 8.5) con arquitectura MVC propia, sin frameworks ni dependencias.
HTML, CSS y JavaScript puros.

## Páginas

| Ruta                  | Contenido                                   |
|-----------------------|---------------------------------------------|
| `/`                   | Inicio: hero, servicios, proyectos, proceso |
| `/servicios`          | Detalle de los 6 servicios                  |
| `/portfolio`          | Proyectos con filtros por categoría         |
| `/portfolio/{slug}`   | Detalle de cada proyecto                    |
| `/nosotros`           | Presentación, valores y tecnologías         |
| `/contacto`           | Formulario + WhatsApp, email, horario       |
| `/contacto/gracias`   | Confirmación de envío                       |

## Estructura

```
app/
  Core/          Router, Controller base, View, Session (CSRF), App (config)
  Controllers/   Un controlador por sección
  Models/        Service, Project, Category, ContactMessage
  Views/
    layouts/     Plantilla general (head, header, footer)
    partials/    Header, footer, CTA, tarjetas, íconos
    pages/       Una vista por página
  helpers.php    e(), url(), asset(), config(), icon()…
config/
  config.php     Datos de la empresa, contacto, redes y email  ← EDITAR
  routes.php     Rutas del sitio
public/          Raíz pública (index.php, assets)
storage/messages Copia en JSON de cada consulta recibida
```

## Correr en local

```bash
php -S localhost:8000 -t public server.php
```

Abrí http://localhost:8000

## Personalizar

- **Datos de contacto, WhatsApp, redes y email:** `config/config.php`
- **Servicios:** `app/Models/Service.php`
- **Proyectos del portfolio:** `app/Models/Project.php`.
  Capturas en `public/assets/img/portfolio/` (1200×750) y logos en `public/assets/img/clients/`.
  `logoBg` define el color de fondo de la tarjeta del logo (útil para logos blancos).
- **Textos de Nosotros (incluye las cifras):** `app/Views/pages/about.php`
- **Colores:** variables al inicio de `public/assets/css/style.css`

## Publicar en un hosting

1. Subí todos los archivos.
2. Ideal: apuntá el dominio a la carpeta `public/`.
   Si el hosting no lo permite, el `.htaccess` de la raíz redirige todo a `public/` y bloquea `app/`, `config/` y `storage/`.
3. Verificá que `storage/messages/` tenga permisos de escritura.
4. En `config/config.php` poné la URL real y las casillas de email de tu dominio.
5. Descomentá el bloque "Forzar HTTPS" en `public/.htaccess`.

## Formulario de contacto

- Validación en el navegador (JS) y en el servidor (PHP).
- Protección CSRF, campo trampa anti-bots, tiempo mínimo de llenado y límite de un envío cada 30 s.
- Cada consulta se guarda en `storage/messages/*.json` y se envía por email con `mail()`.
  Si tu hosting no envía correos con `mail()`, los mensajes igual quedan guardados.
