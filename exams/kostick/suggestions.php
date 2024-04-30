<?php
include_once('scale.php');

/**
 * @var array $positive Array with positive suggestions.
 */
$positive = [];
/**
 * @var array $negative Array with negative suggestions. 
 */
$negative = [];

makeArray($count);
function makeArray($count){
    global $positive, $negative;
    $text = L($count);
    $text .= P($count);
    $text .= I($count);
    $text .= F($count);
    $text .= W($count);
    $text .= C($count);
    $text .= D($count);
    $text .= R($count);
    $text .= T($count);
    $text .= V($count);
    $text .= N($count);
    $text .= G($count);
    $text .= A($count);
    $text .= X($count);
    $text .= S($count);
    $text .= B($count);
    $text .= O($count);
    $text .= K($count);
    $text .= E($count);
    $text .= Z($count);

    $sug = explode(';', $text);
    for($i = 0; $i < 40; $i++){
        (($i + 1)%2 == 0) ? $negative[] = $sug[$i] : $positive[] = $sug[$i];
    }
    //echo count($sug);
}

function L($count){
    switch($count){
        case 0:
            $sug = "No es altamente competitivo. Puede 
            estar contento de permanecer como 
            trabajador y por lo tanto está hecho 
            para un trabajo en el que no haya 
            expectaciones por el liderazgo;";
            $sug .= "Tiene un complejo en función del 
            liderazgo. No se ve a sí mismo como un 
            líder. No es dominante;";
        break;
        case $count < 3:
            $sug = "No es altamente competitivo. Puede 
            estar contento de permanecer como 
            trabajador y por lo tanto está hecho 
            para un trabajo en el que no haya 
            expectaciones por el liderazgo;";
            $sug .= "Tiene un complejo en función del 
            liderazgo. No se ve a sí mismo como un 
            líder. No es dominante;";
        break;
        case $count > 6:
            $sug = "Tiene confianza, se apoya del 
            liderazgo. Se tiene confianza que no 
            compite con sus subordinados;";
            $sug .= "Le interesa más la imagen y el status 
            dentro del grupo en donde interactúa. 
            Con frecuencia es un individuo 
            ostentoso con exceso de confianza;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}

function P($count){
    switch($count){
        case 0:
            $sug = "No es del tipo que sabotea y controla 
            los esfuersos del líder. Es tolerante;";
            $sug .= "No toma de buen grado la 
            responsabilidad por otros y 
            posiblemente ni aún por sí mismo;";
        break;
        case $count < 3:
            $sug = "No es del tipo que sabotea y controla 
            los esfuersos del líder. Es tolerante;";
            $sug .= "No toma de buen grado la 
            responsabilidad por otros y 
            posiblemente ni aún por sí mismo;";
        break;
        case $count > 6:
            $sug = "Le gusta tomar responsabilidades. Con 
            frecuencia le gusta influenciar a todos 
            y a ayudarlos. Les agrada la función de 
            liderazgo;";
            $sug .= "Podemos sospechar que no confía en 
            que alguien dirija el “show”. Es muy 
            posesivo. Puede sabotear sutilmente 
            esfuerzos acaparando la autoridad;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function I($count){
    switch($count){
        case 0:
            $sug = "Es muy precavido, sumamente serio;";
            $sug .= "Tiene problemas en la toma de 
            decisiones, vacila demasiado;";
        break;
        case $count < 3:
            $sug = "Es muy precavido, sumamente serio;";
            $sug .= "Tiene problemas en la toma de 
            decisiones, vacila demasiado;";
        break;
        case $count > 6:
            $sug = "Es optimista, agresivo, entusiasta, 
            rápido en dar respuestas y presiona 
            PATRA acelerar la toma de decisiones;";
            $sug .= "Es una persona impulsiva que puede 
            convertirse en mentalmente sobreactivo 
            y toma decisiones apresuradas. Con 
            frecuencia se impacienta;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function F($count){
    switch($count){
        case 0:
            $sug = "No necesita ningún empuje de su jefe. 
            Es motivado por el trabajo, no por la 
            “palmada en la espalda” de su jefe;";
            $sug .= "Tiende a ser rebelde, está pronto a retar 
            a la autoridad y bajarla de pedestal;";
        break;
        case $count < 3:
            $sug = "No necesita ningún empuje de su jefe. 
            Es motivado por el trabajo, no por la 
            “palmada en la espalda” de su jefe;";
            $sug .= "Tiende a ser rebelde, está pronto a retar 
            a la autoridad y bajarla de pedestal;";
        break;
        case $count > 6:
            $sug = "Es una persona buena, leal, de 
            compañía. Es sensible a cómo se siente 
            la gente y tiene buenos conocimientos 
            en cuanto a lo que se dice y se siente;";
            $sug .= "No está preocupado en cuanto a 
            agradar a su jefe. Raras veces toma la 
            posición de estar fuertemente en contra 
            de una posición;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function W($count){
    switch($count){
        case 0:
            $sug = "Es autónomo. Esta dirigido hacia las 
            metas mas que orientado al trabajo. 
            Quiere saber qué debe hacerse, no 
            cómo debe hacerse;";
            $sug .= "Tiene dificultad en seguir las reglas 
            exactamente en la forma en que están 
            establecidas. Le gusta ir y venir a su 
            antojo;";
        break;
        case $count < 3:
            $sug = "Es autónomo. Esta dirigido hacia las 
            metas mas que orientado al trabajo. 
            Quiere saber qué debe hacerse, no 
            cómo debe hacerse;";
            $sug .= "Tiene dificultad en seguir las reglas 
            exactamente en la forma en que están 
            establecidas. Le gusta ir y venir a su 
            antojo;";
        break;
        case $count > 6:
            $sug = "Es una persona que tiene gran respeto 
            por las reglas. Puede seguir lo que se 
            le indica sin distorsionarlo;";
            $sug .= "No le agradan las reglas o tiene conflicto 
            con ellas. No es autónomo;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function C($count){
    switch($count){
        case 0:
            $sug = "Tolera la confusión. Es flexible en su 
            manera de pensar;";
            $sug .= "No se preocupa demasiado en cuanto al 
            orden y el sistema;";
        break;
        case $count < 3:
            $sug = "Tolera la confusión. Es flexible en su 
            manera de pensar;";
            $sug .= "No se preocupa demasiado en cuanto al 
            orden y el sistema;";
        break;
        case $count > 6:
            $sug = "Es una persona que estructura las 
            cosas y es agradable estar con ella 
            porque es pulcra, ordenada y 
            cuidadosa;";
            $sug .= "Tiende a ser muy terco y rígido. Puede 
            ser tan ordenado que llega al grado de 
            interferir con eficiencia;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function D($count){
    switch($count){
        case 0:
            $sug = "Puede ser un delegador y diferenciar 
            detalles importantes;";
            $sug .= "No disfruta los detalles y por lo tanto 
            puede tratar de evitarlos;";
        break;
        case $count < 3:
            $sug = "Puede ser un delegador y diferenciar 
            detalles importantes;";
            $sug .= "No disfruta los detalles y por lo tanto 
            puede tratar de evitarlos;";
        break;
        case $count > 6:
            $sug = "Encuentra gusto en trabajar con 
            detalles. Esta interesado y preocupado 
            acerca de la exactitud de las cosas;";
            $sug .= "Puede perderse en el detalle y mal 
            interpretar conceptos;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function R($count){
    switch($count){
        case 0:
            $sug = "Es una persona que hace las cosas más 
            que un planeador teórico. Tiende a ser 
            práctico;";
            $sug .= "No está interesado en la teoría. No 
            puede planear suficiente y organizar las 
            tareas;";
        break;
        case $count < 3:
            $sug = "Es una persona que hace las cosas más 
            que un planeador teórico. Tiende a ser 
            práctico;";
            $sug .= "No está interesado en la teoría. No 
            puede planear suficiente y organizar las 
            tareas;";
        break;
        case $count > 6:
            $sug = "Es un planeador a largo plazo. Esta 
            interesado en teoría y se refleja en su 
            actividad;";
            $sug .= "Es un soñador. Puede involucrarse tanto 
            en la teoría que puede no hacer mucho 
            en las situaciones prácticas y concretas;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function T($count){
    switch($count){
        case 0:
            $sug = "Esta persona es tranquila, no está 
            frustrada, sabe tomar las cosas como 
            son y raras veces se apresura;";
            $sug .= "Poco le importa el tiempo y el ritmo de 
            trabajo. Toma las cosas con mucha 
            facilidad a un ritmo que resulta 
            inconsistente;";
        break;
        case $count < 3:
            $sug = "Esta persona es tranquila, no está 
            frustrada, sabe tomar las cosas como 
            son y raras veces se apresura;";
            $sug .= "Poco le importa el tiempo y el ritmo de 
            trabajo. Toma las cosas con mucha 
            facilidad a un ritmo que resulta 
            inconsistente;";
        break;
        case $count > 6:
            $sug = "Trabaja aprisa y logra bastante. Está 
            preparado internamente para la alta 
            producción;";
            $sug .= "Tiene mucha visión interna y tiende a 
            ser neurótico. Puede andar apresurado 
            excesivamente. No pude lograr terminar 
            su trabajo de forma eficiente;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function V($count){
    switch($count){
        case 0:
            $sug = "Tiene capacidad para permanecer 
            sentado;";
            $sug .= "Si no ha estado enfermo recientemente 
            puede ser un neurótico cansado;";
        break;
        case $count < 3:
            $sug = "Tiene capacidad para permanecer 
            sentado;";
            $sug .= "Si no ha estado enfermo recientemente 
            puede ser un neurótico cansado;";
        break;
        case $count > 6:
            $sug = "Tiene mucha energía para actividades 
            físicas. Comúnmente es un individuo 
            agradable, que tiene mucha fuerza 
            física, probablemente trabaja con 
            herramientas, tiene una actividad 
            deportiva;";
            $sug .= "Puede tender a involucrarse 
            exageradamente en actividades físicas, 
            cuando debería estar concentrado en 
            alguna cosa. Puede tener dificultad para 
            permanecer sentado durante ocho horas 
            al día;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function N($count){
    switch($count){
        case 0:
            $sug = "Tiende a no terminar lo que empieza, 
            tiene poco compromiso de la tarea 
            encomendada. Posiblemente sea un 
            buen “auxiliar de trabajo” y puede 
            distraerse con facilidad;";
            $sug .= "Puede manejar muchos trabajos a la 
            vez. Al delegar, no involucra la 
            obtención de un ego de personalidad 
            en la tarea;";
        break;
        case $count < 3:
            $sug = "Tiende a no terminar lo que empieza, 
            tiene poco compromiso de la tarea 
            encomendada. Posiblemente sea un 
            buen “auxiliar de trabajo” y puede 
            distraerse con facilidad;";
            $sug .= "Puede manejar muchos trabajos a la 
            vez. Al delegar, no involucra la 
            obtención de un ego de personalidad 
            en la tarea;";
        break;
        case $count > 6:
            $sug = "La puntuación de N alta 
            representa el fuerte deseo del examinado 
            para terminar el trabajo. Es confiable 
            porque tiene un fuerte compromiso de 
            terminar el trabajo que empieza. Con 
            frecuencia prefiere un trabajo a la vez 
            que dejar u trabajo sin terminar ya que 
            le produce insatisfacción;";
            $sug .= "Tiene la mente en una sola dirección. 
            Tiene poca visión y tiende a ser obstindo 
            en sus convicciones. Ya sea eficiente o 
            no, tiene dificultad en deshacerse de lo 
            que esta haciendo. Con puntuación alta 
            (9), tiene el apremio de terminar lo que 
            inicia y puede repasar las posibles 
            salidas;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function G($count){
    switch($count){
        case 0:
            $sug = "Probablemente este motivado por 
            encontrar métodos para ahorrar tiempo 
            al hacer las cosas;";
            $sug .= "Lo último que quisiera hacer es 
            identificarse con el trabajo arduo;";
        break;
        case $count < 3:
            $sug = "Probablemente este motivado por 
            encontrar métodos para ahorrar tiempo 
            al hacer las cosas;";
            $sug .= "Lo último que quisiera hacer es 
            identificarse con el trabajo arduo;";
        break;
        case $count > 6:
            $sug = "Se identifica con el trabajo 
            arduo comúnmente aparece como un 
            trabajador intenso y dedicado;";
            $sug .= "Es un trabajador arduo e intenso, una 
            persona que desgraciadamente trabaja 
            por el hecho de trabajar. Puede estar 
            más intrigado con los procesos de 
            trabajo que con los resultados;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function A($count){
    switch($count){
        case 0:
            $sug = "Está contento y se distrae poco, a 
            menos que el empujen demasiado 
            fuerte. No siente impulso de avanzar;";
            $sug .= "No tiene iniciativa propia. Tiene poco 
            empuje y avance. Se acomoda a ser el 
            segundo mejor en términos de lo que 
            realmente es capaz de hacer;";
        break;
        case $count < 3:
            $sug = "Está contento y se distrae poco, a 
            menos que el empujen demasiado 
            fuerte. No siente impulso de avanzar;";
            $sug .= "No tiene iniciativa propia. Tiene poco 
            empuje y avance. Se acomoda a ser el 
            segundo mejor en términos de lo que 
            realmente es capaz de hacer;";
        break;
        case $count > 6:
            $sug = "Es una persona ambiciosa, tiene 
            iniciativa con gran necesidad de 
            obtener logros. Fija estándares altos 
            para sí mismo y para los demás, le 
            gusta el trabajo con retos y tiene 
            deseos de ser el mejor;";
            $sug .= "Tiende a estar descontento porque fija 
            niveles de altura que nunca puede 
            alcanzar. Puede irritara otras personas 
            con sus expectaciones que usualmente 
            no son altas. El supervisor puede 
            encontrar dificultad para satisfacerlo. 
            Desea reconocimientos, aumentos y 
            promociones;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function X($count){
    switch($count){
        case 0:
            $sug = "Puede tener una pequeña motivación a 
            representar un papel y a no ser 
            sincero. Es modesto;";
            $sug .= "Es tímido y no se vende a sí mismo;";
        break;
        case $count < 3:
            $sug = "Puede tener una pequeña motivación a 
            representar un papel y a no ser 
            sincero. Es modesto;";
            $sug .= "Es tímido y no se vende a sí mismo;";
        break;
        case $count > 6:
            $sug = "Tiene orgullo de sí mismo y de su 
            estilo. Puede ser efectivo en grupos 
            cuando no se muestre demasiado 
            exhibicionista;";
            $sug .= "Es un exhibicionista. Hace las cosas para 
            causar buena impresión, más que para 
            ser efectivo;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function S($count){
    switch($count){
        case 0:
            $sug = "Es un ganador, un trabajador que 
            dirige bien la energía;";
            $sug .= "A menudo no tiene tacto social. Es un 
            introvertido y se siente torpe 
            socialmente;";
        break;
        case $count < 3:
            $sug = "Es un ganador, un trabajador que 
            dirige bien la energía;";
            $sug .= "A menudo no tiene tacto social. Es un 
            introvertido y se siente torpe 
            socialmente;";
        break;
        case $count > 6:
            $sug = "Crea una buena atmósfera, buenas 
            relaciones sociales, se interesa por los 
            derechos de los demás y de sí mismo y 
            establece buenas comunicaciones;";
            $sug .= "Puede estar preocupado por los 
            aspectos sociales. Puede empelar 
            bastante tiempo en las amenidades 
            sociales en lugar de hacer un trabajo 
            bien o resolver un conflicto;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function B($count){
    switch($count){
        case 0:
            $sug = "Puede hacer frente a un grupo y 
            pensar independientemente de él. La 
            presión que el grupo ejerce no le 
            convence con facilidad. Deben 
            presentársele argumentos de peso;";
            $sug .= "Es básicamente un lobo solitario. No es 
            sensitivo a las actividades y sentimientos 
            del grupo;";
        break;
        case $count < 3:
            $sug = "Puede hacer frente a un grupo y 
            pensar independientemente de él. La 
            presión que el grupo ejerce no le 
            convence con facilidad. Deben 
            presentársele argumentos de peso;";
            $sug .= "Es básicamente un lobo solitario. No es 
            sensitivo a las actividades y sentimientos 
            del grupo;";
        break;
        case $count > 6:
            $sug = "Esta bien consciente de las actividades 
            del grupo. Tiene interés en cómo se 
            siente el grupo y tiene un gusto natural 
            por las personas;";
            $sug .= "Es dependiente del grupo. Puede ser 
            demasiado sensitivo a las necesidades 
            del mismo y cegarse a otras 
            necesidades: como la de producción;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function O($count){
    switch($count){
        case 0:
            $sug = "Es muy analítico en su manera de 
            pensar. Tiende a ser imparcial;";
            $sug .= "Se resiste a intimar con las personas. 
            Sería incompatible con puntuaciones 
            altas en esta letra;";
        break;
        case $count < 3:
            $sug = "Es muy analítico en su manera de 
            pensar. Tiende a ser imparcial;";
            $sug .= "Se resiste a intimar con las personas. 
            Sería incompatible con puntuaciones 
            altas en esta letra;";
        break;
        case $count > 6:
            $sug = "Esta consciente de las necesidades de 
            los demás y probablemente tiene 
            conocimientos sutiles acerca de otros. 
            Establece buenas relaciones muy 
            cordiales y sinceras con las personas;";
            $sug .= "Puede se lastimado profundamente. 
            Evalúa lo que le dicen en términos de sí 
            es o no apreciado. Tiende a prejuciarse 
            cuando juzga a otros porque vive en un 
            mundo emocional controlado por 
            relaciones interpersonales intensas;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function K($count){
    switch($count){
        case 0:
            $sug = "Puede ver las cosas desde una posición 
            elevada y objetiva y no le gusta 
            lastimar a nadie;";
            $sug .= "Es un introvertido emocionalmente que 
            trata de embotellar sus sentimientos y 
            tiene problema para enfrentarse a los 
            conflictos;";
        break;
        case $count < 3:
            $sug = "Puede ver las cosas desde una posición 
            elevada y objetiva y no le gusta 
            lastimar a nadie;";
            $sug .= "Es un introvertido emocionalmente que 
            trata de embotellar sus sentimientos y 
            tiene problema para enfrentarse a los 
            conflictos;";
        break;
        case $count > 6:
            $sug = "Tiende a ser abierto y franco con las 
            personas. Tiende a desmenuzar el 
            conflicto más que a ignorarlo o 
            evitarlo;";
            $sug .= "Se ofende con facilidad. Tiene una 
            “basura en el hombro” y es fácil de 
            malinterpretar negativamente lo que se 
            le dice;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function E($count){
    switch($count){
        case 0:
            $sug = "Es dramático y aporta mucha energía 
            cuando trabaja. Se siente 
            emocionalmente involucrado en su 
            trabajo;";
            $sug .= "Tiene poca restricción emocional. 
            Cambia de estados de ánimo fácilmente. 
            Cambia su actitud con su estado de 
            ánimo;";
        break;
        case $count < 3:
            $sug = "Es dramático y aporta mucha energía 
            cuando trabaja. Se siente 
            emocionalmente involucrado en su 
            trabajo;";
            $sug .= "Tiene poca restricción emocional. 
            Cambia de estados de ánimo fácilmente. 
            Cambia su actitud con su estado de 
            ánimo;";
        break;
        case $count > 6:
            $sug = "Es confiable, constante, calmado y 
            tiene control emocional y madurez. 
            Probablemente es maneja bien en 
            situaciones emocionales;";
            $sug .= "Es tan calmado y controlado que puede 
            parecer como emocionalmente pasivo, 
            aburrido y sin influencia;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}
function Z($count){
    switch($count){
        case 0:
            $sug = "Se puede adaptar a la rutina fácilmente 
            sin aburrirse;";
            $sug .= "Es el tipo de “vara en el lodo” y ofrece 
            resistencia al cambio";
        break;
        case $count < 3:
            $sug = "Se puede adaptar a la rutina fácilmente 
            sin aburrirse;";
            $sug .= "Es el tipo de “vara en el lodo” y ofrece 
            resistencia al cambio";
        break;
        case $count > 6:
            $sug = "Es abierto a nuevas ideas y entusiasta 
            acerca del cambio;";
            $sug .= "No tiene descanso interno y se aburre 
            fácilmente. Puede no permanecer en 
            una función el tiempo suficiente como 
            para su valor real;";
        break;
        default: $sug = "Puntuación normal;"; break;
    }
    return $sug;
}