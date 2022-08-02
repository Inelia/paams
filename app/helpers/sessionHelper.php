<?php

/**
 * Verify that the user is connected
 *
 * @return boolean
 */
function isLoggedIn()
{
  if (isset($_SESSION['user_id'])) return true;
  else return false;
}

/**
 * Verify that the user is logged in and that the user is admin
 * 
 * @return boolean
 */
function isAdmin()
{
  if (isset($_SESSION['user_id']) and $_SESSION['user_role'] == 1) return true;
  else return false;
}
