<?php

namespace Shared\Functions;

/**
 * Class for all reusable Functions
 */
class Functions {

    public static function getVersion() :string{
        $version = "";
        
        $fileContent = file_get_contents("shared/package.json");
        
        $packageJson = json_decode($fileContent);
        
        
        return $packageJson->version;
    }

}
