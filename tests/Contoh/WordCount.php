<?php

namespace Tests\Contoh;

class WordCount{
  public function countWords($sentence) {
    return count(explode(" ", $sentence));
  }
}
