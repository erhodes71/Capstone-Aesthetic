$response = $imageAnnotator->imagePropertiesDetection($image);
$props = $response->getImagePropertiesAnnotation();

print("Properties:" . PHP_EOL);
foreach ($props->getDominantColors()->getColors() as $colorInfo) {
    printf("Fraction: %s" . PHP_EOL, $colorInfo->getPixelFraction());
    $color = $colorInfo->getColor();
    printf("Red: %s" . PHP_EOL, $color->getRed());
    printf("Green: %s" . PHP_EOL, $color->getGreen());
    printf("Blue: %s" . PHP_EOL, $color->getBlue());
    print(PHP_EOL);
}

$imageAnnotator->close();
}
