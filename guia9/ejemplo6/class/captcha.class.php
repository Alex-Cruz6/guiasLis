<?php
    class captcha {
        //Propiedad de la clase
        private static $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&?+-*/";
        //Métodos de la clase
        private function texto($long = 8){
            $texto = "";
            for($i=0; $i<$long; $i++){
                $texto .= self::$caracteres{
                    rand(0,strlen(self::$caracteres))
                };
            }
            return $texto;
        }
        public function captcha($w=150, $h=30){
            session_start();
            $_SESSION['captcha'] = self::texto();
            $captcha= imagecreate($w, $h);
            $colorfondo = imagecolorallocate($captcha, 30, 30, 60);
            $colortexto = imagecolorallocate($captcha, 240, 240, 210);
            $colorlinea = imagecolorallocate($captcha, 180, 180, 180);
            imageline($captcha, 0,9, 150, 9, $colorlinea);
            imageline($captcha, 0, 15, 150, 15, $colorlinea);
            imageline($captcha, 0, 20, 150, 20, $colorlinea);
            imagestring($captcha, 5, 30, 5, $_SESSION['captcha'], $colortexto);
            //Generando los encabezados HTTP para la imagen
            header("Content-type: image/png");
            imagepng($captcha);
            imagedestroy($captcha);
        }
    }
?>