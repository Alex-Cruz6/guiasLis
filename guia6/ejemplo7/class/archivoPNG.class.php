<?php
    class archivo
    {
        //Definiendo las propiedades del objeto
        protected $nombrearchivo;
        private $octetos;
        private $fechamodificacion;
        const PATH = 'img/';
        //Creando los métodos
        public function __construct($f)
        {
            if (is_file(self::PATH . $f)) {
                $this->nombrearchivo =self::PATH . $f;
                $this->octetos = (filesize($this->nombrearchivo));
                $this->fechamodificacion = (filemtime($this->nombrearchivo));
            } else {
                die("**** ERROR: No se encuentra el archivo '$f'  ****");
            }
        }
        public function octetos()
        {
            return $this->octetos;
        }
        public function fechamodificacion()
        {
            return $this->fechamodificacion;
        }
        public function renombrar($nombrenuevo)
        {
            if (rename($this->nombrearchivo, $nombrenuevo)) {
                $this->nombrearchivo = $nombrenuevo;
                return 1;
            } else {
                echo "**** ERROR: No se puede renombrar el archivo";
            }
        }
    }
    class archivoPNG extends archivo
    {
        //Propiedades de la clase
        private $alto;
        private $ancho;
        private $bitsporcolor;
        //Métodos de la clase
        public function __construct($f)
        {
            parent::__construct($f);
            $props = getimagesize(parent::PATH . $f);
            $ind_tipo_img = 2;
            if ($props[$ind_tipo_img] != 3) {
                //Es un archivo PNG
                die("%%%% ERROR: '$f' no tiene formato gráfico PNG %%%%");
            } else {
                $ind_alto_img = 0;
                $ind_ancho_img = 1;
                $this->alto = $props[$ind_alto_img];
                $this->ancho = $props[$ind_ancho_img];
                $this->bitsporcolor = $props['bits'];
            }
        }
        public function creamuestra($archivomuestra, $anchomuestra, $altomuestra)
        {
            $imgmuestra = ImageCreate($anchomuestra, $altomuestra);
            $imgoriginal = ImageCreateFromPNG($this->nombrearchivo);
            ImageCopyResized($imgmuestra, $imgoriginal, 0, 0, 0, 0, $anchomuestra, $altomuestra, ImageSX($imgoriginal), ImageSY($imgoriginal));
            ImagePNG($imgmuestra, parent::PATH . $archivomuestra);
        }
        public function mostrarimagenesPNG($imagenoriginal, $imagenmuestra, $objorig, $objmuestra)
        {
            echo "<table id=\"emblemas\">\n<tr>\n<th>\nImagen\n</th>\n<th>\nTamaño\n</th>\n<th>\nDimensiones</th>\n</tr>\n<tr                              class=\"even\">\n<td>\n<img src='img/$imagenoriginal'>\n</td>\n<td>\n" . $objorig->octetos() . " Kb</td>\n<td>\n"  .  $objorig->ancho()  .  "x"  .  $objorig->alto()  .  " px</td>\n</tr>\n<tr                               class=\"odd\">\n<td>\n<img src='img/$imagenmuestra'>\n</td>\n<td>\n" . $objmuestra->octetos() . " Kb</td>\n<td>\n" . $objmuestra->ancho() . "x" . $objmuestra->alto() . " px</td>\n</tr>\n</table>";
        }
        public function bitsporcolor()
        {
            return $this->bitsporcolor;
        }
        public function alto()
        {
            return $this->alto;
        }
        public function ancho()
        {
            return $this->ancho;
        }
    }
