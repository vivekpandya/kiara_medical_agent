<?php
namespace App\Libraries;
/**
 * phpTextToImage class
 * This class converts text to image in PHP
 */
class Php_Text_To_Image {

    private $image;

    /**
     * Create image from text
     * @param string text to convert into image
     * @param string textColor
     * @param string backgroundColor
     * @param int font size of text
     * @param int width of the image
     * @param int height of the image
     */
    function createImageOLD($text, $fontname = '', $textColor = '', $backgroundColor = '', $fontSize = 120) {
        $font = FCPATH . 'assets/font/Pacifico-Regular.ttf';
        if (!empty($fontname)) {
            $font = FCPATH . 'assets/font/' . $fontname . '.ttf';
        }

        $padding = 10;
        $angle = 0;

        // Large canvas for sharp rendering
        $tempW = 1200;
        $tempH = 400;
        $tempImg = imagecreatetruecolor($tempW, $tempH);

        // Default white bg and black text
        $bgRGB = ['r' => 255, 'g' => 255, 'b' => 255];
        $txtRGB = ['r' => 0, 'g' => 0, 'b' => 0];

        $bgColor = imagecolorallocate($tempImg, $bgRGB['r'], $bgRGB['g'], $bgRGB['b']);
        $textColor = imagecolorallocate($tempImg, $txtRGB['r'], $txtRGB['g'], $txtRGB['b']);

        imagefilledrectangle($tempImg, 0, 0, $tempW - 1, $tempH - 1, $bgColor);

        // Get text bounding box
        $bbox = imagettfbbox($fontSize, $angle, $font, $text);
        $textW = abs($bbox[2] - $bbox[0]);
        $textH = abs($bbox[1] - $bbox[7]);

        // Center text
        $x = ($tempW - $textW) / 2;
        $y = ($tempH / 2) + ($textH / 2);

        imagettftext($tempImg, $fontSize, $angle, $x, $y, $textColor, $font, $text);

        // Trim background
        $bounds = $this->getTextBoundingBox($tempImg, $bgColor);

        $cropW = $bounds['width'] + $padding * 2;
        $cropH = $bounds['height'] + $padding * 2;

        // Create cropped image
        $cropped = imagecreatetruecolor($cropW, $cropH);
        $newBG = imagecolorallocate($cropped, $bgRGB['r'], $bgRGB['g'], $bgRGB['b']);
        imagefilledrectangle($cropped, 0, 0, $cropW - 1, $cropH - 1, $newBG);

        imagecopy(
            $cropped,
            $tempImg,
            $padding,
            $padding,
            $bounds['x'],
            $bounds['y'],
            $bounds['width'],
            $bounds['height']
        );
        imagedestroy($tempImg);

        // Resize to 80px height while preserving aspect ratio
        $finalHeight = 80;
        $scale = $finalHeight / $cropH;
        $finalWidth = (int)($cropW * $scale);

        $resized = imagecreatetruecolor($finalWidth, $finalHeight);
        $white = imagecolorallocate($resized, $bgRGB['r'], $bgRGB['g'], $bgRGB['b']);
        imagefilledrectangle($resized, 0, 0, $finalWidth - 1, $finalHeight - 1, $white);

        imagecopyresampled($resized, $cropped, 0, 0, 0, 0, $finalWidth, $finalHeight, $cropW, $cropH);
        imagedestroy($cropped);

        $this->image = $resized;
        return true;
    }
    function createImageClear($text, $fontname = '', $textColor = '', $backgroundColor = '', $fontSize = 120) {
        $font = FCPATH . 'assets/font/Pacifico-Regular.ttf';
        if (!empty($fontname)) {
            $font = FCPATH . 'assets/font/' . $fontname . '.ttf';
        }

        $padding = 10;
        $angle = 0;

        // Use imagettfbbox to get font bbox
        $bbox = imagettfbbox($fontSize, $angle, $font, $text);
        $minX = min($bbox[0], $bbox[2], $bbox[4], $bbox[6]);
        $maxX = max($bbox[0], $bbox[2], $bbox[4], $bbox[6]);
        $minY = min($bbox[1], $bbox[3], $bbox[5], $bbox[7]);
        $maxY = max($bbox[1], $bbox[3], $bbox[5], $bbox[7]);

        $textWidth = $maxX - $minX;
        $textHeight = $maxY - $minY;

        $imgWidth = $textWidth + 2 * $padding;
        $imgHeight = $textHeight + 2 * $padding;

        $image = imagecreatetruecolor($imgWidth, $imgHeight);

        // Colors
        $bgRGB = ['r' => 255, 'g' => 255, 'b' => 255]; // white
        $txtRGB = ['r' => 0, 'g' => 0, 'b' => 0];       // black

        $bgColor = imagecolorallocate($image, $bgRGB['r'], $bgRGB['g'], $bgRGB['b']);
        $textColor = imagecolorallocate($image, $txtRGB['r'], $txtRGB['g'], $txtRGB['b']);

        // Fill background
        imagefilledrectangle($image, 0, 0, $imgWidth, $imgHeight, $bgColor);

        // Calculate baseline (adjust Y so letters are not cut off)
        $x = $padding - $minX; // shift left
        $y = $padding - $minY; // shift up (since Y grows downward)

        // Draw the text
        imagettftext($image, $fontSize, $angle, $x, $y, $textColor, $font, $text);

        $this->image = $image;

        return true;
    }
    function createImageAutoTrim($text, $fontname = '', $textColor = '', $backgroundColor = '', $fontSize = 22) {
        $font = FCPATH . 'assets/font/Pacifico-Regular.ttf';
        if (!empty($fontname)) {
            $font = FCPATH . 'assets/font/' . $fontname . '.ttf';
        }

        $padding = 10;
        $angle = 0;

        // Step 1: Render on a large canvas
        $tempW = 1000;
        $tempH = 300;
        $tempImg = imagecreatetruecolor($tempW, $tempH);

        // Colors
        $bgRGB = ['r' => 255, 'g' => 255, 'b' => 255]; // force white bg
        $txtRGB = ['r' => 0, 'g' => 0, 'b' => 0];       // black text
        $bgColor = imagecolorallocate($tempImg, $bgRGB['r'], $bgRGB['g'], $bgRGB['b']);
        $textColor = imagecolorallocate($tempImg, $txtRGB['r'], $txtRGB['g'], $txtRGB['b']);

        // Fill white
        imagefilledrectangle($tempImg, 0, 0, $tempW - 1, $tempH - 1, $bgColor);

        // Get box size
        $bbox = imagettfbbox($fontSize, $angle, $font, $text);
        $textW = abs($bbox[2] - $bbox[0]);
        $textH = abs($bbox[1] - $bbox[7]);

        // Calculate baseline offsets
        $x = ($tempW - $textW) / 2;
        $y = ($tempH / 2) + ($textH / 2);

        // Draw text
        imagettftext($tempImg, $fontSize, $angle, $x, $y, $textColor, $font, $text);

        // Step 2: Auto-trim white
        $bounds = $this->getTextBoundingBox($tempImg, $bgColor);

        $cropW = $bounds['width'] + $padding * 2;
        $cropH = $bounds['height'] + $padding * 2;

        $this->image = imagecreatetruecolor($cropW, $cropH);
        $newBG = imagecolorallocate($this->image, $bgRGB['r'], $bgRGB['g'], $bgRGB['b']);
        imagefilledrectangle($this->image, 0, 0, $cropW - 1, $cropH - 1, $newBG);

        imagecopy(
            $this->image,
            $tempImg,
            $padding,
            $padding,
            $bounds['x'],
            $bounds['y'],
            $bounds['width'],
            $bounds['height']
        );

        imagedestroy($tempImg);
        return true;
    }

    // Helper function
    private function getTextBoundingBox($image, $bgColor)
    {
        $w = imagesx($image);
        $h = imagesy($image);

        $left = $w; $right = 0;
        $top = $h; $bottom = 0;

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                $color = imagecolorat($image, $x, $y);
                if ($color !== $bgColor) {
                    if ($x < $left) $left = $x;
                    if ($x > $right) $right = $x;
                    if ($y < $top) $top = $y;
                    if ($y > $bottom) $bottom = $y;
                }
            }
        }

        return [
            'x' => $left,
            'y' => $top,
            'width' => $right - $left + 1,
            'height' => $bottom - $top + 1,
        ];
    }
    function createImage($text, $fontname = 'Pacifico-Regular', $fontSize = 72)
    {
        $fontPath = FCPATH . 'assets/font/' . $fontname . '.ttf';
        if (!file_exists($fontPath)) {
            $fontPath = FCPATH . 'assets/font/Pacifico-Regular.ttf'; // default fallback
        }

        $tempWidth = 1500;
        $tempHeight = 500;

        // Create a transparent background
        $tempImg = imagecreatetruecolor($tempWidth, $tempHeight);
        imagesavealpha($tempImg, true);
        $transparent = imagecolorallocatealpha($tempImg, 0, 0, 0, 127);
        imagefill($tempImg, 0, 0, $transparent);

        $black = imagecolorallocate($tempImg, 0, 0, 0);

        // Calculate best font size
        $box = imagettfbbox($fontSize, 0, $fontPath, $text);
        $textWidth = abs($box[2] - $box[0]);
        $textHeight = abs($box[7] - $box[1]);

        // Centering
        $x = ($tempWidth - $textWidth) / 2;
        $y = ($tempHeight + $textHeight) / 2;

        imagettftext($tempImg, $fontSize, 0, $x, $y, $black, $fontPath, $text);

        // Crop non-transparent area
        $bounds = $this->getAlphaBounds($tempImg);

        $contentW = $bounds['width'];
        $contentH = $bounds['height'];

        $croppedImg = imagecreatetruecolor($contentW, $contentH);
        imagesavealpha($croppedImg, true);
        $transparent = imagecolorallocatealpha($croppedImg, 0, 0, 0, 127);
        imagefill($croppedImg, 0, 0, $transparent);

        imagecopy($croppedImg, $tempImg, 0, 0, $bounds['x'], $bounds['y'], $contentW, $contentH);
        imagedestroy($tempImg);

        // Final canvas 250x80
        $finalW = 250;
        $finalH = 80;

        $finalImg = imagecreatetruecolor($finalW, $finalH);
        imagesavealpha($finalImg, true);
        $transparent = imagecolorallocatealpha($finalImg, 0, 0, 0, 127);
        imagefill($finalImg, 0, 0, $transparent);

        // Scale image maintaining aspect ratio
        $scale = min($finalW / $contentW, $finalH / $contentH);
        $resizedW = (int)($contentW * $scale);
        $resizedH = (int)($contentH * $scale);

        $offsetX = (int)(($finalW - $resizedW) / 2);
        $offsetY = (int)(($finalH - $resizedH) / 2);

        imagecopyresampled(
            $finalImg,
            $croppedImg,
            $offsetX, $offsetY,
            0, 0,
            $resizedW, $resizedH,
            $contentW, $contentH
        );

        imagedestroy($croppedImg);

        $this->image = $finalImg;
        return true;
    }

    private function getAlphaBounds($image)
    {
        $width = imagesx($image);
        $height = imagesy($image);

        $minX = $width;
        $minY = $height;
        $maxX = 0;
        $maxY = 0;

        for ($y = 0; $y < $height; ++$y) {
            for ($x = 0; $x < $width; ++$x) {
                $rgba = imagecolorat($image, $x, $y);
                $alpha = ($rgba & 0x7F000000) >> 24;
                if ($alpha < 127) { // Non-transparent pixel
                    if ($x < $minX) $minX = $x;
                    if ($y < $minY) $minY = $y;
                    if ($x > $maxX) $maxX = $x;
                    if ($y > $maxY) $maxY = $y;
                }
            }
        }

        $minX = max(0, $minX);
        $minY = max(0, $minY);
        $maxX = min($width - 1, $maxX);
        $maxY = min($height - 1, $maxY);

        return [
            'x' => $minX,
            'y' => $minY,
            'width' => $maxX - $minX + 1,
            'height' => $maxY - $minY + 1,
        ];
    }



    function createImage2804($text, $fontname = 'Pacifico-Regular', $fontSize = 72) {
        $font = FCPATH . 'assets/font/Pacifico-Regular.ttf';
        if (!empty($fontname)) {
            $font = FCPATH . 'assets/font/' . $fontname . '.ttf';
        }
        
        // Step 1: Render to large image
        $tempWidth = 1000;
        $tempHeight = 300;

        $tempImg = imagecreatetruecolor($tempWidth, $tempHeight);
        $white = imagecolorallocate($tempImg, 255, 255, 255);
        $black = imagecolorallocate($tempImg, 0, 0, 0);
        imagefilledrectangle($tempImg, 0, 0, $tempWidth, $tempHeight, $white);

        // Calculate text box
        $bbox = imagettfbbox($fontSize, 0, $font, $text);
        $textW = abs($bbox[2] - $bbox[0]);
        $textH = abs($bbox[5] - $bbox[1]);

        // Center text
        $x = ($tempWidth - $textW) / 2;
        $y = ($tempHeight + $textH) / 2;

        // Draw text
        imagettftext($tempImg, $fontSize, 0, $x, $y, $black, $font, $text);

        // Step 2: Crop content
        $bounds = $this->getNonWhiteBounds($tempImg, $white);

        $contentW = $bounds['width'];
        $contentH = $bounds['height'];

        $croppedImg = imagecreatetruecolor($contentW, $contentH);
        imagefilledrectangle($croppedImg, 0, 0, $contentW, $contentH, $white);
        imagecopy($croppedImg, $tempImg, 0, 0, $bounds['x'], $bounds['y'], $contentW, $contentH);
        imagedestroy($tempImg);

        // Step 3: Fit to 250x80 with aspect ratio
        $finalW = 250;
        $finalH = 80;

        $scale = min($finalW / $contentW, $finalH / $contentH);
        $resizedW = (int)($contentW * $scale);
        $resizedH = (int)($contentH * $scale);

        $finalImg = imagecreatetruecolor($finalW, $finalH);
        imagefilledrectangle($finalImg, 0, 0, $finalW, $finalH, $white);

        // Center resized image
        $offsetX = ($finalW - $resizedW) / 2;
        $offsetY = ($finalH - $resizedH) / 2;

        imagecopyresampled(
            $finalImg,
            $croppedImg,
            $offsetX, $offsetY,
            0, 0,
            $resizedW, $resizedH,
            $contentW, $contentH
        );

        imagedestroy($croppedImg);
        $this->image = $finalImg;
        return true;
    }

    // Helper: Detect non-white bounding box
    function getNonWhiteBounds($image, $whiteColor)
    {
        $w = imagesx($image);
        $h = imagesy($image);
        $left = $w; $right = 0;
        $top = $h; $bottom = 0;

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                if (imagecolorat($image, $x, $y) !== $whiteColor) {
                    $left = min($left, $x);
                    $right = max($right, $x);
                    $top = min($top, $y);
                    $bottom = max($bottom, $y);
                }
            }
        }

        return [
            'x' => $left,
            'y' => $top,
            'width' => $right - $left + 1,
            'height' => $bottom - $top + 1,
        ];
    }



    // Helper function
    private function getTextBoundingBox2($image, $bgColor)
    {
        $w = imagesx($image);
        $h = imagesy($image);

        $left = $w; $right = 0;
        $top = $h; $bottom = 0;

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                if (imagecolorat($image, $x, $y) !== $bgColor) {
                    if ($x < $left) $left = $x;
                    if ($x > $right) $right = $x;
                    if ($y < $top) $top = $y;
                    if ($y > $bottom) $bottom = $y;
                }
            }
        }

        return [
            'x' => $left,
            'y' => $top,
            'width' => $right - $left + 1,
            'height' => $bottom - $top + 1,
        ];
    }
    /* function to convert hex value to rgb array */

    protected function hexToRGB($colour) {
        if ($colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
            list( $r, $g, $b ) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
            list( $r, $g, $b ) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
            return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);
        return array('r' => $r, 'g' => $g, 'b' => $b);
    }

    /**
     * Display image
     */
    function showImage() {
        header('Content-Type: image/png');
        return imagepng($this->image);
    }

    /**
     * Save image as png format
     * @param string file name to save
     * @param string location to save image file
     */
    function saveAsPng($fileName = 'text-image', $location = '') {
        $location = FCPATH."/uploads/temp_folder/";
        $fileName = $fileName . ".png";
        $fileName = !empty($location) ? $location . $fileName : $fileName;
        return imagepng($this->image, $fileName);
    }

    /**
     * Save image as jpg format
     * @param string file name to save
     * @param string location to save image file
     */
    function saveAsJpg($fileName = 'text-image', $location = '') {
        $fileName = $fileName . ".jpg";
        $fileName = !empty($location) ? $location . $fileName : $fileName;
        return imagejpeg($this->image, $fileName);
    }
}
