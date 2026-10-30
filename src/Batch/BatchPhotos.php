<?php

namespace spkm\IsamsApi\Batch;

use Generator;
use RuntimeException;
use ZipArchive;

final readonly class BatchPhotos
{
    public function __construct(public string $zip) {}

    /**
     * Each photo's PNG contents, keyed by the id of the student or staff member it belongs to.
     *
     * @return Generator<string, string>
     */
    public function photos(): Generator
    {
        if (! class_exists(ZipArchive::class)) {
            throw new RuntimeException('Reading Batch API photos needs PHP\'s zip extension.');
        }

        $path = (string) tempnam(sys_get_temp_dir(), 'isams-photos');
        file_put_contents($path, $this->zip);
        $archive = new ZipArchive;
        $opened = $archive->open($path, ZipArchive::RDONLY) === true;

        try {
            if (! $opened) {
                throw new RuntimeException('iSAMS did not send a readable zip of photos.');
            }

            for ($index = 0; $index < $archive->numFiles; $index++) {
                $name = (string) $archive->getNameIndex($index);

                if (! str_ends_with($name, '/')) {
                    yield pathinfo($name, PATHINFO_FILENAME) => (string) $archive->getFromIndex($index);
                }
            }
        } finally {
            if ($opened) {
                $archive->close();
            }

            unlink($path);
        }
    }

    public function save(string $path): void
    {
        file_put_contents($path, $this->zip);
    }
}
