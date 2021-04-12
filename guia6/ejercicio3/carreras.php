<style>
#textbox{
    width: 300px;
}
</style>
<?php
 function __autoload($class_name){
 require("class/" . $class_name . ".class.php");
 }
 //Creando el objeto página
 $homepage = new page();
 $homepage->content = <<<PAGE
 <!-- page content -->
 <div id="topcontent">
    <div id="textbox">
        <div id="title">
            <h2>Ingenierías</h2>
        </div>
        <div id="paragraph">
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_mecanica" class="enlace">
                Ingeniería Mecánica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_biomedica" class="enlace">
                Ingeniería Biomédica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_en_ciencias_de_la_computacion" class="enlace">
                Ingeniería en Ciencias de la computación
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_electrica" class="enlace">
                Ingeniería Eléctrica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_en_telecomunicaciones" class="enlace">
                Ingeniería en Telecomunicaciones
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_mecanica" class="enlace">
                Ingeniería Mecánica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_en_automatizacion" class="enlace">
                Ingeniería en Automatización
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/ingenieria_en_aeronautica" class="enlace">
                Ingeniería en Aeronáutica
            </a><br/>
        </div>
    </div>
 
    <div id="textbox">
        <div id="title">
            <h2>Licenciaturas</h2>
        </div>
        <div id="paragraph">
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_teologia_pastoral" class="enlace">
                Licenciatura en Teología Pastoral
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_idiomas_con_especialidad_en_turismo" class="enlace">
                Licenciatura en idiomas con especialidad en turismo
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_ciencias_de_la_comunicacion" class="enlace">
                Licenciatura en ciencias de la comunicación
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_diseno_grafico" class="enlace">
                Licenciatura en Diseño Grafico
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_diseno_industrial_y_de_productos" class="enlace">
                Licenciatura en Diseño Industrial y de productos
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_mercadotecnia" class="enlace">
                Licenciatura en Mercadotecnia
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_contaduria_publica" class="enlace">
                Licenciatura en contaduria publica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/licenciatura_en_administracion_de_empresas" class="enlace">
                Licenciatura en Administración de empresas
            </a><br/>
        </div>
    </div>

    <div id="textbox">
        <div id="title">
            <h2>Técnicos</h2>
        </div>
        <div id="paragraph">
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_ingenieria_mecanica" class="enlace">
                Técnico en Ingeniería Mecánica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_ingenieria_electrica" class="enlace">
                Técnico en Ingeniería Eléctrica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_ingenieria_electronica" class="enlace">
                Técnico en Ingeniería Electrónica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_ingenieria_biomedica" class="enlace">
                Técnico en Ingeniería Biomédica
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_ingenieria_en_computacion" class="enlace">
                Técnico en Ingeniería en computación
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_multimedia" class="enlace">
                Técnico en multimedia
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_diseno_grafico" class="enlace">
                Técnico en Diseño Grafico
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/tecnico_en_desarrollo_de_aplicaciones_moviles" class="enlace">
                Técnico en desarrollo de aplicaciones moviles
            </a><br/>
        </div>
    </div>

    <div id="textbox">
        <div id="title">
            <h2>Profesorados</h2>
        </div>
        <div id="paragraph">
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/profesorado_en_teologia_pastoral" class="enlace">
                Profesorado en Teología pastoral
            </a><br/><br/>
            <a href="http://www.udb.edu.sv/udb/carreras/carrera/profesorado_en_educacion_basica_para_primero_y_segundo_ciclos" class="enlace">
                Profesorado en educación básica para primero y segundo ciclos
            </a><br/>
        </div>
    </div>
 </div>
PAGE;
 echo $homepage->display();
?>