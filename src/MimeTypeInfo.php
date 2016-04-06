<?php

namespace Defr;

/**
 * Class MimeTypeInfo
 * @package Defr
 * @author Dennis Fridrich <fridrich.dennis@gmail.com>
 */
class MimeTypeInfo
{
    /**
     * @var string|\SplFileInfo|\SplFileObject $file
     */
    protected $file;

    /**
     * @var string
     */
    protected $mimeType;

    /**
     * MimeTypeInfo constructor.
     * @param \SplFileInfo|\SplFileObject|string $file
     * @param string $mimeType
     * @throws MimeTypeException
     */
    public function __construct($file, $mimeType)
    {
        if ((is_object($file) && !in_array(get_class($file), ['SplFileInfo', 'SplFileObject'])) && is_string($file)) {
            throw new MimeTypeException(
                sprintf('Object %s can not be passed to %s', is_object($file) ? get_class($file) : $file, __CLASS__)
            );
        }
        $this->file = $file;
        $this->mimeType = $mimeType;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->mimeType;
    }

    /**
     * @return \SplFileInfo|\SplFileObject|string
     */
    public function getFileName()
    {
        if ($this->file instanceof \SplFileInfo or $this->file instanceof \SplFileObject) {
            return $this->file->getFilename();
        } else {
            return $this->file;
        }
    }

    /**
     * @return \SplFileInfo|\SplFileObject|string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return null|\SplFileInfo|\SplFileObject|string
     */
    public function getSplFileObject()
    {
        if ($this->file instanceof \SplFileObject) {
            return $this->file;
        }
        if ($this->file instanceof \SplFileInfo) {
            return $this->file->openFile();
        }
        if (is_string($this->file) && is_file($this->file)) {
            return new \SplFileObject($this->file);
        }

        return null;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }
}
