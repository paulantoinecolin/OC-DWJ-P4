<?php
        function excerpt($text, $wordCount=60)
        {
            $words = explode(" ", $text);
            $excerptText = implode(" ", array_slice($words, 0, $wordCount));

            return $excerptText;
        }
