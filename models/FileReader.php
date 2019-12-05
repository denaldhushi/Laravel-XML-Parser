<?php
/**
 * @author Denald Hushi
 */
class FileReader
{
    function __construct($dir)
    {
        $this->dir = $dir;
    }

    function Read()
    {
        $files = scandir($this->dir);

        foreach ($files as $key => $value)
        {
            $path = realpath($this->dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path))
            {
                $results[] = $path;
            }
            else if ($value != "." && $value != "..")
            {
                Read($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }
}
?>
