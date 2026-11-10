<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Preguntas frecuentes. Se muestran en el inicio y en contacto,
 * y se publican como datos estructurados (FAQPage) para Google.
 */
final class Faq
{
    /** @return list<array{q: string, a: string}> */
    public static function all(): array
    {
        return [
            [
                'q' => '¿Tengo que contratar el hosting o el dominio?',
                'a' => 'No. Nos encargamos de registrar tu dominio, contratar y configurar el hosting, instalar el certificado de seguridad (SSL) y crear tus emails. Si ya tenés dominio o hosting, también nos ocupamos de migrarlo.',
            ],
            [
                'q' => '¿Cuánto tarda en estar lista mi web?',
                'a' => 'Trabajamos en días, no en meses. El plazo depende del tamaño del proyecto, y en el presupuesto te damos una fecha de entrega concreta.',
            ],
            [
                'q' => '¿Cuánto tardan en pasarme un presupuesto?',
                'a' => 'Menos de 24 horas hábiles. Con una charla corta o un mensaje por WhatsApp contándonos qué necesitás alcanza.',
            ],
            [
                'q' => '¿Necesito saber algo técnico?',
                'a' => 'Nada. Vos nos contás qué necesitás, aprobás el presupuesto y revisás los avances. Todo lo técnico corre por nuestra cuenta.',
            ],
            [
                'q' => '¿Puedo tener emails con el nombre de mi empresa?',
                'a' => 'Sí. Creamos tus casillas del tipo nombre@tuempresa.com y te ayudamos a configurarlas en tu celular y tu computadora.',
            ],
            [
                'q' => '¿Qué pasa después de la entrega?',
                'a' => 'Seguimos estando. Nos ocupamos de las renovaciones, los backups, las actualizaciones de seguridad y los cambios que necesites.',
            ],
        ];
    }
}
