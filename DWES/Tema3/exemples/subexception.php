<?php

class MainException extends Exception {}
class SubException extends MainException {}

try {
    throw new SubException('Envie SubException');
}

catch (MainException $e){
    echo "Capturada MainException: " . $e->getMessage();
}

catch (SubException $e){
    echo "Capturada SubException: " . $e->getMessage();
}

catch (Exception $e){
    echo "Capturada Exception: " . $e->getMessage();
}