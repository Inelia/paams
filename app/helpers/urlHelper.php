<?php

/**
 * Redirige vers la page
 *
 * @param string $page
 * @return void
 */
function redirect($page)
{
  header('Location: ' . URLROOT . '/' . $page);
}
