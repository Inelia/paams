<?php
//^ (? =. * [Az]) (? =. * [AZ]) (? =. * \ D) [a- zA-Z \ d \ w \ W] {8,} $ 

function check_password_format($password)
{
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number = preg_match('@[0-9]@', $password);

  if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
    return false;
  } else
    return true;
}
