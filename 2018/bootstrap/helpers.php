<?php

if (!function_exists('nl2p')) {
    /**
     * Converts new line to paragraphs in PHP.
     *
     * @param string $string
     * @return string
     */
    function nl2p(string $string): string
    {
        $paragraphs = '';

        foreach (explode("\n", $string) as $line) {
            if (trim($line)) {
                $paragraphs .= "<p>{$line}</p>";
            }
        }

        return $paragraphs;
    }
}
