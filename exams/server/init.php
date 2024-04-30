<?php
session_start();
$_SESSION['answer'] = [];
ini_set('display_errors', '0');
ini_set('error_log', '../e.log');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = file_get_contents('php://input');
    $request = json_decode($data, true);
    $_SESSION['genre'] = ($request['test'] == 'mmpi2' || isset($request['genre'])) ? $request['genre'] : null;
    $_SESSION['total'] = $request['total'];
    switch($request['test']){
        case 'mmpi2': mmpi2(); break;
        case 'moss': moss(); break;
        case 'kostick': kostick(); break;
        case 'otis': otis(); break;
        case 'scidii': scidii(); break;
        default: echo 'Nice try'; break;
    }
}
else "Nice Try (●'◡'●)";

function mmpi2(){
    $_SESSION['question'] = [
        'Me gustan las revistas de mecánica',
        'Tengo buen apetito',
        'Casi siempre me levanto por las mañanas descansado y como nuevo',
        'Creo que me gustaría trabajar como bibliotecario',
        'El ruido me despierta fácilmente',
        'Mi padre es un buen hombre (o lo fue en caso de haber fallecido)',
        'Me gusta leer artículos sobre crímenes en los periódicos',
        'Normalmente tengo bastante calientes los pies y las manos',
        'En mi vida diaria hay muchas cosas que me resultan interesantes',
        'Actualmente, tengo tanta capacidad de trabajo como antes',
        'La mayor parte del tiempo me parece tener un nudo en la garganta',
        'Mi vida sexual es satisfactoria',
        'La gente debería intentar comprender sus sueños y guiarse por ellos o tomarlos como avisos',
        'Me divierten las historias de detectives y de misterio',
        'Trabajo bajo una tensión muy grande',
        'De vez en cuando pienso en cosas demasiado malas como para hablar de ellas',
        'Estoy seguro de que la vida es dura para mí',
        'Sufro ataques de náuseas y vómitos',
        'Cuando acepto un nuevo empleo, me gusta descubrir a quien debo "caerle bien"',
        'Muy rara vez sufro de constipación (sequedad de vientre)',
        'A veces he deseado muchísimo abandonar el hogar',
        'Nadie parece comprenderme',
        'A veces tengo accesos de risa y llanto que no puedo controlar',
        'A veces estoy poseído por espíritus diabólicos',
        'Me gustaría ser cantante',
        'Cuando estoy en dificultades o problemas creo que lo mejor es callarme',
        'Cuando alguien me hace algún daño, siento deseos de devolvérselo si me es posible, y esto, por cuestion de principios',
        'Varias veces a la semana me molesta la acidez de estómago',
        'A veces siento deseos de maldecir',
        'A menudo tengo pesadillas',
        'Me cuesta bastante concentrarme en una tarea o trabajo',
        'He tenido muy peculiares y extrañas experiencias',
        'Raras veces me preocupo por mi salud',
        'Nunca me he visto en dificultades a causa de mi conducta sexual',
        'Durante algún tiempo, cuando era joven, participé en pequeños robos',
        'Tengo tos la mayor parte del tiempo',
        'A veces siento deseos de romper cosas',
        'He tenido períodos de días, semanas o meses en los que no podía preocuparme por las cosas, porque no tenía ánimo de nada',
        'Mi sueño es irregular, inquieto',
        'La mayor parte del tiempo parece dolerme la cabeza por todas partes',
        'No digo siempre la verdad',
        'Si los demás no se la hubieran tomado conmigo, hubiese tenido más éxito',
        'Mis razonamientos son ahora mejores que nunca',
        'Una vez a la semana, o más a menudo, siento calor por todo el cuerpo sin causa aparente',
        'Tengo tan buena salud física como la mayor parte de mis amigos',
        'Prefiero hacerme el desentendido con amigos del colegio, o personas conocidas que no veo desde hace tiempo, a menos que ellos me hablen primero',
        'Casi nunca he sufrido de doleres en el pecho o en el corazón',
        'En muchas ocasiones me gustaría más sentarme y soñar despierto que hacer cualquier cosa',
        'Soy una persona sociable',
        'A menudo he recibido órdenes de alguien que no sabía tanto como yo',
        'No leo diariamente todos los artículos principales del diario',
        'No he llevado un tipo de vida adecuado y normal',
        'A menudo algunas partes de mi cuerpo tienen sensaciones de hormigueo, quemazón, picazón o bien de quedarse "dormidas"',
        'A mi familia no le gusta el trabajo que he elegido (o el trabajo que pienso elegir para mi futuro)',
        'Algunas veces persisto en una cosa o tema hasta que los demás pierden la paciencia conmigo',
        'Me gustaría ser tan feliz como parecen los otros',
        'Muy raras veces siento dolor en la nuca',
        'Pienso que una gran mayoría de gente exagera sus desgracias para lograr la simpatía y ayuda de los demás',
        'Tengo molestias en la boca del estómago casi a diario',
        'Cuando estoy con gente escucho cosas entrañas',
        'Soy una persona importante',
        'A menudo he deseado ser mujer. (O si usted es mujer: nunca me ha molestado ser mujer)',
        'Mis sentimientos no son heridos con facilidad',
        'Me gusta leer novelas de amor',
        'La mayor parte del tiempo siento melancolía',
        'Se viviría mejor sin leyes',
        'Me gusta la poesía',
        'A veces hago rabiar (jugando) a los animales',
        'Creo que me gustaría el trabajo de guardabosques',
        'En una discusión o debate, me dejo vencer fácilmente',
        'En el momento actual me es difícil tener la esperanza de llegar a ser alguien',
        'A veces mi alma abandona mi cuerpo',
        'Decididamente no tengo confianza en mí mismo',
        'Me gustaría ser florista',
        'Normalmente siento que la vida vale la pena vivirla',
        'Se necesita discutir mucho para convencer a la mayor parte de la gente de la verdad',
        'De vez en cuando dejo para mañana lo que debería hacer hoy',
        'Le agrado a la mayor parte de la gente que me conoce',
        'No me importa que se diviertan haciéndome bromas',
        'Me gustaría ser enfermero',
        'Creo que la mayor parte de la gente mentiría para conseguir lo que busca',
        'Hago muchas cosas de las que me arrepiento luego. (Me arrepiento de más cosas o con más frecuencia que otras personas)',
        'Tengo pocas peleas con las personas de mi familia',
        'Siendo joven me echaron de clase, una o más veces, por portarme mal',
        'A veces siento grandes deseos de hacer algo dañino o chocante',
        'Me gustaría asistir a reuniones o fiestas donde haya mucha alegría y ruido',
        'Me he encontrado con problemas tan llenos de posibilidades, que no he podido llegar a una decisión',
        'Creo que las mujeres deben tener tanta libertad sexual como los hombres',
        'Las luchas más encarnizadas las tengo conmigo mismo',
        'Yo quiero mucho a mi padre. (O lo quise, si falleció)',
        'Tengo pocas o ninguna molestia a causa de espasmos o contracciones musculares',
        'No parece importarme lo que me suceda',
        'A veces, cuando no me siento bien, estoy irritable',
        'La mayor parte del tiempo me parece haber hecho algo malo o equivocado',
        'Soy feliz la mayor parte del tiempo',
        'Veo a mi alrededor cosas, animales o personas que otros no ven',
        'Parece como si la mayor parte del tiempo tuviera la cabeza cargada o llena de ruidos',
        'Hay algunas personas tan mandonas que me dan ganas de hacer lo contrario de lo que quieren, aunque sepa que tienen razón',
        'Alguien me la tiene jurada',
        'Nunca he hecho algo peligroso solo por el placer de hacerlo',
        'A menudo siento como si tuviera una venda puesta fuertemente alrededor de mi cabeza',
        'Alguna vez me enojo',
        'Me divierte más un juego cuando apuesto',
        'La mayoría de la gente es honrada por temor a ser descubierta',
        'En el colegio, algunas veces, fui enviado al director a causa de mi mala conducta',
        'Mi manera de hablar es como siempre (ni más rápida, ni más lenta, ni más atropellada, no tengo carraspera)',
        'Mis modales en la mesa no son tan correctos en mi casa como cuando salgo a comer afuera',
        'Cualquier persona capacitada y dispuesta a trabajar fuerte, tiene muchas probabiliades de tener éxito',
        'Me parece ser tan capaz y despierto como la mayor parte de los que me rodean',
        'Para no perder un beneficio o ventaja, la mayoría de la gente está dispuesta a hacer cualquier cosa',
        'Tengo bastantes trastornos digestivos',
        'Me gusta el teatro y el cine',
        'Sé quien es el responsable de muchos de mis problemas',
        'A veces me siento tan atraído por las cosas de otros (zapatos, reloj), que tengo ganas de robarlas',
        'Ver sangre no me da miedo ni me hace mal',
        'Frecuentemente no puedo comprender porque he estado tan gruñón y malhumorado',
        'Nunca he vomitado sangre, ni sangrado al toser',
        'No me preocupa contraer una enfermedad',
        'Me gusta recoger flores o cultivar plantas en casa',
        'Frecuentemente encuentro necesario defender lo que es justo',
        'Nunca me he entregado a prácticas sexuales fuera de lo común',
        'A veces mi pensamiento ha ido más rápido y delante de mis palabras',
        'Si pudiera entrar en un espectáculo sin pagar y estuviera seguro de no ser visto, probablmente lo haría',
        'Generalmente me pregunto que razón oculta puede tener otra persona cuando me hace un favor',
        'Creo que mi vida hogareña es tan agradable como la de mucha gente que conozco',
        'Es necesario reforzar las leyes vigentes',
        'Me hieren profundamente las críticas y los retos',
        'Me gusta cocinar',
        'Mi conducta es ampliamente controlada por las costumbres que me rodean',
        'A veces siento que verdaderamente soy un inútil',
        'Cuando era joven pertenecía a una banda que intentaba mantenerse unida como "carne y uña"',
        'Creo en la vida del más allá',
        'Me gustaría ser soldado',
        'A veces siento deseos de tomarme a puñetazos con alguien',
        'Frecuentemente he perdido o desaprovechado cosas por no saber decidirme a tiempo',
        'Me molesta que me pidan consejo o que me interrumpan cuando estoy trabajando en algo importante',
        'Solía llevar un diario personal',
        'Creo que se trama algo contra mí',
        'En un juego o partida suelo más ganar que perder',
        'Durante los últimos años he estado sano casi siempre',
        'Casi todas las noches me duermo con ideas o pensamientos molestos',
        'Nunca he tenido un ataque o convulsión',
        'Ahora no estoy subiendo o bajando de peso',
        'Creo que me siguen',
        'Creo que frecuentemente he sido castigado sin causa',
        'Lloro con facilidad',
        'Actualmente no comprendo lo que leo con la facilidad que tenía antes',
        'Nunca me he sentido mejor que ahora',
        'A veces siento dolores en la parte superior de la cabeza',
        'A veces siento que tengo que hacerme daño a mi mismo o alguien',
        'Me molesta que alguien se haya burlado tan inteligentemente de mí que yo haya tenido que admitir que lo logró ',
        'No me canso fácilmente',
        'Siento miedo cuando miro hacia abajo desde un lugar alto',
        'No me sentiría nervioso si algún familiar tuviera problemas con la ley',
        'Solo me siento feliz cuando viajo de un lado para otro',
        'Nunca he tenido un desmayo o desvanecimiento',
        'Me siento incómodo cuando tengo que hacer una payasada en una reunión, incluso aunque otros estén haciendo',
        'Frecuentemente tengo que esforzarme para no demostrar que soy tímido',
        'Me gustaba ir al colegio',
        'Alguien ha intentado envenenarme',
        'Las serpientes no me dan mucho miedo',
        'Me gusta conocer alguna gente importante porque esto me hace sentir importante',
        'Nunca o rara vez tengo mareos',
        'Mi memoria parece ser normal',
        'Me preocupan los temas sexuales',
        'Me es difícil entablar una conversación cuando recién conozco a alguien',
        'Me es indiferente lo que los demás piensen de mí',
        'He tenido épocas durante las cuales he realizado actividades que luego no recordaba haber hecho',
        'Cuando estoy aburrido me gusta promover algo excitante',
        'Tengo miedo de volverme loco',
        'Estoy en contra de dar dinero a los mendigos',
        'Frecuentemente noto temblar mis manos cuando intento hacer algo',
        'Puedo leer mucho tiempo sin que se me canse la vista',
        'Me gusta leer y estudiar acerca de lo que estoy trabajando',
        'Siento debilidad general la mayor parte del tiempo',
        'Mis manos siguen siendo habiles',
        'Muy pocas veces me duele la cabeza',
        'No he tenido dificultades para mantener el equilibrio al caminar',
        'A veces, cuando estoy preocupado, comienzo a sudar, lo que me molesta mucho',
        'No tengo accesos de alergia o asma',
        'He tenido ataques en los que perdía el control de mis movimientos o de la palabra, pero sabía lo que pasaba a mí alrededor',
        'Muy pocas veces sueño despierto',
        'Me gustaría ser menos tímido',
        'Me desagradan algunas personas que conozco',
        'No me da miedo manejar dinero',
        'Algo no anda bien en mi cabeza',
        'Me gusta flirtear (coquetear)',
        'Me gustaría ser periodista',
        'Los niños me tratan más como a un niño que como a un adulto',
        'Mi madre es una buena mujer, (o lo fue, si falleció)',
        'Cuando camino por la vereda evito cuidadosamente pisar las baldosas flojas',
        'Si fuera periodista me gustartía mucho informar sobre teatro',
        'Comparado con otros hogares, en el mío hay poco amor o unión',
        'Con frecuencia, estoy preocupado por algo',
        'Creo que me gustaría el trabajo de contratista de obras',
        'Nunca he tenido erupciones en la piel que me hayan preocupado',
        'Me gusta la ciencia',
        'No me cuesta pedir ayuda a mis amigos, incluso aunque no pueda devolverles el favor',
        'Me gusta mucho cazar',
        'Normalmente oigo voces sin saber de donde vienen',
        'A menudo a mis padres les molestó el tipo de amigos que tenía',
        'A veces soy un poco chismoso',
        'Escucho tan bien como las demás personas',
        'Disfruto con muy diferentes clases de juegos o diversiones',
        'A veces me siento capaz de tomar decisiones con extraordinaria facilidad',
        'Me gustaría pertenecer a varios clubes o asociaciones',
        'Alguno de mis familiares tiene costumbres que me molestan y fastidian muchísimo',
        'Raramente noto los latidos de mi corazón y pocas veces se me corta la respiración',
        'Me gusta hablar sobre temas sexuales',
        'Me gusta visitar lugares donde nunca he estado',
        'Me han sugerido una forma de vida basada en el deber y desde entonces la he seguido cuidadosamente',
        'A veces traté de que alguien no hiciera algo, porque eso estaba en contra de mis principios',
        'Me enojo fácilmente, pero se me pasa pronto',
        'He vivivo bastante libre e independiente de las normas familiares',
        'Me preocupo muchísimo',
        'Alguien ha tratado de robarme',
        'Casi todos mis familiares simpatizan conmigo',
        'Hay momentos en que estoy tan nervioso que no puedo estar sentado mucho tiempo',
        'He tenido desengaños amorosos',
        'Nunca me preocupo por mi apariencia',
        'Sueño frecuentemente con cosas que es mejor guardarlas para mí mismo',
        'Debería enseñarse a los niños lo principal acerca de la vida sexual',
        'Creo que no soy más nervioso que la mayoría',
        'Tengo pocos o ningún dolor',
        'Mi modo de hacer las cosas tiende a ser mal interpretado por los demás',
        'Algunas veces, sin razón alguna, incluso cuando las cosas van mal, me siento feliz, "flotando entre las nubes"',
        'No culpo a nadie por tratar de apoderarse de todo lo que pueda en este mundo',
        'Hay personas que están intentando apoderarse de mis ideas y proyectos',
        'He tenido momentos de nerviosismo que interrumpieron mis actividades, y en los que no sabía que ocurría a mi alrededor',
        'Puedo mostrarme amistoso con la gente que hace cosas que yo considero incorrectas',
        'Me gusta estar en un grupo en el que se hacen bromas mutuamente',
        'En las elecciones, algunas veces, voto candidatos que conozco muy poco',
        'Me cuesta empezar a hacer cualquier cosa',
        'Siento que soy una persona condenada',
        'En el colegio era lento para aprender',
        'Si fuera artista me gustaría dibujar flores',
        'No me molesta ser poco elegante',
        'Transpiro muy fácilmente, incluso en días fríos',
        'Soy una persona plenamente segura de sí misma',
        'A veces me es imposible vencer la tentación de robar',
        'Es más seguro no confiar en nadie',
        'Me excito mucho una vez por semana o con más frecuencia',
        'Cuando estoy con un grupo de gente, me altera tener que pensar en temas adecuados de conversación',
        'Cuando estoy abatido (bajoneado), algo emocionante me saca casi siempre de ese estado',
        'Cuando salgo de casa no me preocupa si la puerta y las ventanas quedan bien cerradas',
        'Creo que mis pecados son imperdonables',
        'Tengo entumecimientos en una o más partes de mi piel',
        'No culpo a aquel que se aprovecha de otro que deja que se aprovechen de él',
        'Mi vista es tan buena como lo ha sido durante años',
        'A veces me ha divertido tanto el ingenio de un delincuente, que he deseado que le fuera bien',
        'A menudo me ha dado la sensación de que gente extraña me ha estado mirando con ojos críticos',
        'Para mí todo tiene el mismo sabor o gusto',
        'Todos los días tomo una cantidad excesivamente grande de agua',
        'La mayor parte de la gente hace amigos porque es probable que le sean útiles',
        'No noto que me zumben o me chillen los oídos frecuentemente',
        'De vez en cuando siento fastidio hacia familiares que normalmente quiero',
        'Si fuera periodista me gustaría mucho informar sobre deportes',
        'Puedo dormir de día, pero no de noche',
        'Estoy seguro de que la gente habla de mí',
        'De vez en cuando me divierten las bromas o chistes "verdes"',
        'Comparado con mis amigos, tengo muy pocos miedos',
        'Puedo iniciar una discusión, en un grupo de personas, sobre un tema que conozco',
        'Siento siempre aversión por la ley cuando un criminal sale libre gracias a la habilidad de un abogado astuto',
        'He abusado del alcohol',
        'Por lo general no le hablo a las personas hasta que ellas me hablan a mí',
        'Nunca he tenido problemas con la ley',
        'Tengo épocas en las que me he sentido más animado que de costumbre sin que exista una razón especial',
        'Me gustaría no ser pertubado por pensamientos sexuales',
        'Si varias personas se encuentran inculpadas, lo que mejor que pueden hacer es ponerse de acuerdo en lo que van a decir y no cambiarlo después',
        'No me molesta ver sufrir a los animales',
        'Creo que mi sensibilidad es más intensa que la de la mayor parte de la gente',
        'En ningún momento de mi vida me ha gustado jugar con muñecos',
        'Para mí, la vida es tensión la mayor parte del tiempo',
        'Soy tan susceptible en algunos asuntos que no puedo hablar de ellos',
        'Me costaba mucho hablar delante de todos en el colegio',
        'Quiero a mi madre (o la quise si falleció)',
        'Incluso cuando estoy con gente, me siento solo la mayor parte del tiempo',
        'Consigo todas las simpatías que debería',
        'Me niego a participar en algunos juegos porque no soy hábil en ellos',
        'Me parece que hago amigos tan rápido como los demás',
        'Me desagrada tener gente a mi alrededor',
        'Dicen que hablo cuando duermo',
        'Quien provoca la tentación dejando una cosa valiosa sin protegerla es tan culpable del robo como quien la roba',
        'Pienso que casi todo el mundo diría una mentira para evitar problemas',
        'Soy mas sensible que la mayoria de la gente',
        'A la mayor parte de la gente le desagrada interiormente dejar lo suyo para ayudar a los demás',
        'Muchos de mis sueños son sobre temas sexuales',
        'Mis padres y familiares encuentran mas defectos en mí de lo que deberían',
        'Me aturdo fácilmente',
        'Me preocupan el dinero y los negocios',
        'Nunca he estado enamorado de alguien',
        'Me han asustado ciertas cosas que han hecho algunos de mis familiares',
        'Casi nunca sueño',
        'A menudo me salen manchas rojas en el cuello',
        'Nunca he tenido parálisis ni sufrido una debilidad desacostumbrada en algunos de mis músculos',
        'Algunas veces pierdo o se me cambia la voz, incluso sin estar resfriado',
        'Mi padre o mi madre me obligaron frecuentemente a obedecer, incluso cuando yo pensaba que ello no era razonable',
        'A veces percibo olores extraños',
        'No puedo concentrarme en una sola cosa',
        'Tengo razones para sentirme celoso de uno o más de mis familiares',
        'Casi todo el tiempo siento ansiedad a causa de algo o alguien',
        'Me impaciento fácilmente con la gente',
        'Muchísimas veces me gustaría estar muerto',
        'Muchísimas veces me excito tanto que me cuesta dormirme por las noches',
        'Sin duda he tenido que preocuparme por más cosas que las que me correspondían',
        'Nadie parece comprenderme',
        'A veces oigo tan bien que me molesta',
        'Olvido enseguida lo que la gente me dice',
        'Normalmente tengo que pararme a pensar antes de actuar, incluso en asuntos sin importancia',
        'A menudo cruzo la calle para no encontrarme con alguna persona',
        'Con frecuencia siento como si las cosas no fueran reales',
        'La única parte interesante de los diarios son las páginas de los chistes',
        'Tengo la costumbre de contar con objetos sin importancia, como las bombillas de un letrero luminoso o cosas similares',
        'Carezco de enemigos que deseen realmente hacerme daño',
        'Tiendo a ponerme en guardia con aquellos que se muestran algo más amables de lo que yo esperaba',
        'Tengo pensamientos extraños y originales',
        'Me pongo ansioso e inquieto cuando tengo que hacer un viaje corto',
        'Normalmente espero éxito en las cosas que hago',
        'Oigo cosas mas extrañas cuando estoy solo',
        'He tenido miedo de cosas o personas que sabía que no podían hacerme daño',
        'No me da miedo entrar solo a una habitación donde hay gente reunida hablando',
        'Me da miedo utilizar cuchillos u objetos muy afilados o puntiagudos',
        'Algunas veces gozo con herir a personas que amo',
        'Me resulta fácil lograr que la gente me tenga miedo y eso me divierte',
        'Tengo más dificultad para concentrarme que la que otros parecen tener',
        'Varias veces he dejado de hacer algo por considerar insuficiente mi habilidad',
        'Se me ocurren palabras feas, a veces horribles, y no puedo dejarlas de lado',
        'Algunas veces me ronda en la cabeza un pensamiento sin importancia y me molesta durante días',
        'Casi a diario ocurre algo que me asusta',
        'A veces siento que me sobran energías',
        'Me inclino a tomar las cosas muy en serio',
        'A veces me ha gustado ser herido por una persona querida',
        'La gente dice de mí cosas insultantes y vulgares',
        ' Me siento incómodo cuando estoy "bajo techo” (dentro de un edificio o habitación)',
        'Soy poco conciente de mi mismo',
        'Estoy seguro de que alguien controla mi mente',
        'En las fiestas y reuniones, en vez de unirme al grupo, es más probable que me siente solo o con otra persona',
        'La gente me decepciona con frecuencia',
        'Frecuentemente mis proyectos me han parecido tan llenos de dificultades que he tenido que abandonarlos',
        'Me gusta mucho ir a bailar',
        'Durante ciertos períodos mi mente parece trabajar más despacio que de costumbre',
        'En micros, trenes, suelo conversar con extraños',
        'Me gustan los niños',
        'Me gusta jugar y apostar',
        'Si me dieran la oportunidad, podría hacer cosas que beneficiarían mucho al mundo',
        'Con frecuencia me he encontrado con personas con reputación de expertas, pero que no eran mejores que yo',
        'Me siento fracasado cuando hablan del éxito de alguien que conozco bien',
        'Con frecuencia pienso: "Me gustaría volver a ser niño"',
        'Nada me hace más feliz que estar solo',
        'Si me dieran la oportunidad podría ser un buen líder',
        'Me molestan las anécdotas indecentes',
        'Normalmente la gente pide para sus propios derechos más respeto que el que da a los de otras personas',
        'Me gustan las reuniones sociales porque puedo estar con gente',
        'Trato de memorizar los cuentos divertidos para poder contárselos a otros',
        'Una o más veces en mi vida sentí que alguien me obligó a hacer cosas hipnotizándome',
        'Me resulta difícil abandonar una tarea una vez que la empecé',
        'Generalmente no me involucro en los chismes que cuentan los que me rodean',
        'A menudo han sentido celos de mis ideas porque no las pensaron antes',
        'Me encanta estar con mucha gente (recitales, manifestaciones)',
        'No me preocupa encontrarme con extraños',
        'Alguien ha tratado de influenciar mi mente',
        'He fingido "estar enfermo" para evitar hacer algo',
        'Mis preocupaciones tienden a desaparecer cuando me junto con amigos',
        'Tiendo a abandonar lo que estoy haciendo si me sale mal',
        'Me gusta que la gente conozca lo que realmente pienso',
        'He tenido períodos en los que me sentí tan lleno de fuerzas que no necesitaba dormir',
        'Siempre que se vea posible evito estar en una multitud',
        'Trato de evitar situaciones de crisis o dificultad',
        'Me considero capaz de lograr lo que me propongo cuando otros creen que no vale la pena',
        'Me gustan las fiestas y reuniones sociales',
        'Muchas veces desee pertenecer al sexo opuesto',
        'No me enojo fácilmente',
        'He hecho algunas cosas malas en el pasado que no se las conté a nadie',
        'La mayoria de la gente puede hacer cosas incorrectas con tal de lograr su propósito',
        'Me pongo nervioso cuando la gente me hacer preguntas personales',
        'Me siento incapaz de planificar mi futuro',
        'Me desagrada mi forma de ser',
        'Generalmente me enojo cuando amigos o familiares me dan consejos',
        'Me golpearon mucho cuando era chico',
        'Me molesto cuando la gente me elogia',
        'Me disgusta escuchar a la gente que da sus opiniones acerca de la vida',
        'A menudo he tenido desacuerdos serios con gente amiga',
        'Se que puedo contar con la ayuda de mi familia cuando las cosas me van mal',
        'Me gustaba jugar "a la mamá" o "al papá" cuando era niño',
        'No le tengo miedo al fuego',
        'Muchas veces me he alejado de alguna persona por temor de decir o hacer algo de lo que después podría arrepentirme',
        'Sólo puedo expresar lo que realmente siento cuando bebo',
        'Rara vez tengo momentos de depresión (de bajoneo)',
        'Me han dicho con frecuencia que tengo mal carácter',
        'Desearía haber podido dejar de preocuparme por cosas que dije y que pudieron lastimar los sentimientos de algunas personas',
        'Me siento incapaz de contarle a alguien todas mis cosas',
        'Le tengo miedo a los relámpagos',
        'Me gusta que los demás estén intrigados acerca de lo que voy a hacer',
        'Algunas veces me ha parecido que las dificultades se acumulaban de tal modo que no podía superarlas',
        'Me da miedo estar solo en la oscuridad',
        'Muchas veces me ha caído mal ser incomprendido cuando trataba de evitar que alguien se equivocara',
        'Le tengo miedo a las tormentas con mucho viento',
        'Frecuentemente pido consejos a otras personas',
        'El futuro es demasiado incierto para que una persona haga planes importantes',
        'A menudo, incluso cuando todo me sale bien, siento que nada me importa',
        'No le tengo miedo al agua',
        'A menudo tengo que "consultar con la almohada" antes de tomar una decisión',
        'A menudo la gente ha interpretado mal mis intenciones cuando trataba de ayudarla',
        'No tengo dificultad al tragar',
        'Soy una persona tranquila y no me altero fácilmente',
        'Me gusta combatir a los criminales con sus propias armas',
        'Merezco un castigo severo por mis pecados',
        'Me tomo tan en serio las preocupaciones que me cuesta sacármelas de la cabeza',
        'Me molesta que alguien me observe cuando trabajo aunque sepa que lo hago bien',
        'A menudo me molesta tanto que alguien trate de "colarse" delante de mí en una cola, que tengo que decirle algo',
        'A veces pienso que no valgo para nada',
        'Cuando era chico me hacía "la rabona" en la escuela',
        'Uno o varios de mis familiares son muy nerviosos',
        'A veces he tenido que ser duro con personas groseras o inoportunas',
        'Me preocupo bastante por posibles desgracias',
        'Tengo opiniones políticas muy definidas',
        'Me gustaría ser corredor de automovilismo',
        'Es correcto bordear los límites de la Ley con tal de no violarla claramente',
        'Me desagradan tanto algunas personas, que me alegro interiormente cuando les llaman la atención por algo que han hecho',
        'Me pone nervioso tener que esperar',
        'Tiendo a dejar algo que deseo hacer porque otros piensan que lo encaro incorrectamente',
        'Cuando era joven me apasionaba lo emocionante',
        'Con frecuencia me esfuerzo para triunfar sobre alguien que se enfrenta a mí',
        'Me molesta que me mire gente desconocida, en el colectivo, en los negocios',
        'El hombre que más tuvo que ver conmigo cuando era niño (como mi padre, padrastro, etc.) fue muy rígido',
        'Cuando era chico, me gustaba jugar al rango y a la soga',
        'Nunca he tenido una "visión"',
        'Varias veces he cambiado de modo de pensar acerca de mi trabajo',
        'Nunca tomo drogas o pastillas para dormir, a no ser por orden del médico',
        'Frecuentemente lamento tener mal carácter o ser tan protestón',
        'En la escuela, mis calificaciones en conducta fueron generalmente malas',
        'Me fascina el fuego',
        'Cuando estoy en una situación difícil sólo digo aquella parte de la verdad que probablemente no me va a perjudicar',
        'Si estuviera en dificultades junto con varios amigos que fueran tan culpables como yo, preferiría echarme la culpa antes de descubrirlos',
        'A menudo tengo miedo a la oscuridad',
        'Cuando un hombre está con una mujer, generalmente está pensando cosas relacionadas con el sexo de ella',
        'Generalmente "le hablo claro" a la gente que estoy intentando corregir o mejorar',
        'Me aterroriza la idea de un terremoto',
        'Rápidamente me convenzo por completo de una buena idea',
        'Generalmente hago las cosas por mí mismo, en vez de buscar a alguien que me diga como hacerlas',
        'Siento miedo cuando estoy en un lugar pequeño y cerrado',
        'Admito que a veces me he preocupado sin motivo alguno por cosas que no valían la pena',
        'No trato de disimular mi pobre opinión o lástima sobre algunas personas',
        'Soy una persona de una gran tensión',
        'Frecuentemente he trabajado a las órdenes de personas que parecen haber arreglado las cosas de tal modo, que ellas son las que reciben el reconocimiento de una buena labor y, en cambio, atribuyen los errores a sus subordinados',
        'A veces me es difícil defender mis derechos por ser tan reservado',
        'La suciedad me espanta o me disgusta',
        'Vivo una vida de ensueño, acerca de la cual no digo nada a nadie',
        'Algunos de mis familiares tienen mal carácter',
        'No puedo hacer bien ninguna cosa',
        'A menudo me he sentido culpable porque he fingido mayor sufrimiento del que realmente sentía',
        'Por regla general defiendo con tenacidad mis opiniones',
        'No temo a las arañas',
        'Para mí el futuro carece de esperanza',
        'Mis familiares y parientes más cercanos se llevan bastante bien',
        'Me gustaría tener ropa cara',
        'La gente puede hacerme cambiar de opinión muy fácilmente, incluso en materias en las que creía tener ya un criterio firme',
        'Ciertos animales me ponen nervioso',
        'Puedo soportar tanto dolor como los demás',
        'Varias veces he sido el último en darme por vencido al tratar de hacer algo',
        'Me pone de mal humor que la gente me apure',
        'No tengo miedo a los ratones',
        'Varias veces a la semana siento como si fuera a suceder algo espantoso',
        'Me siento cansado una buena parte del tiempo',
        'Me gusta arreglar las cerraduras de las puertas',
        'Algunas veces estoy seguro de que otro puede decir lo que estoy pensando',
        'Me gusta leer temas científicos',
        'Temo estar solo en lugares amplios y abiertos',
        'Algunas veces me siento al borde de una crisis nerviosa',
        'Muchas personas tienen mala conducta sexual',
        'A menudo he sentido miedo en plena noche',
        'Me molesta mucho olvidarme donde pongo las cosas',
        'La persona hacia quien sentía más afecto y admiración cuando era niño, fue una mujer (madre, hermana tía u otra mujer)',
        'Me gustan más las historias de aventuras que las románticas',
        'A veces me confundo y no sé que decir',
        'Soy una persona poco agradable',
        'Me gustan los deportes fuertes como el fútbol o rugby',
        'Detesto a mi familia',
        'Algunas personas piensan que es difícil conocerme, saber como soy',
        'Paso mucho tiempo a solas',
        'Me gusta que la gente conozca mi punto de vista cuando hacen cosas que me enojan',
        'Me cuesta tomar decisiones',
        'Soy una persona poca atractiva',
        'La gente es poco amable conmigo',
        'A veces siento que no soy tan bueno como los demás',
        'Soy "cabeza dura"',
        'Me gustó fumar marihuana',
        'La enfermedad mental es signo de debilidad',
        'Tengo problemas con la droga o el alcohol',
        'Los fantasmas o espíritus influyen en la vida de las personas, para bien o para mal',
        'Me siento desamparado cuando tengo que decidir algo importante',
        'Trato de ser paciente aún cuando me critican',
        'Cuando tengo un problema me ayuda el contárselo a otra persona',
        'Creo que puedo lograr concretar mis proyectos',
        'Creo que la gente debe "guardarse" sus problemas personales',
        'En esta etapa de mi vida me siento poco tenso o estresado',
        'Me molesta pensar en hacer cambios en mi vida',
        'Mis mayores problemas son causados por la forma de ser de alguien con quien convivo',
        'Detesto ir al médico aún cuando estoy enfermo',
        'Aunque soy poco feliz, no puedo hacer nada para modificarlo',
        'Conversar acerca de los problemas es más útil que tomar remedios para resolverlos',
        'Tengo tan arraigados uno o varios malos hábitos que es inútil luchar contra ellos',
        'Si hay que resolver un problema, le dejo la iniciativa a los demás',
        'Reconozco que cometo errores pero no puedo cambiar',
        'Me disgusta tanto lo que hago diariamente que quisiera dejar de hacerlo',
        'He pensado en suicidarme',
        'Realmente me enojo cuando interrumpen mi trabajo',
        'A menudo siento que puedo leer lo que otros están pensando',
        'Me pongo nervioso cuando tengo que tomar una decisión importante',
        'Dicen que como muy rápido',
        'Por lo menos una vez por semana me emborracho o me drogo',
        'Tuve una pérdida afectiva importante en mi vida que no puedo olvidar',
        'A veces me enojo tanto que no sé lo que digo o hago',
        'Me cuesta decir que "no" cuando me piden que haga algo',
        'Sólo soy feliz cuando estoy solo',
        'Mi vida es vacía y sin sentido',
        'Me cuesta conservar un trabajo',
        'Cometí muchos errores en mi vida',
        'Me enojo conmigo mismo por ser tan generoso con los demás',
        'Últimamente he pensado mucho en quitarme la vida',
        'Me agrada ayudar a los demás',
        'Aunque me quedara sin familia siempre hay alguien que puede ayudarme',
        'Me disgusta tener que hacer colas en cines teatros o restaurantes',
        'Nadie sabe que intenté suicidarme',
        'Todo pasa muy rápido a mi alrededor',
        'Sé que le resulto "pesado" a la gente',
        'Después de un mal día, necesito tomar unos tragos para poder relajarme',
        'Muchos de mis problemas se deben a mi mala suerte',
        'A veces me resulta difícil dejar de hablar',
        'A veces me hago daño a mi mismo sin saber por qué',
        'Trabajo muchas horas sin que ello sea necesario',
        'Generalmente me siento mejor después de llorar',
        'Me olvido donde dejo las cosas',
        'Si volviera a nacer haría las cosas de la misma manera',
        'Me pone de mal humor que la gente con la que trabajo no haga las cosas a tiempo',
        'Cuando estoy enojado me duele la cabeza',
        'Me gusta manejar autos viejos',
        'Muchos hombres son infieles a sus parejas',
        'Últimamente perdí las ganas de preocuparme de mis problemas',
        'Hubo ocasiones en las que me enojé y rompí cosas por haber bebido mucho',
        'Trabajo mejor cuando tengo plazos bien definidos',
        'He llegado a enfurecerme tanto con alguien que creí que iba a estallar',
        'A veces tengo malos pensamientos sobre mi familia',
        'La gente me dice que tengo problemas con el alcohol, pero yo no estoy de acuerdo',
        'Tengo poco tiempo para poder hacer las cosas que debo',
        'Últimamente, pienso mucho en la muerte y "el más allá"',
        'Guardo cosas que nunca uso',
        'He estado tan enojado que llegué a golpear y lastimar a una persona',
        'En todo lo que hago, siento que me están tomando examen',
        'Estoy bastante alejado de mis familiares actualmente',
        'A veces siento que escuchan lo que estoy pensando',
        'Cuando estoy triste, me hace bien visitar amigos',
        'Siento que lo que me está pasando ahora ya me sucedió',
        'Cuando tengo problemas serios, siento ganas de salir corriendo',
        'Me da miedo entrar a una habitación oscura en mi propia casa',
        'Me preocupo mucho por el dinero',
        'El hombre debe ser la cabeza de la familia',
        'Sólo me siento relajado en mi casa',
        'Mis compañeros de trabajo entienden muy poco mis problemas',
        'Estoy conforme con el dinero que gano',
        'Generalmente tengo suficiente energía para cumplir con mis tareas',
        'Me resulta difícil aceptar elogios',
        'En la mayoría de los matrimonios, una de las personas o ambas son poco felices',
        'Casi nunca pierdo el control',
        'Me cuesta mucho esfuerzo recordar lo que me dicen',
        'Si me siento triste, trabajo mal',
        'La mayor parte de los matrimonios no muestran que están enamorados uno del otro'
    ];
    $_SESSION['format'] = '
    <div class="option">
    <input class="answer select-radio" type="radio" value="verdadero" name="select">
    <label>Verdadero</label>
    </div>
    <div class="option">
    <input class="answer select-radio" type="radio" value="falso" name="select">
    <label>Falso</label>
    </div>
    ';
    echo '<p class="question">'.$_SESSION['question'][0].'</p>'.$_SESSION['format'];
}

function moss(){
    $_SESSION['question'] = [
        'Se le ha asignado un puesto en una gran empresa. La mejor forma de establecer relaciones amistosas y cordiales con sus nuevos compañeros será:',
        'Tiene usted un empleado muy eficiente pero que constantemente se queja del trabajo, sus quejas producen mal efecto en los demás empleados, lo mejor sería:',
        'Un empleado de 60 años de edad que ha sido leal a la empresa durante 25 años se queja del exceso de trabajo. Lo mejor sería:',
        'Uno de los socios, sin autoridad sobre usted le ordena haga algo en forma bien distinta de lo que planeaba. ¿Qué haría usted?',
        'Usted visita a un amigo íntimo que ha estado enfermo por algún tiempo. Lo mejor sería:',
        'Trabaja usted en una industria y su jefe quiere que tome un curso relacionado con su carrera pero que sea compatible con el horario de su trabajo. Lo mejor sería:',
        'Un agente viajero con 15 años de antigüedad decide, presionado por su familia, sentar raíces. Se le cambia a las oficinas generales. Es de esperar que:',
        'Tiene dos invitados a cenar: uno radical y el otro conservador. Surge una acalorada discusión respecto a la política. Lo mejor sería:',
        'Un joven invita a una dama al teatro, al llegar se percata de que ha olvidado la cartera. Sería mejor:',
        'Usted ha tenido experiencia como vendedor y acaba de conseguir empleo en una tienda como tal. La mejor forma de relacionarse con los trabajadores del departamento sería:',
        'Es usted un joven empleado que va a comer con una maestra a quien conoce superficialmente. Lo mejor seria iniciar la conversación acerca de:',
        'Una señora de especiales méritos que por largo tiempo ha dirigido trabajos benéficos dejando las labores de su casa a cargo de la servidumbre, se cambia a otra población. Es de esperarse que ella:',
        'Quiere pedirle un favor a un conocido con quien tiene poca confianza. La mejor forma de lograrlo sería:',
        'Un joven de 24 años gasta bastante tiempo y dinero en diversiones, solo ha hecho ver que así no logrará al éxito en el trabajo. Probablemente cambie sus costumbres si:',
        'Tras haber hecho un buen número de favores a un amigo, este empieza a dar por sentado que usted será quien le resuelva todas sus pequeñas dificultades. La mejor forma de readaptar la situación sin ofenderle sería:',
        'Una persona recién ascendida a un mejor puesto de autoridad lograría mejores metas y la buena voluntad de los empleados...:',
        'Vive a 15 km del centro y ha ofrecido llevar de regreso a un amigo a las 16:00 horas, él lo espera desde las 15:00 y a las 16:00 hrs usted se entera que no podrá salir antes de las 17:30, sería mejor:',
        'Es usted un ejecutivo y dos de sus empleados se llevan mal, pero ambos son eficientes. Lo mejor sería:',
        'El señor González ha estado conservando su puesto subordinado por 10 años, desempeña su trabajo callado y confidencialmente y se le extrañará cuando se vaya. De obtener el trabajo en otra empresa, muy probablemente:',
        'Va usted a ser maestro de ceremonias en una cena el próximo sábado, día en que por la mañana, se ve imposibilitado para asistir debido a enfermedad de su familia. Lo mejor sería:',
        'En igualdad de circunstancias el empleado que mejor se adapta a un nuevo puesto es aquel que:',
        'Un conocido le platica acerca de una afición que él tiene, su conversación le aburre. Lo mejor sería:',
        'Es usted un empleado ordinario en una oficina grande. El jefe entra cuando usted lee en vez de trabajar. Lo mejor sería:',
        'Es usted un maestro de primaria. Camino a la escuela tras la primera nevada, algunos de sus alumnos lanzan bolas de nieve. Desde el punto de vista de la buena administración de la escolar, usted debería:',
        'Preside el Comité de Mejoras Materiales en su colonia; las últimas reuniones han sido de escasa asistencia. Se mejoraría la asistencia:',
        'Zaldívar es eficiente, pero de esos que "todo lo saben", critica a Montoya y el jefe opina que la idea de Montoya ahorra tiempo. Probablemente Zaldivar:',
        'Un hombre de 64 años tuvo algún éxito cuando era joven como político, sus modos directos le han impedido descollar los últimos 20 años, lo más probable es que:',
        'Es usted un joven que encuentra en la calle a una mujer de más edad a quien apenas conoce y que parece haber estado llorando. Lo mejor sería:',
        'Un compañero flojea de tal manera que a usted le toca más de lo que le corresponde. La mejor forma de conservar las relaciones sería:',
        'Se le ha asignado un puesto ejecutivo, en una organización. Para ganar el respeto y la admiración de sus subordinados, sin perjuicio de sus planes, habría que:'
    ];
    $_SESSION['format'] = [
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Evitando tomar nota de los errores en que incurran</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Hablando bien de ellos al jefe</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Mostrando interés en el trabajo de ellos</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Pidiendo que le permitan hacer los trabajos que usted puede hacer mejor</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Pedir a los demás empleados que no hagan caso</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Averiguar la causa de esa actitud y procurar su modificación</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Cambiarlo de departamento donde quede a cargo de otro jefe</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Permitirle planear lo más posible acerca de su trabajo</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Decirle que vuelva a su trabajo sin pena de cese</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Despedirlo, substituyéndolo por alguien más joven</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Darle un aumento de sueldo que evite que continúe quejándose</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Aminorar su trabajo</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Acatar la orden y no armar mayor revuelo</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Ignorar las indicaciones y hacerlo según había planeado</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Decirle que esto no es asunto que a él le interese y que usted hará las cosas a su modo</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Decirle que lo haga él mismo</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Platicarle sus diversiones recientes</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Platicarle nuevas cosas referentes a sus amigos mutuos</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Comentar su enfermedad</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Enfatizar lo mucho que le apena verle enfermo</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Continuar normalmente su carrera e informar al jefe si pregunta</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Explicar la situación y obtener su opinión en cuanto a la importancia relativa de ambas situaciones</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Dejar la escuela en relación a los intereses del trabajo</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Asistir en forma alterna y no hacer comentarios</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Guste de los descansos del trabajo de oficina</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Se sienta inquieto por la rutina de la oficina</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Busque otro trabajo</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Resulte muy ineficiente en el trabajo de oficina</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Tomar partido</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Intentar cambiar de tema</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Intervenir dando los propios puntos de vista y mostrar dónde ambos pecan de extremosos</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Pedir que cambien de tema para evitar mayor discusión</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Tratar de obtener boletos dejando el reloj en prenda</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Buscar a algún amigo a quien pedir prestado</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Decidir de acuerdo con ella lo procedente</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Dar una excusa plausible para ir a casa por dinero</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Permitirles a los demás hacer la mayoría de las ventas por unos días en tanto usted observa sus métodos</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Tratar de instituir los métodos que anteriormente le fueron útiles</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Adaptarse mejor a las condiciones y aceptar consejos de sus compañeros</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Pedir al jefe todo el consejo necesario</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Algún tópico de actualidad</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Algún aspecto interesante de su propio trabajo</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Las tendencias actuales en el terreno docente</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Las sociedades de padres de familia</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Se sienta insatisfecha de su nuevo hogar</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Se interese más por los trabajos domésticos</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Intervenga poco a poco en la vida de la comunidad, continuando así sus intereses</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Adopte nuevos intereses en la nueva comunidad</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Haciéndole creer que será él quien se beneficie más</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Enfatizar la importancia que para usted tiene que se le conceda</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Ofrecer algo de retribución</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Decir que es lo que desea en forma breve indicando los motivos</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Sus hábitos nocturnos lesionan su salud</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Sus amigos enfatizan el daño que se hace a sí mismo</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Su jefe se da cuenta y lo previene</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Se interesa en el desarrollo de alguna fase de su trabajo</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Explicar el daño que se está causando</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Pedir a un amigo mutuo que trate de arreglar las cosas</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Ayudarle una vez más pero de tal manera que sienta que mejor hubiera sido no haberlo solicitado</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Darle una excusa para no seguir ayudándole</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Tratando de que cada empleado entienda qué es la verdadera eficiencia</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Ascendiendo cuanto antes a quienes considere lo merezcan</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Preguntando confidencialmente a cada empleado en cuanto a los cambios que estiman necesarios</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Seguir los sistemas del anterior jefe y gradualmente hacer los cambios necesarios</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Pedirle un taxi</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Explicarle y dejar que él decida</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Pedirle que espere hasta las 17:30 horas</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Proponerle que se lleve su auto</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Despedir al menos eficiente</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Dar trabajo en común que a ambos interese</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Hacerles ver el daño que se hacen</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Darles trabajos distintos</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Asuma fácilmente responsabilidad como supervisor</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Haga ver de inmediato su valor</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Sea lento para abrirse las necesarias oportunidades</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Renuncie ante la más ligera crítica de su trabajo</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Cancelar la cena</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Encontrar quien lo sustituya</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Detallar los planes que tenía y evitarlos</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Enviar una nota explicando la causa de su ausencia</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Ha sido bueno en puestos anteriores</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Ha tenido éxito durante 10 años en su puesto</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Tiene sus propias ideas e invariablemente se rige por ellas</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Cuenta con una buena recomendación de su jefe anterior</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Escuchar de manera cortés, pero aburrida</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Escuchar con fingido interés</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Decirle francamente que el tema no le interesa</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Mirar el reloj con impaciencia</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Doblar el periódico y volver a trabajo</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Pretender que obtiene recortes necesarios al trabajo</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Tratar de interesar al jefe leyéndole un encabezado importante</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Seguir leyendo sin mostrar embarazo</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Castigarles ahí mismo por su indisciplina</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Decirles que de volverlo a hacer los castigará</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Pasar la queja a sus padres</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Tomarlo como broma y no hacer caso al respecto</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Visitando vecinos prominentes explicándoles los problemas</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Avisar de un programa interesante para la reunión</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Poner avisos en los lugares públicos</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Enviar avisos personales</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Pida otro trabajo al jefe</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Lo haga a su modo sin comentarios</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Lo haga con Montoya, pero siga criticándolo</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Lo haga con Montoya, pero mal a propósito</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Persista en su manera de ser</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Cambie para lograr éxito</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Forme un nuevo partido político</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Abandone la política por inmoral</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Preguntarle por qué está triste</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Pasarle el brazo consoladoramente</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Simular no advertir su pena</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Simular no haberla visto</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Explicar el caso al jefe cortésmente</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Cortésmente indicarle que debe hacer lo que le corresponde o que usted se quejará con el jefe</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) Hacer tanto como pueda eficientemente y no decir nada del caso al jefe</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Hacer lo suyo y dejar pendiente lo que el compañero no haga</label></div>',
        '<div class="option"><input class="answer select-radio" type="radio" value="a" name="select"><label> a) Ceder en todos los pequeños puntos posibles</label></div><div class="option"><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Tratar de convencerlos de todas sus ideas</label></div><div class="option"><input class="answer select-radio" type="radio" value="c" name="select"><label> c) eder parcialmente en todas las cuestiones importantes</label></div><div class="option"><input class="answer select-radio" type="radio" value="d" name="select"><label> d) Abogar por muchas reformas</label></div>'
    ];
    echo '<p class="question">'.$_SESSION['question'][0].'</p>'.$_SESSION['format'][0];
}

function kostick(){
    $_SESSION['format'] = [
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Soy trabajador tenaz</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) No soy voluble</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta hacer el trabajo mejor que los demás</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta seguir con lo que he empezado hasta terminarlo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta enseñar a la gente cómo hacer las cosas</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta hacer las cosas lo mejor posible</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta hacer las cosas graciosas</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta decir a la gente lo que tiene que hacer</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta pertenecer a grupos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta sobresalir en los grupos</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta tener un amigo íntimo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) En un grupo, me gusta tener varios amigos</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Yo cambio rápidamente cuando lo creo necesario</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo intento tener amigos íntimos</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta "pagar con la misma moneda" cuando alguien me ofende</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta hacer cosas nuevas y diferentes</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Quiero que mi jefe me estime</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta decir a la gente cuando está equivocada</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta seguir las instrucciones que me dan</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta agradar a mis superiores</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me esfuerzo mucho</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy ordenado, pongo todo es su lugar</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Yo logro que la gente haga lo que tiene que hacer</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) No me altero fácilmente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta decir al grupo lo que tiene que hacer</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Cuando comienzo un trabajo, no lo dejo hasta terminarlo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta ser animado e interesante</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo quiero ser una persona rica y famosa</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta identificarme con grupos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta ayudar a las personas a que tomen una conclusión</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me preocupa cuando alguien no me estima</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta que la gente note mi presencia</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta experimentar cosas nuevas</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Prefiero trabajar con otras personas que solo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Algunas veces culpo a otros cuando las cosas salen mal</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me molesta cuando le soy antipático a alguien</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta complacer a mis superiores</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta experimentar trabajos nuevos y diferentes</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta que me den instrucciones precisas para hacer un trabajo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gustaría decírselo a la gente cuando me molestan</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Siempre trabajo intensamente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta hacer las cosas una por una detalladamente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Soy un buen dirigente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo organizo muy bien mi trabajo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me enfado con facilidad</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy lento para la toma de decisiones</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta trabajar en varias actividades al mismo tiempo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Cuando estoy en un grupo, me gusta estar callado</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta que me inviten</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta hacer las cosas mejor que los demás</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta tener amigos íntimos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta aconsejar a los demás</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta hacer cosas nuevas y diferentes</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta hablar de la forma como obtengo mis éxitos</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Cuando tengo razón me gusta luchar por ella</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta permanecer a un grupo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Evito ser diferente a los demás</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Intento acercarme mucho a la gente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta que me digan exactamente como hacer mi trabajo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me aburro fácilmente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Trabajo intensamente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Pienso y planeo mucho</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Yo dirijo al grupo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Los pequeños detalles me interesan</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Tomo decisiones fácil y rápidamente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Tengo mis cosas limpias y ordenadas</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Hago la cosas con rapidez</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo casi nunca me enojo ni me pongo triste</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta ser parte del grupo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta hacer un solo trabajo a la vez</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Intento hacer amigos íntimos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo pongo empeño en ser el mejor</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gustan los nuevos modelos en trajes y coches</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta ser responsable por otros</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta discutir</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta que me pongan atención</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta agradar a mis superiores</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Estoy interesado en ser parte del grupo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta apegarme a las reglas establecidas</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta que la gente me conozca muy bien</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me esfuerzo mucho</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy muy amigable</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) La gente piensa que soy un buen "dirigente"</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Pienso las cosas con cuidado y detenidamente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) A menudo me arriesgo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta darle importancia a las cosas joviales</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) La gente piensa que trabajo con rapidez</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) La gente piensa que tengo mis cosas limpias y ordenadas</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta jugar y hacer deporte</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy muy agradable</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta que la gente sea unida y sea amistosa</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Siempre trato de terminar un trabajo difícil</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta experimentar y probar nuevas cosas</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta hacer bien un trabajo difícil</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta que me traten justamente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta decir a los demás cómo hacer las cosas</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta hacer aquello que esperan de mí</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta que me pongan atención</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta tener instrucciones precisas para hacer un trabajo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta estar con la gente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Siempre trato de hacer mi trabajo perfecto</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me dicen que soy prácticamente incasable</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Soy el tipo "dirigente"</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Hago amigos fácilmente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Asumo riesgos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Pienso mucho</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Trabajo a un paso rápido y constante</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Disfruto trabajando con detalles</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Tengo mucha energía para juegos y deportes</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Tengo mis cosas limpias y ordenadas</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me llevo bien con todo el mundo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy de temperamento estable</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Quiero conocer nueva gente y hacer cosas nuevas</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Siempre quiero terminar el trabajo que he empezado</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Normalmente sostengo mis creencias</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Normalmente me gusta trabajar intensamente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gustan las sugerencias de las personas que admiro</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta tener a mi cargo a otras personas</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me dejo influenciar fácilmente por otras personas</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta que me pongan mucha atención</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Normalmente trabajo intensamente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Normalmente trabajo con rapidez</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Cuando hablo, el grupo escucha</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy hábil con herramientas</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Soy lento en hacer amigos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me toma tiempo para llegar a una conclusión</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Normalmente como de prisa</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta leer</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta el trabajo en donde puedo moverme</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta el trabajo que tiene que hacerse con cuidado</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Hago el mayor número posible de amigos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Encuentro lo que me he guardado</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Pienso las cosas con anticipación</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Siempre soy agradable</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Yo cuido mucho mi reputación</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo le pongo atención a un problema hasta que se resuelve</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta agradar a la gente que admiro</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Quiero tener éxito</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta que otros tomen decisiones para el grupo</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) A mi me gusta tomar decisiones para el grupo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Siempre me esfuerzo mucho</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Tomo decisiones fácil y rápidamente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) El grupo hace normalmente lo que yo quiero</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Normalmente tengo prisa</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) A menudo me siento cansado</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy lento para tomar decisiones</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Trabajo con rapidez</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Hago amigos fácilmente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Soy activo y con mucho vigor</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Dedico mucho tiempo a pensar</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Soy cordial con la gente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta el trabajo que requiere precisión</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Pienso y planeo mucho</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Guardo cada cosa en su lugar</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta el trabajo que requiere detalles</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Siempre termino el trabajo que he empezado</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta imitar a la gente que admiro</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Difícilmente me enojo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gustan las instrucciones claras</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta trabajar intensamente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Yo trato de lograr lo que quiero</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy un buen "dirigente"</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Hago que los demás trabajen intensamente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Soy una persona que no se preocupa por nada</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Yo me decido rápidamente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo hablo rápidamente</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Normalmente trabajo de prisa</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Hago ejercicio con regularidad</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) No me gusta conocer gente</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me canso en seguida</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Hago muchísimos amigos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Dedico mucho tiempo a pensar</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta trabajar con problemas teóricos</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta trabajar con detalles</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta trabajar con detalles</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Me gusta organizar mi trabajo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Pongo las cosas en su lugar</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Siempre soy agradable</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label> a) Me gusta que me digan lo que tengo que hacer</label><br><input class="answer select-radio" type="radio" value="b" name="select"><label> b) Yo debo terminar lo que he iniciado</label>'
    ];
    echo $_SESSION['format'][0];
}

function otis(){
    $_SESSION['question'] = [
        '¿Qué expresa mejor qué es un martillo?',
        '¿Cuál de estas cinco palabras significa lo contrario de ganar?',
        'La hierba es para la vaca lo que el pan es para:',
        '¿Qué es para el automóvil lo que el carbón es para la locomotora?',
        'Uno de los números de esta serie es incorrecto: 5 10 15 20 25 30 35 39 45 50',
        'La mano es para el brazo lo que el pie es para:',
        'De un muchacho que no hace más que hablar de sus cualidades y de su sabiduría, se dice que:',
        'De una persona que tiene deseos de hacer una cosa, pero teme el fracaso, se dice que es:',
        'El sombrero es para la cabeza lo que el dedal es para:',
        'El hijo de la hermana de mi padre es mi:',
        '¿Cuál de estas diez cantidades es la mayor?',
        'Cuando sabemos que un acontecimiento va a pasar sin ninguna clase de duda, decimos que es:',
        '¿Qué palabra indica lo opuesto a Este?',
        '¿Qué palabra indica lo contrario a soberbia?',
        '¿Cuál de estas cinco cosas no puede agruparse a las demás?',
        '¿Qué definición de estas expresa más exactamente lo que es un reloj?',
        'Si una persona al salir de su casa anda siete pasos hacia la derecha y después retrocede cuatro hacia la izquierda, ¿a cuántos pasos está de su casa?',
        'Si comparamos el automóvil con una carreta, ¿con qué deberíamos comparar una motocicleta?',
        '¿Cuál es la razón por la cual las fachadas de los comercios están muy iluminadas?',
        '¿Cuál de estas cinco cosas tiene más parecido con manzana, durazno y pera?',
        'Escriba la letra que en el abecedario sigue a la K',
        'El Rey es a la Monarquía lo que el Presidente es a:',
        'La lana es para el carnero lo que las plumas son para:',
        '¿Cuál de estas definiciones expresa más exactamente lo que es un cordero?',
        'Pesado es a plomo, lo que sonoro es a:',
        'Mejor es a bueno lo que peor es a:',
        '¿Cuál de estas cosas tiene más parecido con tenazas, alambre y clavo?',
        'Ante el dolor de los demás, normalmente sentimos:',
        'Cuando alguien concibe una nueva máquina, se dice que ha hecho una:',
        '¿Qué es para la abeja lo que las uñas son para el gato?',
        'Uno de los números de esta serie es incorrecto: 1 7 2 7 3 7 4 7 5 7 6 7 8 7',
        '¿Cuál es la principal razón por la que vemos cada día sustituir las carretas por los automóviles?',
        'La corteza es para la naranja y la vaina es para el chícharo, lo que la cáscara es para:',
        '¿Qué es para el criminal lo que el hospital es para el enfermo?',
        'Si estos números estuviesen ordenados: Ocho Diez Seis Nueve Siete',
        'A treinta centavos el lápiz...',
        'De una cantidad que disminuye se dice que:',
        'Hay un refrán que dice "No es oro todo lo que reluce" y esto significa:',
        'En una lengua extranjera KOLO quiere decir "niño" y DAAK KOLO quiere decir "niño bueno"...',
        'Este refrán, "Más vale pájaro en mano que ciento volando", quiere decir:',
        '¿Cuál de estas cinco cosas es más completa?',
        'Si las siguientes palabras estuviesen convenientemente ordenadas para formar una frase: CON DIME ERES QUIEN DIRE ANDAS Y TE QUIEN',
        'Si Jorge es mayor que Pedro, y Pedro es mayor que Juan, entonces Jorge es... que Juan',
        '¿Cuál de estas palabras sería la primera que encontraríamos en un diccionario?',
        'Si las palabras siguientes estuvieran colocadas indicando el orden jerárquico que significan: General Teniente Soldado Coronel Cabo',
        'Hay un refrán que dice: "Un grano no hace granero, pero ayuda al compañero", y esto significa que:',
        'Si Juan es mayor que José, y José tiene la misma edad que Carlos, entonces Carlos es... que Juan',
        'Ordenando esta frase: A FALTA TORTILLAS BUENAS PAN SON DE LAS',
        'Si en una caja grande hubiera dos más pequeñas y dentro de cada una de estas dos hubiera cinco...',
        '¿Qué indica mejor lo que es una mentira?',
        'En un idioma extranjero, SOTO GRON quiere decir "muy caliente", FASS GRON "muy frío"...',
        'La palabra que mejor expresa que una cosa o institución se mantiene a lo largo del tiempo es:',
        'Si Pablo es mayor que Luis y si Pablo es más joven que Andrés, entonces Andrés es... que Luis',
        '¿Cuál de estas cosas tiene más parecido con serpiente, vaca y gorrión?',
        'Hay un refrán que dice: "A hierro caliente, batir de repente", y esto significa:',
        'Si estas palabras estuvieran ordenadas: Semana, Año, Hora, Segundo, Día, Mes, Minuto',
        'El capitán es para el barco lo que el alcalde es para:',
        'Uno de los números de esta serie está equivocado: 2 3 4 3 2 3 4 3 2 4',
        'Si un pleito se resuelve por mutuo acuerdo, se dice que ha habido:',
        'Esta frase tiene las palabras desordenadas: FRASE LA LETRA ESCRIBA PRIMERA ESTA DE',
        'Se tiene la siguiente serie de numeros: 7 5 3 5 7 2 3 7 5 6 7 7 2 5 7 3 4 7 7 5 2 0 7 5 7 8 3 7 2 5 1 7 9 6 5 7',
        '¿Qué indica mejor lo que es un termómetro?',
        '¿Cuál de estas palabras sería la primera que encontraríamos en un diccionario?',
        'Uno de los números de esta serie está equivocado: 1 2 4 8 12 32 64',
        '¿Cuál de estas palabras significa lo contrario de común?',
        '¿Cuál de estas cinco cosas tiene más parecido con Presidente, Almirante y General?',
        'Si estas palabras estuvieran ordenadas: Adolescente, Niño, Hombre, Viejo, Bebé',
        '¿Cuál de estas definiciones indica más exactamente lo que es un caballo?',
        'Si estas palabras estuvieran convenientemente ordenadas para formar una frase: MADRUGA QUIEN LE DIOS A AYUDA',
        '¿Cuál de estas palabras sería la última que encontraríamos en un diccionario?',
        'Ordene esta frase: EN LETRA PARENTESIS A ESCRIBA LA EL',
        'Uno de los números de esta serie está equivocado: 1 2 5 6 9 10 13 14 16 18',
        'Si un ciclista recorre 250 metros en 25 segundos...',
        'Se tiene la siguiente frase desordenada: Y SUMA CUATRO ESCRIBA TRES LA UNO DE'
    ];
    $_SESSION['format'] = [
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Cosa</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Mueble</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Arma</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Herramienta</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Máquina</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Conseguir</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Decaer</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Perder</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Acceder</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Ensayar</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) La manteca</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) La harina</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) La leche</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) El hombre</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) La cosecha</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) El humo</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) La motocicleta</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Las ruedas</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) La gasolina</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) La bocina</label>',
        '<p>Escriba el número que debería ir en lugar del número incorrecto</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) La pierna</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) El pulgar</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) El dedo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) El puño</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) La rodilla</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Miente</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Bromea</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Engaña</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Se divierte</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Se alaba</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Seria</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Ansiosa</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Trabajadora</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Energética</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Tímida</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) El dedo</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) La aguja</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) El hilo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) La mano</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) La costura</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Hermano</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Sobrino</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Primo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Tío</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Nieto</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) 6456</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) 8963</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) 4265</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) 5064</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) 4108</label><br>
        <input class="answer select-radio" type="radio" value="f" name="select"><label>f) 7549</label><br>
        <input class="answer select-radio" type="radio" value="g" name="select"><label>g) 2335</label><br>
        <input class="answer select-radio" type="radio" value="h" name="select"><label>h) 9472</label><br>
        <input class="answer select-radio" type="radio" value="i" name="select"><label>i) 3286</label><br>
        <input class="answer select-radio" type="radio" value="j" name="select"><label>j) 8970</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Probable</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Seguro</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Dudoso</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Posible</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Diferido</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Norte</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Polo</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Ecuador</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Sur</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Oeste</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Tristeza</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Humildad</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Pobreza</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Variedad</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Altanería</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Pera</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Plátano</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Naranja</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Pelota</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Higo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Una cosa redonda que hace tic-tac</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Un aparato que se coloca en las torres</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Un instrumento redondo con una cadena</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Un instrumento que mide el tiempo</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Una cosa que tiene aguja y un cristal</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) 3</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) 7</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) 0</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) 4</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) A la carrera</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Al caballo</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Al tranvía</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Al tren</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) A la bicicleta</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Con el fin de que los transeuntes sepan en dónde están</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Para que puedan ver los artículos expuestos y la gente sienta deseos de comprar</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Porque los comercios pagan muy barata la corriente eléctrica</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Para aumentar la iluminación de la calle</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Semilla</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Árbol</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Ciruela</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Jugo </label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Cuchillo</label>',
        '<input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) La presidencia del consejo de ministros</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) El senado</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) La república</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Un monárquico</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Un republicano</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) La almohada</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) El conejo</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) El pájaro</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) La cabra</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) La cama</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Un animal terrestre</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Un ser que tiene cuatro patas y una cola</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Un animal pequeño y avispado</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Un carnero joven</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Un animal que come hierba</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Suave</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Pequeño</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Macizo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Gris</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Ruido</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Muy bueno</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Mediano</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Malo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Nulo</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Superior</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Billete de 20 pesos</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Hueso</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Cuerda</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Jugo</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Cuchillo</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Rabia</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Piedad</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Desprecio</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Desdén</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Añoranza</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Exploración</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Adaptación</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Renovación</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Novedad</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Invención</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Vuelo</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Miel</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Alas</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Cera</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Aguijón</label>',
        '<p>Escriba el número que debiera figurar en su lugar</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Los caballos son cada día más escasos</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Los caballos se desbocan fácilmente</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Los autos nos hacen ganar tiempo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Los autos son más económicos que las carretas </label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Las reparaciones de los autos son más baratas que las de las carretas</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) La manzana</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) El huevo</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) El jugo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) El melocotón</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) La gallina</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Juez</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Hospicio</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Doctor</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Presidio</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Sentencia</label>',
        '<p>¿Por qué letra empezaría el número del centro?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<p>¿Cuántos podrán comprarse por 3 pesos?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Se va</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Decrece</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Se agota</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Muere</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Desaparece</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Hay oro que no brilla</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) No hay que dejarse llevar por las apariencias</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) El diamante es más brillante que el oro</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) No hay que llevar bisutería que imite al oro</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Hay gentes a quienes gusta ostentar sus riquezas</label>',
        '<p>¿Por qué letra empieza la palabra que significa bueno en este idioma?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Es preferible poseer una cosa que esperar una grande</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) El corazón fuerte no se deja rendir por alabanzas</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Ningún hombre suele apartarse de la verdad sin engañarse a sí mismo</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) El que está en todas partes no está en ninguna</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Retoño</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Hoja</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Árbol</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Rama</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Tronco</label>',
        '<p>¿Por qué letra empezaría la tercera palabra?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Mayor</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Más pequeño</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Igual</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) No se puede saber</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Tren</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Santo</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Raspador</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Queso</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Gruta</label><br>
        <input class="answer select-radio" type="radio" value="f" name="select"><label>f) Noche</label><br>
        <input class="answer select-radio" type="radio" value="g" name="select"><label>g) Pintura</label>',
        '<p>¿Por qué letra empezaría la palabra del centro?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Resuélvete a hacer lo que debes y haz sin falta lo que hayas resuelto</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Hay que ganarse la vida a fuerza de amor</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) No se deben menospreciar las cosas pequeñas</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) En casa de pobre no es necesario granero</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Mayor</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Más joven</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) De la misma edad</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) No se puede saber</label>',
        '<p>¿Por qué letra empezaría la última palabra?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<p>¿Cuántas habría en total?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Un error</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Una afirmación voluntariamente falsa</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Una afirmación involuntariamente falsa</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Una exageración</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Una respuesta inexacta</label>',
        '<p>¿Por qué letra empieza la palabra que significa MUY en este idioma?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Permanente</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Firme</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Estacionaria</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Sólida</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Verdadera</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Mayor</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Más joven</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Igual</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) No se puede saber</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Árbol</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Muñeca</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Carnero</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Pluma</label><br> 
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Piel</label>', 
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) El hierro batido en frío es malo</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) No se pueden hacer varias cosas al mismo tiempo</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Hay que saber aprovechar el momento oportuno</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Los herreros han de trabajar siempre de prisa</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) El trabajo del hierro es cansado</label>',
        '<p>¿Por qué letra empezaría la del centro?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) El estado</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) La provincia</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) La ciudad</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) El patrón</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) El juez</label>',
        '<p>Escriba el número que debería figurar en su lugar</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Promesa</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Debate</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Amnistía</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Proceso</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Aveniencia</label>',
        '<p>Realice lo que se indica en ella</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<p>Escriba todos los 5 que están delante de un 7</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Un tubo de cristal graduado que contiene mercurio</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Un instrumento para medir la fiebre</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Un aparato muy sensible al calor</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><labed>c) Un instrumento para medir la temperatura</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Un objeto que utilizan los médicos</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Bravo</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Bueno</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Brocha</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Bujía</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Bretón</label><br>
        <input class="answer select-radio" type="radio" value="f" name="select"><label>f) Broma</label><br>
        <input class="answer select-radio" type="radio" value="g" name="select"><label>g) Bucle</label><br>
        <input class="answer select-radio" type="radio" value="h" name="select"><label>h) Bribón</label>',
        '<p>Escriba en el número que debería figurar en su lugar</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Banal</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Vivo</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Difícil</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Raro</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Interesante</label>',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Navio</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Ejército </label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Rey</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) República</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Soldadura</label>',
        '<p>¿Por qué letra empezaría la palabra del centro?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Un animal que tiene cola</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Un ser viviente</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Una cosa que trabaja</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Un rumiante</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Un animal que tira de los coches</label>',
        '<p>¿Por qué letra empezaría la tercera palabra?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<input class="answer select-radio" type="radio" value="a" name="select"><label>a) Hectárea</label><br>
        <input class="answer select-radio" type="radio" value="b" name="select"><label>b) Juez</label><br>
        <input class="answer select-radio" type="radio" value="c" name="select"><label>c) Grande</label><br>
        <input class="answer select-radio" type="radio" value="d" name="select"><label>d) Nervio</label><br>
        <input class="answer select-radio" type="radio" value="e" name="select"><label>e) Hora</label><br>
        <input class="answer select-radio" type="radio" value="f" name="select"><label>f) Norte</label><br>
        <input class="answer select-radio" type="radio" value="g" name="select"><label>g) Labio</label>',
        '<p>Realice lo que se indica en la frase</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<p>Escriba el número que debería figurar en su lugar</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<p>¿Cuántos metros recorrerá en un quinto de segundo?</p><input class="answer input-text" type="text" maxlength="3" name="select">',
        '<p>Realice lo que la frase indica</p><input class="answer input-text" type="text" maxlength="3" name="select">'
    ];
    echo '<p class="question">'.$_SESSION['question'][0].'</p>'.$_SESSION['format'][0];
}

function scidii(){
    $_SESSION['question'] = [
        'Si alguien critica o desaprueba algo que usted dice o hace, ¿se siente más herido que la mayoría de las personas?',
        'Fuera de su familia más próxima, ¿siente que no hay nadie realmente cercano a usted?, ¿que no hay persona en las que pueda confiar o hablar de sus problemas personales?',
        '¿Evita relacionarse con la gente a menos que esté seguro de que a usted realmente le agrada?',
        '¿Se mantiene alejado de situaciones que involucran mucho contacto con otras personas?',
        '¿Cuándo asiste a reuniones o eventos sociales, generalmente prefiere guardar silencio por temor a decir algo incorrecto, o a no contestar alguna pregunta?',
        '¿Le preocupa la idea de que podría llegar a llorar, sonrojarse o verse nervioso frente a otras personas?',
        '¿Le parecen peligrosas muchas cosas que a la mayoría de las personas no?',
        '¿Necesita usted mucho más consejos que la mayoría de las personas para tomar cualquier decisión?',
        '¿Ha permitido que otros tomen decisiones importantes por usted, como, por ejemplo, dónde vivir o qué trabajo aceptar?',
        '¿Con frecuencia dice estar de acuerdo con otras personas aún cuando piensa que estas están equivocadas?',
        '¿Es difícil hacer cosas si tiene que hacerlas usted solo?',
        '¿A menudo se ofrece a hacer cosas, aunque no sean de su agrado, con tal de lograr que la gente lo aprecie?',
        '¿Le molesta estar a solas?',
        'La mayoría de las personas se sienten mal cuando terminan una relación cercana, ¿le afecta esto más que a otras personas?',
        '¿Le preocupa mucho que lo abandonen o lo dejen solo sin que nadie vea por usted?',
        '¿Trata de hacer cosas tan bien e invierte tanto tiempo en ello que se le complica terminar las tareas?',
        '¿Se involucra tanto con los detalles de alguna cosa que pierde de vista el objetivo?',
        '¿Insiste más que la mayoría de las personas en que los demás hagan cosas exactamente como usted quiere que lo hagan?',
        '¿Prefiere hacer las cosas usted mismo porque piensa que nadie más lo hará exactamente como usted quiere que lo hagan?',
        '¿Se dedica tanto al trabajo que casi no le queda tiempo para los amigos o para divertirse?',
        '¿Se le dificulta terminar las cosas porque no puede decidir cómo empezar o qué debe hacer primero?',
        '¿Le preocupa mucho la idea de haber hecho algo moralmente indebido?',
        '¿Se enojaría con otras personas si hicieran algo moralmente indebido?',
        '¿Se le hace difícil demostrarles a las personas cuánto las aprecia?',
        '¿Es usted de las personas que rara vez da regalos o hacen favores a los demás?',
        '¿Se le hace difícil deshacerse de las cosas porque podría llegar a necesitarlas algún día?',
        '¿Acostumbra a posponer las cosas hasta el último minuto y acaba por descubrir que no las termina a tiempo?',
        'Algunas personas se irritan o se ponen de mal humor cuando alguien les pide hacer algo que realmente no quieren hacer, ¿es usted así?',
        'Algunas personas trabajan lentamente en forma deliberada o hacen mal las cosas cuando se les pide que hagan algo que realmente no quieren hacer, ¿es usted así?',
        '¿Con frecuencia la gente le pide cosas irrazonables?',
        '¿Tiende a olvidar lo que se supone debe hacer si realmente no desea hacerlo?',
        '¿A menudo piensa que hace las cosas mejor de lo que los demás le reconocen?',
        '¿Le molesta que la gente le sugiera como podría hacer las cosas mejor?',
        '¿Se ha quejado la gente alguna vez de que usted los obstaculice al no hacer la parte que le corresponde de su trabajo?',
        '¿A menudo termina trabajando bajo las órdenes de personas que no están haciendo las cosas tan bien como las haría usted?',
        '¿Ha elegido relaciones amistosas o amorosas que le han dado mal trato o se han aprovechado de usted?',
        '¿Se mete con frecuencia en situaciones difíciles en el trabajo o en la escuela de las que sale desilusionado o lastimado?',
        '¿Rechaza en muchas ocasiones la ayuda de otras personas?',
        '¿Piensa que la ayuda que la gente le ofrece no es, por lo general, lo que usted necesita?',
        'Algunas personas se deprimen cuando tienen éxito, sienten que no merecen triunfar, o bien, hacen algo para estropear sus logros, ¿es usted así?',
        '¿Le sorprende la reacción de enojo de las personas por cosas que usted decide hacer?',
        '¿Con frecuencia se niega la oportunidad de hacer algo que realmente disfrutaría?',
        'Cuando hace algo que se supone es divertido, ¿en ocasiones no llega a divertirse?',
        '¿En muchas ocasiones no hace lo que debe para conseguir lo que desea?',
        '¿Con frecuencia se siente desilusionado porque no hace lo que necesita hacer?',
        'Algunas personas encuentran aburrida a la gente que es amable con ellas y más interesante a la que no lo es, ¿usted es así?',
        '¿Casi siempre hace lo que es bueno para otras personas en vez de lo que es bueno para usted? ',
        '¿Se ha quejado la gente de que usted hace cosas por ellos aun cuando no desean que las haga?',
        '¿Se considera que con frecuencia tiene que mantenerse alerta para evitar que la gente se aproveche de usted?',
        '¿Se preocupa en ocasiones de que sus amigos o colaboradores no sean realmente leales o dignos de confianza?',
        '¿Con frecuencia interpreta lo que la gente dice o hace como una amenaza o un desprecio para usted?',
        '¿Le toma mucho tiempo perdonar a alguien si lo ha insultado o lastimado?',
        '¿Ha llegado a la conclusión de que es mejor no permitir que los demás sepan demasiado acerca de usted?',
        '¿Con frecuencia se enoja porque alguien lo ha despreciado o insultado de algún modo?',
        '¿Es usted muy celoso?',
        '¿Ha sospechado en alguna ocasión que su cónyuge o compañero le es infiel?',
        '¿Cuando ve gente platicando, con frecuencia se pregunta si están hablando de usted?',
        '¿Ha observado en alguna ocasión objetos o sucesos comunes que le parecieran una señal especial para usted?',
        '¿Se siente nervioso cuando está en un grupo de gente desconocida?',
        '¿Ha tenido experiencias con lo sobrenatural?',
        '¿Y con la astrología, ver el futuro, ovnis, percepción extrasensorial o un sexto sentido?',
        '¿Confunden con frecuencia objetos o sombras con personas o ruidos con voces?',
        '¿Alguna vez ha tenido la sensación de que alguna persona o fuerza está a su alrededor, aun cuando no pueda ver a nadie?',
        'Cuando mira a una persona o se ve usted mismo en el espejo, ¿ha visto alguna vez que el rostro le cambia?',
        '¿Podría ser feliz sin relaciones estrechas, con una familia o amigos?',
        '¿Preferiría hacer cosas solo en vez de con otras personas?',
        'Algunas personas parecen no sentir nunca emociones fuertes, como un gran enojo o gran felicidad, ¿es usted así?',
        '¿Se sentiría bien sin involucrarse sexualmente alguna vez con otra persona?',
        'A algunas personas no les importa si se les reconoce o no algo que han hecho bien, ¿es usted así?',
        '¿Con frecuencia acude a los demás en busca de apoyo, aprobación o reconocimiento?',
        '¿Acostumbra a coquetear?',
        '¿Le molesta más que a otras personas no verse atractivo(a)?',
        'Algunas personas expresan sus emociones de una manera exagerada p. ejem. Abrazan con efusividad a gente que no conocen muy bien o pierden el control y hacen escenas cuando las cosas no les salen bien, ¿es usted así?',
        '¿Le gusta ser el centro de atracción?',
        '¿Se entusiasma con frecuencia por algo o por alguien y pierde pronto el interés?',
        '¿Explota fácilmente y se tranquiliza igual de rápido?',
        '¿Por lo general está más preocupada por sus propias necesidades que por las de los demás?',
        '¿Le han dicho alguna vez que solo se preocupa por usted mismo?',
        'Algunas personas pueden aguantar mucho cuando saben que finalmente obtendrán algo que desean, otras pueden esperar a obtener lo que quieren, ¿es usted el tipo de persona que no puede esperar?',
        'Cuando alguien lo critica, ¿a menudo se siente muy enojado, avergonzado o decaído, aun después de horas o días?',
        '¿En ocasiones ha tenido que usar a otras personas para obtener lo que usted necesitaba?',
        '¿Se ha visto en situaciones donde ha tenido que pisar a alguien para obtener lo que quiere?',
        '¿Siente usted que es una persona con talento o habilidades especiales que los demás no han reconocido?',
        '¿Le han dicho alguna vez que tiene una opinión de sí mismo demasiado buena?',
        '¿Diría usted que los problemas a los que se enfrenta son tan especiales que pocas personas podrían entenderlas?',
        '¿Con frecuencia sueña despierto con grandes cosas como tener mucho éxito, poder ser brillante, atractivo o muy amado?',
        '¿A menudo piensa que las reglas no deberían aplicarse a usted?',
        '¿Es muy importante para usted que la gente le ponga atención o lo admire de algún modo?',
        '¿Le ha dicho alguna persona que usted no es comprensivo con sus problemas?',
        '¿Es usted envidioso en general?',
        '¿Considera que sus sentimientos hacia los demás en ocasiones cambian mucho, ha llegado a sentir amor o gran admiración por alguien en un momento y odio o tenerle desilusión en otro momento?',
        '¿Con frecuencia ha hecho cosas que podrían haberlo metido en problemas como: comprar cosas que no puede darse el lujo de comprar?',
        '¿Ha llegado a tener relaciones sexuales con alguien que apenas conocía?',
        '¿Ha llegado a beber mucho o tomar drogas?',
        '¿Ha llegado a manejar de forma imprudente?',
        '¿Ha llegado a comer de forma compulsiva? (como con desesperación)',
        '¿Ha llegado a robar?',
        '¿Tiene cambios bruscos en su humor, altas y bajas, periodos de depresión, irritabilidad, o ansiedad?',
        '¿Con frecuencia tiene estallidos temperamentales o se enoja tanto que llega a perder el control?',
        '¿Ha golpeado a alguien estando enojado?',
        '¿Ha tratado de lastimarse, o suicidarse o amenazó con hacerlo?',
        '¿Ha tratado en forma deliberada de lastimarse o herirse buscando o provocándose un accidente?',
        '¿Cambia tanto con diferentes personas o en diferentes situaciones que a veces no sabe realmente quien es usted?',
        '¿Se siente confundido acerca de sus planes y objetivos a largo plazo (vocación, profesión, etc.)',
        '¿Se siente confundido acerca de la clase de amigos o parejas que usted prefiere?',
        '¿Se siente confundido acerca de cuáles son sus valores?',
        '¿Frecuentemente se siente aburrido o vacio por dentro?',
        '¿Si piensa que alguien importante para usted va a dejarlo, se siente perdido o fuera de control',
        'A partir de esta, las siguientes preguntas se refieren a su comportamiento antes de los 15 años de edad.
        ¿Llegó a faltar a la escuela con frecuencia?',
        '¿A escaparse de su casa y a quedarse fuera durante la noche?',
        '¿A iniciar peleas a golpes?',
        '¿A utilizar alguna arma en una pelea?',
        '¿A forzar a alguien a tener relaciones sexuales con usted?',
        '¿A herir a un animal a propósito?',
        '¿A herir o lastimar a alguien a propósito (que no fuera alguna pelea)?',
        '¿A dañar cosas que no eran suyas en forma deliberada?',
        '¿A provocar incendios?',
        '¿A mentir mucho?',
        '¿A robar cosas en alguna ocasión?',
        '¿A robar o asaltar a alguien?'
    ];
    $_SESSION['format'] = '
    <input class="answer select-radio" type="radio" value="sí" name="select">
    <label>Sí</label><br>
    <input class="answer select-radio" type="radio" value="no" name="select">
    <label>No</label>
    ';
    echo '<p class="question">'.$_SESSION['question'][0].'</p>'.$_SESSION['format'];
}